@extends('layouts.master')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{route('index')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                            <li><a href="#">Men</a></li>
                            <li><a href="#">Women</a></li>
                            <li><a href="#">Kids</a></li>
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Brand</h4>
                        <div class="fw-brand-check">
                            <div class="bc-item">
                                <label for="bc-calvin">
                                    Calvin Klein
                                    <input type="checkbox" id="bc-calvin">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-diesel">
                                    Diesel
                                    <input type="checkbox" id="bc-diesel">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-polo">
                                    Polo
                                    <input type="checkbox" id="bc-polo">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-tommy">
                                    Tommy Hilfiger
                                    <input type="checkbox" id="bc-tommy">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Price</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="33" data-max="98">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <a href="#" class="filter-btn">Filter</a>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                            <div class="cs-item">
                                <input type="radio" id="cs-black">
                                <label class="cs-black" for="cs-black">Black</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-violet">
                                <label class="cs-violet" for="cs-violet">Violet</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-blue">
                                <label class="cs-blue" for="cs-blue">Blue</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-yellow">
                                <label class="cs-yellow" for="cs-yellow">Yellow</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-red">
                                <label class="cs-red" for="cs-red">Red</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-green">
                                <label class="cs-green" for="cs-green">Green</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            <div class="sc-item">
                                <input type="radio" id="s-size">
                                <label for="s-size">s</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="m-size">
                                <label for="m-size">m</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="l-size">
                                <label for="l-size">l</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="xs-size">
                                <label for="xs-size">xs</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            <a href="#">Towel</a>
                            <a href="#">Shoes</a>
                            <a href="#">Coat</a>
                            <a href="#">Dresses</a>
                            <a href="#">Trousers</a>
                            <a href="#">Men's hats</a>
                            <a href="#">Backpack</a>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p>Show 01- 09 Of 36 Product</p>
                            </div>
                        </div>
                    </div> -->
                    <div class="product-list">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-lg-3 col-sm-6 content">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <a href="{{route('product',$product->slug)}}">
                                            <img src="{{asset('public/productImage/'.$product->image1)}}" alt="">
                                        </a>
                                        @if($product->old_price != null)
                                        <div class="sale pp-sale">Sale</div>
                                        @endif
                                        <!-- <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div> -->
                                        <ul>
                                            <li class="w-icon active">
                                                @if($product->size == "yes" || $product->volume == "yes" )
                                                    <a data-toggle="modal" data-target="#exampleModalCenter{{$product->id}}" href="#"><i class="icon_bag_alt"></i></a>
                                                @elseif($product->size != "yes" && $product->volume != "yes")
                                                    <form method="post" action="{{route('addtocart')}}" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden"  name="productid" value="{{$product->id}}">
                                                        <input type="hidden" name="qty" value="1">
                                                       <button class="cart-btn" type="submit"><i class="icon_bag_alt"></i></button>
                                                    </form>     
                                                @endif
                                                <!-- <a href="#"><i class="icon_bag_alt"></i></a> -->
                                            </li>
                                            <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter{{$product->id}}"
                                                    href="#">+ Quick View</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <!-- <div class="catagory-name">Towel</div> -->
                                        <a href="{{route('product',$product->slug)}}">
                                            <h5>{{$product->name}}</h5>
                                        </a>
                                        <div class="product-price">
                                        @if($product->volume == "yes")
                                        &#2547;{{$product->volumes()->min('price')}} -  &#2547;{{$product->volumes()->max('price')}}
                                        @else
                                        &#2547;{{$product->main_price}}
                                        @endif
                                        @if($product->old_price != null)
                                            <span>&#2547;{{$product->old_price}}</span>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                           

                        </div> 
                        <!-- Model start  -->
                            @foreach($products as $item)
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
                        <a href="#" id="loadMore">Load More</a>
                    </div>
                    <!-- <div class="loading-more">
                        <i class="icon_loading"></i>
                        <a href="#">
                            Loading More
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
@endsection