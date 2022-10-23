<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\Product;
use App\Models\CompanyContact;
use App\Models\OrderStatus;
use App\User;
use PDF;
use Notification;
use Helper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Notifications\StatusNotification;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::with(['shipping'])->orderBy('id','DESC')->where('status','active')->get();
        return view('backend.pages.order.index')->with('orders',$orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'first_name'=>'string|required',
            'quantity'=>'required',
            'shipping_id'=>'required',
            'quantity'=>'required',
            'address1'=>'string|required',
            'phone'=>'numeric|required',
        ];
        $msg = [];
        $attributes = [
            'first_name'=>'First Name',
            'address1'=>'Address',
            'phone'=>'Phone Number',
            'post_code'=>'string|nullable',
            'shipping'=>'Shipping Method'
        ];
        Validator::make($request->all(),$rule,$msg,$attributes);

        $insert=new Order();
        $insert->product_title = $request->product_title;
        $insert->first_name = $request->first_name;
        $insert->address1 = $request->address1;
        $insert->phone = $request->phone;
        $insert->quantity = 1;
        $insert->shipping_id = 1;
        $insert->pamyment_methods = $request->pamyment_methods;
        $insert->payment_number = 1234;
        // = $request->payment_number;
        $order_number = 'ORD-'.strtoupper(Str::random(10));
        $insert->order_number = $order_number;
        $insert->email = 'nobir.wd@gmail.com';
        $shipping_price = Shipping::find($request->shipping_id);

        // calculation for percentage
        // $discount = $request->product_price*$request->discount/100;
        // $discount_price = $request->discount_price;
        // $subtotal =$discount_price*$request->quantity;
        // $total = $subtotal + $shipping_price->price;

        // calculation for amount
        $discount = $request->discount;
        $total = $request->product_price - $discount;


        $insert->total_amount = $total;
        $insert->sub_total = $total;

        $insert->country = 'null';
        $insert->last_name = 'null';

        // Status Status

        $order_statuses = OrderStatus::first();
        if($order_statuses !=null){
            $insert->order_status = $order_statuses->name;
        }else{
             $insert->order_status = 'New';
        }
         $insert->status = 'active';
        $insert->save();

        $product_update = Product::find($request->product_id);
       if($product_update != null){
         $product_update->stock = $product_update->stock - $request->quantity;
        $product_update->save();
       }

        $order_details['order_number'] = $order_number;
          $order_details['date'] = date('d-m-Y');
          $order_details['total'] = $total;
          $order_details['product_price'] = $request->product_price;
          $order_details['discount'] = $request->discount;
          $order_details['discount_taka'] = $discount;
          $order_details['qty'] = $request->quantity;
          $order_details['payment_methdod'] = 'ক্যাশ অন ডেলিভারি';
          $order_details['product_name'] = $request->product_title;
          $order_details['subtotal'] = $total;
          $order_details['shipping'] = 0;
          $order_details['client_name'] = $request->first_name;
          $order_details['client_phone'] = $request->phone;
          $order_details['client_address'] = $request->address1;
          $order_details['company_contact'] = CompanyContact::first();

        request()->session()->flash('success','Your product successfully placed in order');
        return view('frontend.thanks',$order_details);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=Order::find($id);
        // return $order;
        return view('backend.order.show')->with('order',$order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order=Order::find($id);
        return view('backend.order.edit')->with('order',$order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order=Order::find($id);
        $this->validate($request,[
            'status'=>'required|in:new,process,delivered,cancel'
        ]);
        $data=$request->all();
        // return $request->status;
        if($request->status=='delivered'){
            foreach($order->cart as $cart){
                $product=$cart->product;
                // return $product;
                $product->stock -=$cart->quantity;
                $product->save();
            }
        }
        $status=$order->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated order');
        }
        else{
            request()->session()->flash('error','Error while updating order');
        }
        return redirect()->route('order.index');
    }

    // trash function
    public function trash(){
        $orders=Order::with(['shipping'])->orderBy('id','DESC')->where('status','inactive')->get();
        return view('backend.pages.order.trash')->with('orders',$orders);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function delete($id)
    {
        $order=Order::find($id);
        $order->status = 'inactive';
        if($order){
            $status=$order->save();
            if($status){
                request()->session()->flash('success','Ordered item successfully moved to trash');
            }
            else{
                request()->session()->flash('error','Order item can not moved to trash');
            }
            return redirect()->route('order.index');
        }
        else{
            request()->session()->flash('error','Order item can not found');
            return redirect()->back();
        }
    }

    //Restore function
      public function restore($id)
    {
        $order=Order::find($id);
        $order->status = 'active';
        if($order){
            $status=$order->save();
            if($status){
                request()->session()->flash('success','Ordered item successfully restored');
            }
            else{
                request()->session()->flash('error','Order item can not restored');
            }
            return redirect()->route('order.index');
        }
        else{
            request()->session()->flash('error','Order item can not found');
            return redirect()->back();
        }
    }


     public function destroy($id)
    {
        $order=Order::find($id);
        $order->status = Auth::user()->id;
        if($order){
            $status=$order->save();
            if($status){
                request()->session()->flash('success','Trash item Successfully deleted');
            }
            else{
                request()->session()->flash('error','Trash item can not deleted');
            }
            return redirect()->back();
        }
        else{
            request()->session()->flash('error','Order can not found');
            return redirect()->back();
        }
    }

    public function orderTrack(){
        return view('frontend.pages.order-track');
    }

    public function productTrackOrder(Request $request){
        // return $request->all();
        $order=Order::where('user_id',auth()->user()->id)->where('order_number',$request->order_number)->first();
        if($order){
            if($order->status=="new"){
            request()->session()->flash('success','Your order has been placed. please wait.');
            return redirect()->route('home');

            }
            elseif($order->status=="process"){
                request()->session()->flash('success','Your order is under processing please wait.');
                return redirect()->route('home');

            }
            elseif($order->status=="delivered"){
                request()->session()->flash('success','Your order is successfully delivered.');
                return redirect()->route('home');

            }
            else{
                request()->session()->flash('error','Your order canceled. please try again');
                return redirect()->route('home');

            }
        }
        else{
            request()->session()->flash('error','Invalid order numer please try again');
            return back();
        }
    }

    // PDF generate
    public function pdf(Request $request){
        $order=Order::getAllOrder($request->id);
        // return $order;
        $file_name=$order->order_number.'-'.$order->first_name.'.pdf';
        // return $file_name;
        $pdf=PDF::loadview('backend.order.pdf',compact('order'));
        return $pdf->download($file_name);
    }
    // Income chart
    public function incomeChart(Request $request){
        $year=\Carbon\Carbon::now()->year;
        // dd($year);
        $items=Order::with(['cart_info'])->whereYear('created_at',$year)->where('status','delivered')->get()
            ->groupBy(function($d){
                return \Carbon\Carbon::parse($d->created_at)->format('m');
            });
            // dd($items);
        $result=[];
        foreach($items as $month=>$item_collections){
            foreach($item_collections as $item){
                $amount=$item->cart_info->sum('amount');
                // dd($amount);
                $m=intval($month);
                // return $m;
                isset($result[$m]) ? $result[$m] += $amount :$result[$m]=$amount;
            }
        }
        $data=[];
        for($i=1; $i <=12; $i++){
            $monthName=date('F', mktime(0,0,0,$i,1));
            $data[$monthName] = (!empty($result[$i]))? number_format((float)($result[$i]), 2, '.', '') : 0.0;
        }
        return $data;
    }
}
