@extends('layouts.master')
@section('content')
    @include('inc.banner')

    <!-- Banner Section Begin -->
        <div class="banner-section spad">
            <div class="container-fluid ">
                <div class="row brand-logo">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="filter-control">
                            <!-- <ul>
                                <li class="active">woman</li>
        
        
                            </ul> -->
                            <h2>Shop By Brand</h2>
                            <img src="{{ URL::asset('public/assets/frontend/img/floral-border.png')}}" alt="">
                        </div>

                    </div>
                    <div class="row">
                        @foreach($brands as $item)
                        
                            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                                <a href="{{ route('brand.single.product',['slug'=>$item->slug]) }}">
                                <div class="single-banner">
                                    <!-- <img src="{{ URL::asset('public/assets/frontend/img/brandpic02.jpg')}}" alt=""> -->
                                    <img src="{{ URL::asset('public/brandImage/'.$item->image)}}" alt="" >
                                    <!-- <h2>hello</h2> -->
                                    <!-- <div class="inner-text">
                                        <h5 style="text-transform: uppercase;">{{$item->name}}</h5>
                                    </div> -->
                                </div>
                                </a>
                            </div>
                        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    <!-- Banner Section End -->

    <!-- Featured  Section Begin -->
        <section class="women-banner spad">
            <div class="container-fluid">
                <div class="row">
                    <!-- <div class="col-lg-3">
                        <div class="product-large set-bg" data-setbg="img/products/women-large.jpg">
                            <h2>Women’s</h2>
                            <a href="#">Discover More</a>
                        </div>
                    </div> -->
                    <div class="col-lg-10 offset-lg-1">
                        <div class="filter-control">
                            <!-- <ul>
                                <li class="active">woman</li>


                            </ul> -->
                            <h2>New Arrival</h2>
                            <img src="{{ URL::asset('public/assets/frontend/img/floral-border.png')}}" alt="">
                        </div>
                        <div class="product-slider owl-carousel">
                            @foreach($product as $item)
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <a href="{{route('product',$item->slug)}}">
                                        <img src="{{asset('public/productImage/'.$item->image1)}}" alt="">
                                        </a>
                                        @if($item->old_price != null)
                                        <div class="sale">Sale</div>
                                        @endif
                                        <!-- <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div> -->
                                        <ul>

                                            <li class="w-icon active">
                                                @if($item->size == "yes" || $item->volume == "yes" )
                                                    <a data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}" href="#"><i class="icon_bag_alt"></i></a>
                                                @elseif($item->size != "yes" && $item->volume != "yes")
                                                    <form method="post" action="{{route('addtocart')}}" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden"  name="productid" value="{{$item->id}}">
                                                        <input type="hidden" name="qty" value="1">
                                                       <button class="cart-btn" type="submit"><i class="icon_bag_alt"></i></button>
                                                    </form>     
                                                @endif
                                            </li>
                                            <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"
                                                    href="#">+ Quick View</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <!-- <div class="catagory-name">Coat</div> -->
                                        <a href="{{route('product',$item->slug)}}">
                                            <h5>{{$item->name}}</h5>
                                        </a>
                                        <div class="product-price">
                                        @if($item->volume == "yes")
                                        &#2547;{{$item->volumes()->min('price')}} -  &#2547;{{$item->volumes()->max('price')}}
                                        @else
                                        &#2547;{{$item->main_price}}
                                        @endif
                                        @if($item->old_price != null)
                                            <span>&#2547;{{$item->old_price}}</span>
                                        @endif
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                        <!-- Model start  -->
                            @foreach($product as $item)
                                <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header border-0">

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">

                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="product-pic-zoom">
                                                                <img class="product-big-img" src="{{asset('public/productImage/'.$item->image1)}}" alt="">
                                                                <div class="zoom-icon">
                                                                    <i class="fa fa-search-plus"></i>
                                                                </div>
                                                            </div>
                                                            <div class="product-thumbs">
                                                                <div class="product-thumbs-track ps-slider owl-carousel">
                                                                    <div class="pt active"
                                                                        data-imgbigurl="{{asset('public/productImage/'.$item->image1)}}"><img
                                                                            src="{{asset('public/productImage/'.$item->image1)}}" alt=""></div>
                                                                    <div class="pt" data-imgbigurl="{{asset('public/productImage/'.$item->image2)}}"><img
                                                                            src="{{asset('public/productImage/'.$item->image2)}}" alt=""></div>
                                                                    <div class="pt" data-imgbigurl="{{asset('public/productImage/'.$item->image3)}}"><img
                                                                            src="{{asset('public/productImage/'.$item->image3)}}" alt=""></div>
                                                                    <div class="pt" data-imgbigurl="{{asset('public/productImage/'.$item->image4)}}"><img
                                                                            src="{{asset('public/productImage/'.$item->image4)}}" alt=""></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="product-details">
                                                                <div class="pd-title">
                                                                    <!-- <span>oranges</span> -->
                                                                    <h3>{{$item->name}} </h3>
                                                                    <!-- <a href="#" class="heart-icon"><i
                                                                            class="icon_heart_alt"></i></a> -->
                                                                </div>
                                                                <!-- <div class="pd-rating">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <span>(5)</span>
                                                                </div> -->
                                                                <div class="pd-desc">
                                                                    <!-- <p>Lorem ipsum dolor sit amet, consectetur ing elit, sed do
                                                                        eiusmod tempor sum dolor
                                                                        sit amet, consectetur adipisicing elit, sed do mod tempor
                                                                    </p> -->
                                                                    {!! $item->short_description !!}
                                                                    <h4>
                                                                    @if($item->volume == "yes")
                                                                    &#2547;{{$item->volumes()->min('price')}} -  &#2547;{{$item->volumes()->max('price')}}
                                                                    @else
                                                                    &#2547;{{$item->main_price}}
                                                                    @endif
                                                                    @if($item->old_price != null)
                                                                        <span>&#2547;{{$item->old_price}}</span>
                                                                    @endif
                                                                    </h4>
                                                                </div>
                                                                <form method="post" action="{{route('addtocart')}}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="pd-size-choose">
                                                                        @if($item->size == "yes")
                                                                            @if($item->s != 0 || $item->s != null)
                                                                                <div class="sc-item">
                                                                                    <input type="radio" id="s-size{{$item->id}}" name="size"  value="s">
                                                                                    <label for="s-size{{$item->id}}">s</label>
                                                                                    <h6>Qty:{{$item->s}}</h6>
                                                                                </div>
                                                                            @endif
                                                                            @if($item->m != 0 || $item->m != null)
                                                                                <div class="sc-item">
                                                                                    <input type="radio" id="m-size{{$item->id}}" name="size" value="m">
                                                                                    <label for="m-size{{$item->id}}">m</label>
                                                                                    <h6>Qty:{{$item->m}}</h6>
                                                                                </div>
                                                                            @endif
                                                                            @if($item->l != 0 || $item->l != null)
                                                                                <div class="sc-item">
                                                                                    <input type="radio" id="l-size{{$item->id}}" name="size"  value="l">
                                                                                    <label for="l-size{{$item->id}}">l</label>
                                                                                    <h6>Qty:{{$item->l}}</h6>
                                                                                </div>
                                                                            @endif
                                                                            @if($item->xl != 0 || $item->xl != null)
                                                                                <div class="sc-item">
                                                                                    <input type="radio" id="xl-size{{$item->id}}" name="size"  value="xl">
                                                                                    <label for="xl-size{{$item->id}}">xl</label>
                                                                                    <h6>Qty:{{$item->xl}}</h6>
                                                                                </div>
                                                                            @endif
                                                                            @if($item->xxl != 0 || $item->xxl != null)
                                                                                <div class="sc-item">
                                                                                    <input type="radio" id="xxl-size{{$item->id}}" name="size"  value="xxl">
                                                                                    <label for="xxl-size{{$item->id}}">xxl</label>
                                                                                    <h6 style="text-size:10px;">Qty:{{$item->xxl}}</h6>
                                                                                </div>
                                                                            @endif
                                                                        @endif
                                                                
                                                                    </div>
                                                                    <div class="pd-size-choose">
                                                                        @if($item->volume == "yes")
                                                                            
                                                                            @foreach($item->volumes as $volumeitem)
                                                                                <div class="sc-item">
                                                                                    <input type="radio" id="{{$volumeitem->name}}{{$item->id}}" name="volume" value="{{$volumeitem->id}}">
                                                                                    <label for="{{$volumeitem->name}}{{$item->id}}">{{$volumeitem->name}} </label>
                                                                                    <h6>&#2547;{{$volumeitem->pivot->price}}</h6>
                                                                                </div>
                                                                            @endforeach
                                                                            
                                                                            
                                                                        @endif
                                                                
                                                                    </div>
                                                                    <div class="quantity">
                                                                        <input type="hidden"  name="productid" value="{{$item->id}}">
                                                                        <div class="pro-qty form-group">
                                                                            
                                                                            <input type="text" name="qty" value="1">
                                                                        </div>
                                                                        <button class="primary-btn pd-cart" type="submit">Add To Cart</button>
                                                                    
                                                                    </div>
                                                                </form>
                                                                <!-- <div class="quantity">
                                                                    <div class="pro-qty">
                                                                        <input type="text" value="1">
                                                                    </div>
                                                                    <a href="#" class="primary-btn pd-cart">Add To Cart</a>
                                                                </div> -->
                                                                <!-- <ul class="pd-tags">
                                                                    <li><span>CATEGORIES</span>: More Accessories, Wallets & Cases
                                                                    </li>
                                                                    <li><span>TAGS</span>: Clothing, T-shirt, Woman</li>
                                                                </ul> -->
                                                                <!-- <div class="pd-share">
                                                                    <div class="p-code">Sku : 00012</div>
                                                                    <div class="pd-social">
                                                                        <a href="#"><i class="ti-facebook"></i></a>
                                                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                                                        <a href="#"><i class="ti-linkedin"></i></a>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        <!-- Model end -->
                    </div>
                </div>
            </div>
        </section>
    <!-- featured  Section End -->

     <!-- delivery image section  -->
        <div class="banner-section spad">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="filter-control">
                            <!-- <ul>
                                <li class="active">woman</li>
        
        
                            </ul> -->
                            <h2>Perfumes Online Shop Bangladesh</h2>
                            <img src="{{ URL::asset('public/assets/frontend/img/floral-border.png')}}" alt="">
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <div class="">
                            <img src="{{ URL::asset('public/assets/frontend/img/delivery-picture.png')}}" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- delivary image section end -->

    <!-- Man Section  -->
        <section class="women-banner spad">
            <div class="container-fluid">
                <div class="row">
                    <!-- <div class="col-lg-3">
                        <div class="product-large set-bg" data-setbg="img/products/women-large.jpg">
                            <h2>Women’s</h2>
                            <a href="#">Discover More</a>
                        </div>
                    </div> -->
                    <div class="col-lg-10 offset-lg-1">
                        <div class="filter-control">
                            <!-- <ul>
                                <li class="active">woman</li>


                            </ul> -->
                            <h2>Trending</h2>
                            <img src="{{ URL::asset('public/assets/frontend/img/floral-border.png')}}" alt="">
                        </div>
                        <div class="product-slider owl-carousel">
                            @foreach($trendingproducts as $item)
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <a href="{{route('product',$item->slug)}}">
                                        <img src="{{asset('public/productImage/'.$item->image1)}}" alt="">
                                        </a>
                                        @if($item->old_price != null)
                                        <div class="sale">Sale</div>
                                        @endif
                                        <!-- <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div> -->
                                        <ul>

                                            <li class="w-icon active">
                                                @if($item->size == "yes" || $item->volume == "yes" )
                                                    <a data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}" href="#"><i class="icon_bag_alt"></i></a>
                                                @elseif($item->size != "yes" && $item->volume != "yes")
                                                    <form method="post" action="{{route('addtocart')}}" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden"  name="productid" value="{{$item->id}}">
                                                        <input type="hidden" name="qty" value="1">
                                                       <button class="cart-btn" type="submit"><i class="icon_bag_alt"></i></button>
                                                    </form>     
                                                @endif
                                            </li>
                                            <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"
                                                    href="#">+ Quick View</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <!-- <div class="catagory-name">Coat</div> -->
                                        <a href="{{route('product',$item->slug)}}">
                                            <h5>{{$item->name}}</h5>
                                        </a>
                                        <div class="product-price">
                                        @if($item->volume == "yes")
                                        &#2547;{{$item->volumes()->min('price')}} -  &#2547;{{$item->volumes()->max('price')}}
                                        @else
                                        &#2547;{{$item->main_price}}
                                        @endif
                                        @if($item->old_price != null)
                                            <span>&#2547;{{$item->old_price}}</span>
                                        @endif
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                        <!-- Model start  -->
                            @foreach($trendingproducts as $item)
                                <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header border-0">

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">

                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="product-pic-zoom">
                                                                <img class="product-big-img" src="{{asset('public/productImage/'.$item->image1)}}" alt="">
                                                                <div class="zoom-icon">
                                                                    <i class="fa fa-search-plus"></i>
                                                                </div>
                                                            </div>
                                                            <div class="product-thumbs">
                                                                <div class="product-thumbs-track ps-slider owl-carousel">
                                                                    <div class="pt active"
                                                                        data-imgbigurl="{{asset('public/productImage/'.$item->image1)}}"><img
                                                                            src="{{asset('public/productImage/'.$item->image1)}}" alt=""></div>
                                                                    <div class="pt" data-imgbigurl="{{asset('public/productImage/'.$item->image2)}}"><img
                                                                            src="{{asset('public/productImage/'.$item->image2)}}" alt=""></div>
                                                                    <div class="pt" data-imgbigurl="{{asset('public/productImage/'.$item->image3)}}"><img
                                                                            src="{{asset('public/productImage/'.$item->image3)}}" alt=""></div>
                                                                    <div class="pt" data-imgbigurl="{{asset('public/productImage/'.$item->image4)}}"><img
                                                                            src="{{asset('public/productImage/'.$item->image4)}}" alt=""></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="product-details">
                                                                <div class="pd-title">
                                                                    <!-- <span>oranges</span> -->
                                                                    <h3>{{$item->name}} </h3>
                                                                    <!-- <a href="#" class="heart-icon"><i
                                                                            class="icon_heart_alt"></i></a> -->
                                                                </div>
                                                                <!-- <div class="pd-rating">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <span>(5)</span>
                                                                </div> -->
                                                                <div class="pd-desc">
                                                                    <!-- <p>Lorem ipsum dolor sit amet, consectetur ing elit, sed do
                                                                        eiusmod tempor sum dolor
                                                                        sit amet, consectetur adipisicing elit, sed do mod tempor
                                                                    </p> -->
                                                                    {!! $item->short_description !!}
                                                                    <h4>
                                                                    @if($item->volume == "yes")
                                                                    &#2547;{{$item->volumes()->min('price')}} -  &#2547;{{$item->volumes()->max('price')}}
                                                                    @else
                                                                    &#2547;{{$item->main_price}}
                                                                    @endif
                                                                    @if($item->old_price != null)
                                                                        <span>&#2547;{{$item->old_price}}</span>
                                                                    @endif
                                                                    </h4>
                                                                </div>
                                                                <form method="post" action="{{route('addtocart')}}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="pd-size-choose">
                                                                        @if($item->size == "yes")
                                                                            @if($item->s != 0 || $item->s != null)
                                                                                <div class="sc-item">
                                                                                    <input type="radio" id="s-size{{$item->id}}" name="size"  value="s">
                                                                                    <label for="s-size{{$item->id}}">s</label>
                                                                                    <h6>Qty:{{$item->s}}</h6>
                                                                                </div>
                                                                            @endif
                                                                            @if($item->m != 0 || $item->m != null)
                                                                                <div class="sc-item">
                                                                                    <input type="radio" id="m-size{{$item->id}}" name="size" value="m">
                                                                                    <label for="m-size{{$item->id}}">m</label>
                                                                                    <h6>Qty:{{$item->m}}</h6>
                                                                                </div>
                                                                            @endif
                                                                            @if($item->l != 0 || $item->l != null)
                                                                                <div class="sc-item">
                                                                                    <input type="radio" id="l-size{{$item->id}}" name="size"  value="l">
                                                                                    <label for="l-size{{$item->id}}">l</label>
                                                                                    <h6>Qty:{{$item->l}}</h6>
                                                                                </div>
                                                                            @endif
                                                                            @if($item->xl != 0 || $item->xl != null)
                                                                                <div class="sc-item">
                                                                                    <input type="radio" id="xl-size{{$item->id}}" name="size"  value="xl">
                                                                                    <label for="xl-size{{$item->id}}">xl</label>
                                                                                    <h6>Qty:{{$item->xl}}</h6>
                                                                                </div>
                                                                            @endif
                                                                            @if($item->xxl != 0 || $item->xxl != null)
                                                                                <div class="sc-item">
                                                                                    <input type="radio" id="xxl-size{{$item->id}}" name="size"  value="xxl">
                                                                                    <label for="xxl-size{{$item->id}}">xxl</label>
                                                                                    <h6 style="text-size:10px;">Qty:{{$item->xxl}}</h6>
                                                                                </div>
                                                                            @endif
                                                                        @endif
                                                                
                                                                    </div>
                                                                    <div class="pd-size-choose">
                                                                        @if($item->volume == "yes")
                                                                            
                                                                            @foreach($item->volumes as $volumeitem)
                                                                                <div class="sc-item">
                                                                                    <input type="radio" id="{{$volumeitem->name}}{{$item->id}}" name="volume" value="{{$volumeitem->id}}">
                                                                                    <label for="{{$volumeitem->name}}{{$item->id}}">{{$volumeitem->name}} </label>
                                                                                    <h6>&#2547;{{$volumeitem->pivot->price}}</h6>
                                                                                </div>
                                                                            @endforeach
                                                                            
                                                                            
                                                                        @endif
                                                                
                                                                    </div>
                                                                    <div class="quantity">
                                                                        <input type="hidden"  name="productid" value="{{$item->id}}">
                                                                        <div class="pro-qty form-group">
                                                                            
                                                                            <input type="text" name="qty" value="1">
                                                                        </div>
                                                                        <button class="primary-btn pd-cart" type="submit">Add To Cart</button>
                                                                    
                                                                    </div>
                                                                </form>
                                                                <!-- <div class="quantity">
                                                                    <div class="pro-qty">
                                                                        <input type="text" value="1">
                                                                    </div>
                                                                    <a href="#" class="primary-btn pd-cart">Add To Cart</a>
                                                                </div> -->
                                                                <!-- <ul class="pd-tags">
                                                                    <li><span>CATEGORIES</span>: More Accessories, Wallets & Cases
                                                                    </li>
                                                                    <li><span>TAGS</span>: Clothing, T-shirt, Woman</li>
                                                                </ul> -->
                                                                <!-- <div class="pd-share">
                                                                    <div class="p-code">Sku : 00012</div>
                                                                    <div class="pd-social">
                                                                        <a href="#"><i class="ti-facebook"></i></a>
                                                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                                                        <a href="#"><i class="ti-linkedin"></i></a>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        <!-- Model end -->
                    </div>
                </div>
            </div>
        </section>
    <!-- Man section end  -->

     <!-- Image Section Begin -->
        <div class="photo">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-6 ">
                        <a href="#"><img class="img-fluid img-hover" src="img/For_him.jpg" alt=""></a>
                    </div>
                    <div class="col-lg-6">
                        <a href="#"><img class="img-fluid img-hover" src="img/For_her.jpg" alt=""></a>
                    </div>
                </div>
            </div>

        </div>
    <!-- image Section End -->

    <!-- Woman Section  -->
        <section class="women-banner spad">
            <div class="container-fluid">
                <div class="row">
                    <!-- <div class="col-lg-3">
                        <div class="product-large set-bg" data-setbg="img/products/women-large.jpg">
                            <h2>Women’s</h2>
                            <a href="#">Discover More</a>
                        </div>
                    </div> -->
                    <div class="col-lg-10 offset-lg-1">
                        <div class="filter-control">
                            <!-- <ul>
                                <li class="active">woman</li>


                            </ul> -->
                            <h2>Best Selling Products</h2>
                            <img src="{{ URL::asset('public/assets/frontend/img/floral-border.png')}}" alt="">
                        </div>
                        <div class="product-slider owl-carousel">
                            @foreach($product as $item)
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="{{asset('public/productImage/'.$item->image1)}}" alt="">
                                        <div class="sale">Sale</div>
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"
                                                    href="#">+ Quick View</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">Coat</div>
                                        <a href="#">
                                            <h5>{{$item->name}}</h5>
                                        </a>
                                        <div class="product-price">
                                        &#2547;{{$item->price}}
                                            <span>&#2547;{{$item->old_price}}</span>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                        <!-- Model start  -->
                            @foreach($product as $item)
                                <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header border-0">

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">

                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="product-pic-zoom">
                                                                <img class="product-big-img" src="{{asset('public/productImage/'.$item->image1)}}" alt="">
                                                                <div class="zoom-icon">
                                                                    <i class="fa fa-search-plus"></i>
                                                                </div>
                                                            </div>
                                                            <div class="product-thumbs">
                                                                <div class="product-thumbs-track ps-slider owl-carousel">
                                                                    <div class="pt active"
                                                                        data-imgbigurl="{{asset('public/productImage/'.$item->image1)}}"><img
                                                                            src="{{asset('public/productImage/'.$item->image1)}}" alt=""></div>
                                                                    <div class="pt" data-imgbigurl="{{asset('public/productImage/'.$item->image2)}}"><img
                                                                            src="{{asset('public/productImage/'.$item->image2)}}" alt=""></div>
                                                                    <div class="pt" data-imgbigurl="{{asset('public/productImage/'.$item->image3)}}"><img
                                                                            src="{{asset('public/productImage/'.$item->image3)}}" alt=""></div>
                                                                    <div class="pt" data-imgbigurl="{{asset('public/productImage/'.$item->image4)}}"><img
                                                                            src="{{asset('public/productImage/'.$item->image4)}}" alt=""></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="product-details">
                                                                <div class="pd-title">
                                                                    <span>oranges</span>
                                                                    <h3>{{$item->name}} </h3>
                                                                    <a href="#" class="heart-icon"><i
                                                                            class="icon_heart_alt"></i></a>
                                                                </div>
                                                                <div class="pd-rating">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <span>(5)</span>
                                                                </div>
                                                                <div class="pd-desc">
                                                                    <!-- <p>Lorem ipsum dolor sit amet, consectetur ing elit, sed do
                                                                        eiusmod tempor sum dolor
                                                                        sit amet, consectetur adipisicing elit, sed do mod tempor
                                                                    </p> -->
                                                                    {!! $item->short_description !!}
                                                                    <h4>&#2547;{{$item->price}} <span>629.99</span></h4>
                                                                </div>

                                                                <div class="quantity">
                                                                    <div class="pro-qty">
                                                                        <input type="text" value="1">
                                                                    </div>
                                                                    <a href="#" class="primary-btn pd-cart">Add To Cart</a>
                                                                </div>
                                                                <!-- <ul class="pd-tags">
                                                                    <li><span>CATEGORIES</span>: More Accessories, Wallets & Cases
                                                                    </li>
                                                                    <li><span>TAGS</span>: Clothing, T-shirt, Woman</li>
                                                                </ul> -->
                                                                <!-- <div class="pd-share">
                                                                    <div class="p-code">Sku : 00012</div>
                                                                    <div class="pd-social">
                                                                        <a href="#"><i class="ti-facebook"></i></a>
                                                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                                                        <a href="#"><i class="ti-linkedin"></i></a>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        <!-- Model end -->
                    </div>
                </div>
            </div>
        </section>
    <!-- woman section end  -->


     <!-- Latest Blog Section Begin -->
         <section class="latest-blog spad">
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 offset-lg-1">
                        <div class="filter-control">
                            <!-- <ul>
                                <li class="active">woman</li>


                            </ul> -->
                            <h2>From The Blog</h2>
                            <img src="{{ URL::asset('public/assets/frontend/img/floral-border.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-blog">
                            <img src="{{ URL::asset('public/assets/frontend/img/blog1.jpg')}}" alt="">
                            <div class="latest-text">
                                <div class="tag-list">
                                    <!--<div class="tag-item">-->
                                    <!--    <i class="fa fa-calendar-o"></i>-->
                                    <!--    May 4,2019-->
                                    <!--</div>-->
                                    <!--<div class="tag-item">-->
                                    <!--    <i class="fa fa-comment-o"></i>-->
                                    <!--    5-->
                                    <!--</div>-->
                                </div>
                                <a href="#">
                                    <h4>The Best Oud Fragrance for Women</h4>
                                </a>
                                <p>Oud Perfume for Women is a refined and woody scent that can be worn in the morning or evening to set the mood. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-blog">
                            <img src="{{ URL::asset('public/assets/frontend/img/blog2.jpg')}}" alt="">
                            <div class="latest-text">
                                <div class="tag-list">
                                    <!--<div class="tag-item">-->
                                    <!--    <i class="fa fa-calendar-o"></i>-->
                                    <!--    May 4,2019-->
                                    <!--</div>-->
                                    <!--<div class="tag-item">-->
                                    <!--    <i class="fa fa-comment-o"></i>-->
                                    <!--    5-->
                                    <!--</div>-->
                                </div>
                                <a href="#">
                                    <h4>Have you tried mixing different perfumes?</h4>
                                </a>
                                <p>Wearing just one perfume can be boring. Mix and match scents to form your own signature scent. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-blog">
                            <img src="{{ URL::asset('public/assets/frontend/img/blog3.jpg')}}" alt="">
                            <div class="latest-text">
                                <div class="tag-list">
                                    <!--<div class="tag-item">-->
                                    <!--    <i class="fa fa-calendar-o"></i>-->
                                    <!--    May 4,2019-->
                                    <!--</div>-->
                                    <!--<div class="tag-item">-->
                                    <!--    <i class="fa fa-comment-o"></i>-->
                                    <!--    5-->
                                    <!--</div>-->
                                </div>
                                <a href="#">
                                    <h4>Fragrance Hacks to Smell Amazing All Day</h4>
                                </a>
                                <p>You spend a lot of money on that bottle of perfume which defines your style. But, it’s a waste if it goes unnoticed. </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    <!-- Latest Blog Section End -->

    <div class="container ">
        <div class="benefit-items">
            <div class="row ">
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="{{ URL::asset('public/assets/frontend/img/icon-1.png')}}" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Delivery Charge</h6>
                            <p>Inside Dhaka:&#2547;60</p>
                            <p class=" mt-0">Outside Dhaka:&#2547;130</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="{{ URL::asset('public/assets/frontend/img/icon-2.png')}}" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Delivery On Time</h6>
                            <p >All Over Bangladesh </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="{{ URL::asset('public/assets/frontend/img/icon-1.png')}}" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Secure Payment</h6>
                            <p>100% secure payment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Partner Logo Section Begin -->
        <div class="partner-logo">
            <div class="container">
                <div class="logo-carousel owl-carousel">
                    <div class="logo-item">
                        <div class="tablecell-inner">
                            <img src="{{ URL::asset('public/assets/frontend/img/logo-carousel/Al-Rehab.png')}}" alt="">
                        </div>
                    </div>
                    <div class="logo-item">
                        <div class="tablecell-inner">
                            <img src="{{ URL::asset('public/assets/frontend/img/logo-carousel/Bentley.png')}}" alt="">
                        </div>
                    </div>
                    <div class="logo-item">
                        <div class="tablecell-inner">
                            <img src="{{ URL::asset('public/assets/frontend/img/logo-carousel/Lattafa.png')}}" alt="">
                        </div>
                    </div>
                    <div class="logo-item">
                        <div class="tablecell-inner">
                            <img src="{{ URL::asset('public/assets/frontend/img/logo-carousel/Afnan.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="logo-item">
                        <div class="tablecell-inner">
                            <img src="{{ URL::asset('public/assets/frontend/img/logo-carousel/Nusuk.png')}}" alt="">
                        </div>
                    </div>
                    <div class="logo-item">
                        <div class="tablecell-inner">
                            <img src="{{ URL::asset('public/assets/frontend/img/logo-carousel/Paris Corner.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="logo-item">
                        <div class="tablecell-inner">
                            <img src="{{ URL::asset('public/assets/frontend/img/logo-carousel/Nabeel.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="logo-item">
                        <div class="tablecell-inner">
                            <img src="{{ URL::asset('public/assets/frontend/img/logo-carousel/Zara.png')}}" alt="">
                        </div>
                    </div>
                    <div class="logo-item">
                        <div class="tablecell-inner">
                            <img src="{{ URL::asset('public/assets/frontend/img/logo-carousel/Mancera.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="logo-item">
                        <div class="tablecell-inner">
                            <img src="{{ URL::asset('public/assets/frontend/img/logo-carousel/Swiss Arabian.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Partner Logo Section End -->

@endsection