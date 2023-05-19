 <!-- Header Section Begin -->
 <header class="header-section ">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        info@arabianshelf.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +880 197 0034044

                    </div>
                </div>
                <div class="ht-right">

                    @guest
                        <a href="{{ route('register') }}" class="login-panel"><i class="fa fa-user"></i>Register</a>
                        <a href="{{ route('login') }}" class="login-panel"><i class="fa fa-user"></i>Login</a>

                    @else
                    <!-- class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" -->
                        <button class="btn btn-link btn-sm dropdown-toggle login-panel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('userprofile') }}">Profile</a>
                            <!-- <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a> -->
                            <div class="dropdown-divider"></div>

                            <!-- <a class="dropdown-item" > -->

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="dropdown-item">
                                @csrf

                                <!-- <a class="btn btn-link" > <b>Logout</b> </a> -->
                                <button class="btn btn-link "><b style="color:black;">Logout</b></button>
                            </form>
                             <!-- </a> -->
                        </div>




                    @endguest
                    <a data-toggle="modal" data-target="#track_order" class="login-panel"></i>Track Order</a>
                    {{-- model for track order --}}
                    <div class="modal fade" id="track_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Track Order</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <form class="card-body "   role="form" method="POST" action="{{route('trackorder')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label>Invoice  Number*</label>
                                            <input type="text" class="form-control" name="track_id" placeholder="Enter ...">

                                        </div>
                                        <!-- /.form-group -->
                                        <button type="sumbit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                          </div>
                        </div>
                      </div>
                    {{-- model end  --}}
                    <!-- <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="img/flag-1.jpg" data-imagecss="flag yt" data-title="English">
                            </option>
                            English</option>
                            <option value='yu' data-image="img/flag-2.jpg" data-imagecss="flag yu"
                                data-title="Bangladesh">German </option>
                        </select>



                    </div> -->

                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>

                </div>

            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{ route('index') }}">
                                <!-- <b>Arabian Shelf</b> -->
                                <img src="{{ URL::asset('public/assets/frontend/img/logo1.png')}}" alt="" style="height: 80px; width:70px">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <div class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <!-- <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li> -->
                            <li class="cart-icon">
                                <a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span>{{Cart::content()->count()}}</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                @foreach(Cart::content() as $cart)
                                                <tr>
                                                    <td class="si-pic"><img src="{{asset('public/productImage/'.$cart->options['image'])}}" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>&#2547;{{$cart->price}} x {{$cart->qty}}</p>
                                                            <h6>{{$cart->name}}</h6>
                                                        </div>
                                                    </td>
                                                    <form action="{{route('cartremove',$cart->rowId)}}" method="post">
                                                        @csrf
                                                            <td class="si-close">
                                                                <button style="border: none;

                                                                            background: none;
                                                                            cursor:pointer;"><i class="ti-close"></button></i></td>
                                                    </form>
                                                    <!-- <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td> -->
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>&#2547;{{Cart::subtotal()}}</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="{{route('cart')}}" class="primary-btn view-card">VIEW CART</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">&#2547;{{Cart::subtotal()}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item " id="navbar_top">
            <div class="container-xl">
                <!-- <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">Women’s Clothing</a></li>
                            <li><a href="#">Men’s Clothing</a></li>
                            <li><a href="#">Underwear</a></li>
                            <li><a href="#">Kid's Clothing</a></li>
                            <li><a href="#">Brand Fashion</a></li>
                            <li><a href="#">Accessories/Shoes</a></li>
                            <li><a href="#">Luxury Brands</a></li>
                            <li><a href="#">Brand Outdoor Apparel</a></li>
                        </ul>
                    </div>
                </div> -->
                <nav class="nav-menu mobile-menu  ">

                    <ul>
                        <!-- <li class="active"><a href="./index.html">Home</a></li> -->
                        <!-- <li><a href="#">AROMA THERAPY AND HOME FRAGRANCE</a></li> -->

                        @foreach($menus as $item)
                        <li><a href="{{ route('shop.with.menu',['slug'=>$item->name]) }}">
                                {{$item->name}}
                            </a>
                            <ul class="dropdown">
                                @foreach($item->submenus as $item1)
                                <li><a href="{{ route('shop.with.submenu',['slug'=>$item1->slug]) }}">{{$item1->name}}
                                    </a></li>

                                @endforeach
                            </ul>
                        </li>
                        @endforeach

                    </ul>

                </nav>

                <div id="mobile-menu-wrap"></div>
            </div>
        </div>

    </header>


    <!-- Header End -->
