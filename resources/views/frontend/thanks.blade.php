@include('frontend.layouts.header')

<body>
    <div class="row thank-div" style="background-color: #133196">
        <div class="col-md-8 text-center">
            <span><i class="fas fa-check-circle thank-icon"></i></span>
            <h2 class="thank-text offset-md-2">ধন্যবাদ অর্ডার করার জন্য 😊 খুব শীঘ্রই আপনার সাথে যোগাযোগ করা হবে। অথবা
                যেকোনো প্রয়োজনে কল করুন {{ $company_contact->phone }}</h2>
        </div>
    </div>

    <p class="order-received">
        Your order has been <br />
        received
    </p>

    <div class="container-fluid">
        <div class="row order-receive-details m-1 pl-3">
            <div class="col-md-6 border-bottom p-3 text-right">Order Number: <strong>{{ $order_number }}</strong></div>
            <div class="col-md-6 border-bottom p-3">Your Name: <strong>{{ $client_name }}</strong></div>
            <div class="col-md-6 border-bottom p-3 text-right">Your Phone: <strong>{{ $client_phone }}</strong></div>
            <div class="col-md-6 border-bottom p-3">Your Address: <strong>{{ $client_address }}</strong></div>
            <div class="col-md-6 border-bottom p-3 text-right">Date: <strong>{{ $date }} </strong></div>
            <div class="col-md-6 border-bottom p-3">Total: <strong>{{ $total }}</strong></div>
            <div class="col-md-6 border-bottom p-3">Payment Method: <strong>{{ $payment_methdod }}</strong></div>
        </div>

        <h2 class="mt-5 order-details text-center">Order Details</h2>
        <div class="order-receive-details m-1 mb-5">
            <div class="order-details-div">
                <div class="order-details-header">Product</div>
                <div class="order-details-header">Amount</div>
            </div>

            <div class="order-details-div border-bottom p-3">
                <div class="order-details-text">{{ $product_name }}: </div>
                <div class="order-details-text">{{ $product_price }}৳</div>
            </div>

            <div class="order-details-div border-bottom p-3">
                <div class="order-details-text">Discount: </div>
                <div class="order-details-text">{{ $discount_taka . '৳' }}</div>
            </div>

            <div class="order-details-div border-bottom p-3">
                <div class="order-details-text">After Discount: </div>
                <div class="order-details-text">{{ $product_price - $discount_taka }}৳</div>
            </div>

            <div class="order-details-div border-bottom p-3">
                <div class="order-details-text">Subtotal: </div>
                <div class="order-details-text">{{ $subtotal }}৳</div>
            </div>

            <div class="order-details-div border-bottom p-3">
                <div class="order-details-text">Shipping: </div>
                <div class="order-details-text">{{ $shipping }}৳</div>
            </div>

            <div class="order-details-div border-bottom p-3">
                <div class="order-details-text">Total: </div>
                <div class="order-details-text">{{ $total }}৳</div>
            </div>

            <div class="order-details-div border-bottom p-3">
                <div class="order-details-text">Payment Method</div>
                <div class="order-details-text">{{ $payment_methdod }}</div>
            </div>
            <div class="order-details-div border-bottom p-3">
                <div class="order-details-text">You have to pay</div>
                <div class="order-details-text">{{ $total }}৳</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</body>

</html>
