<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyInfo;
use App\Models\CompanyContact;

class HomeController extends Controller
{
     public function __construct() {
        return $this->middleware('auth');
    }
   public function home(){
    //websiteSetting check
        $data = CompanyInfo::all();
            if(count($data)<1){
                return redirect()->route('company-details.index');
                   $company_info = CompanyInfo::first();
            $company_contact_info = CompanyContact::first();
            }
    return view('backend.pages.index');
   }
}
