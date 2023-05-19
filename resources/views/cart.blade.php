@extends('layouts.master')
@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{route('index')}}"><i class="fa fa-home"></i> Home</a>
                        
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Size/Volume</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Cart::content() as $cart)
                                <tr>
                                    <td class="cart-pic first-row"><a href="{{route('product',$cart->options['slug'])}}"><img src="{{asset('public/productImage/'.$cart->options['image'])}}" alt=""></a></td>
                                    <td class="cart-title first-row">
                                    <a href="{{route('product',$cart->options['slug'])}}">
                                    <h5>{{$cart->name}}</h5>
                                        </a>
                                        
                                    </td>
                                    <td>
                                        @if($cart->options['volumename'] != null)
                                        {{$cart->options['volumename']}}
                                        @else
                                        {{$cart->options['size']}}
                                        @endif
                                    </td>
                                    <td class="p-price first-row">&#2547;{{$cart->price}}</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <form action="{{route('cartupdate',$cart->rowId)}}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{$cart->id}}" name="productid">

                                                <div class="pro-qty">
                                                    <input type="text" value="{{$cart->qty}}" name="changeqty">
                                                </div>
                                                <button class="btn btn-warning btn-sm" style="font-size: 10px;margin:10px; float:left; "> <b>UPDATE</b> </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">{{$cart->options['totalprice']}}</td>
                                    <form action="{{route('cartremove',$cart->rowId)}}" method="post">
                                       @csrf
                                        <td class="close-td first-row">
                                            <button style="border: none;
                                                        
                                                        background: none;
                                                        cursor:pointer;"><i class="ti-close"></button></i></td>
                                    </form>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                               
                            </div>
                            <!-- <div class="discount-coupon">
                                <h6>Discount Codes</h6>

                                <form action="#" class="coupon-form">
                                        <input type="text" placeholder="Enter your codes" name="cupon">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div> -->
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                        <!-- onclick="return setAction(this)" -->
                            <form  name="checkmyform" @guest onclick="return setAction(this)"  @else  action="{{route('proceed.checkoutUser')}}"@endguest
                                   
                                     method="post" class="coupon-form">
                                @csrf
                                <div class="discount-coupon">
                                    <h6>Discount Codes</h6>

                                    <!-- <form action="#" class="coupon-form"> -->
                                            <input type="text" placeholder="Enter your codes" name="coupon">
                                        <!-- <button type="submit" class="site-btn coupon-btn">Apply</button> -->
                                    <!-- </form> -->
                                </div>
                                @guest 
                                 <input type="hidden"  name="user_or_guest" value="guest">
                                @else 
                                <input type="hidden"  name="user_or_guest" value="user">
                                @endguest
                                <div class="proceed-checkout">
                                    <ul>
                                        <li class="subtotal">Subtotal <span>&#2547;{{Cart::subtotal()}}</span></li>
                                        <li class="cart-total">Total <span>&#2547;{{Cart::total()}}</span></li>
                                    </ul>
                                    <!-- <a  class="proceed-btn">PROCEED TO CHECK OUT</a> -->
                                    <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenterguest" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <button type="button" class="btn btn-primary" onclick="return setguest()" >Save changes</button>
                                            <button type="button" class="btn btn-primary" value="false">Save changes1</button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection