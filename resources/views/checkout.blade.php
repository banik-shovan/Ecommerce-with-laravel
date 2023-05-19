@extends('layouts.master')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{route('index')}}"><i class="fa fa-home"></i> Home</a>

                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="{{ url('/pay') }}" name="myFormpayment" onsubmit="return validateFormpayment()" method="POST" class="checkout-form" width="100%">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                <div class="row">
                    <div class="col-lg-6">

                        <h4>Biiling Details</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="fir">Name<span>*</span></label>
                                @guest
                                    <input type="text" id="fir" name="name" value="">
                                @else
                                <input type="text" id="fir" name="name" value="{{Auth::user()->name}} ">

                                @endguest
                            </div>

                            <div class="col-lg-12">
                                <label for="cun-name">Company Name</label>
                                <input type="text" id="cun-name" name="company_name">
                            </div>

                            <div class="col-lg-12">
                                <label for="street">Shipping Address<span>*</span></label>
                                @guest
                                <input type="text" id="street" class="street-first" name="shipping_address" value="">
                                @else
                                <input type="text" id="street" class="street-first" name="shipping_address" value="{{ Auth::user()->userprofile->shipping_address }}">
                                @endguest
                            </div>

                            <div class="col-lg-6 pb-3">
                                <label for="country">Country</label>
                                <select class="custom-select d-block w-100" id="country" name="country" required>

                                    <option value="Bangladesh">Bangladesh</option>
                                </select>
                            </div>
                            <div class="col-lg-6 pb-3">
                                <label for="region">Region<span>*</span></label>
                                <select class="custom-select d-block w-100" id="region" name="region" >
                                    <option value="">Choose...</option>
                                    <option value="Barishal">Barishal</option>
                                    <option value="Chattogram">Chattogram</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Mymensingh">Mymensingh</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Rangpur">Rangpur</option>
                                    <option value="Sylhet">Sylhet</option>
                                </select>
                            </div>
                            <div class="col-lg-12 pb-3">
                                <label for="zip">Postcode / ZIP<span>*</span></label>
                                @guest
                                <input type="text" id="zip" name="zip" value="">
                                @else
                                <input type="text" id="zip" name="zip" value="{{ Auth::user()->userprofile->zip }} ">
                                @endguest
                            </div>


                            <div class="col-lg-6">
                                <label for="email">Email Address<span>*</span></label>
                                @guest
                                <input type="text" id="email" name="email" value="">
                                @else
                                <input type="text" id="email" name="email" value="{{ Auth::user()->email }} ">
                                @endguest
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone<span>*</span></label>
                                @guest
                                <input type="text" id="phone" name="phone" value=" ">
                                @else
                                <input type="text" id="phone" name="phone" value="{{ Auth::user()->userprofile->phone }} ">
                                @endguest
                            </div>
                            <div class="col-lg-12">
                                <div class="create-item">
                                    <label for="acc-create">
                                        Do you want to Save all payment information ?
                                        <input type="checkbox" id="acc-create" name="save_info">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    @foreach(Cart::content() as $cart)
                                    <li class="fw-normal">{{$cart->name}} x {{$cart->qty}} &nbsp; @if($cart->options['volume'] != null) {{$cart->options['volumename']}} @endif @if($cart->options['size'] != null) {{$cart->options['size']}} @endif  <span>&#2547;{{$cart->options['totalprice']}}</span></li>
                                    @endforeach
                                    <li class="fw-normal">Subtotal <span>&#2547;{{Cart::subtotal()}}</span></li>

                                    @if($coupon == 'no')

                                    <input type="hidden" value="null" id="couponcode" name="couponcode">
                                    <li class="fw-normal">Coupon  <span>
                                    NAN
                                    </span></li>
                                    @else
                                    <input type="hidden" value="{{$coupon->coupon_name}}" id="couponcode" name="couponcode">
                                    <li class="fw-normal">Coupon : &nbsp; <b> {{$coupon->coupon_name}} </b> <span>
                                    &#2547;{{$coupon->coupon_price}}
                                    </span></li>
                                    @endif
                                    <input type="hidden" value="{{$userguest}}" id="user_guest" name="user_guest">
                                    <li class="total-price">Total (Without Delivery Charge)<span>&#2547;{{$total}}</span></li>
                                    @if($point == "apply")
                                    <li class="total-price">Congratulation you got 15% discount for your point!</li>
                                    @endif
                                </ul>


                                <div class="payment-check" >
                                    <label for="pc-check">

                                    </label>

                                    <div class="pc-item">
                                        <label for="pc-check">
                                           <b> Delivery Charge:  Inside Dhaka &#2547; 60 & Outside Dhaka &#2547; 130 </b>


                                        </label>

                                    </div>
                                    <hr>
                                    <h6 style="padding:5px;">Payment option</h6>
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            <b> Cash on Delivery</b>
                                            <input  type="radio" id="pc-check" name="payment_option" value="cash_on" >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            <b>Pay Online</b> (Extra 2.5%  taka will be added)
                                            <input type="radio" id="pc-paypal" name="payment_option" value="digital_pay" >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <hr>
                                    <div class="create-item">
                                        <label for="acc-create1">
                                            I agree to the <a href="{{route('terms_condition')}}" target="_blank">Terms & Condition</a> ,<a href="{{route('terms_condition')}}" target="_blank">Return Refund Policy</a> and <a href="{{route('terms_condition')}}" target="_blank" >Privacy Policy.</a>
                                            <input type="checkbox" id="acc-create1"  name="terms_policy">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->


@endsection
@push ('scripts')
<script type="text/javascript">
    var coupontemp;
    var userguesttemp;
    window.onload =
        function()  {
            coupontemp = document.getElementById('couponcode').value;
            userguesttemp = document.getElementById('user_guest').value;

        }

</script>
@endpush
