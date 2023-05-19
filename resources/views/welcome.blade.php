<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stop N Shop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/style.css')}}" type="text/css">

    <script type="text/javascript">
        /// some script

        // jquery ready start
        $(document).ready(function () {
            // jQuery code

            //////////////////////// Prevent closing from click inside dropdown
            $(document).on('click', '.dropdown-menu', function (e) {
                e.stopPropagation();
            });


        }); // jquery end
    </script>

    <style type="text/css">
        @media all and (min-width: 992px) {
            .navbar {
                padding-top: 0;
                padding-bottom: 0;
            }

            .navbar .has-megamenu {
                position: static !important;
            }

            .navbar .megamenu {
                left: 0;
                right: 0;
                width: 80%;
                padding: 20px;
            }

            .navbar .nav-link {
                padding-top: 1rem;
                padding-bottom: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Header Section Begin -->
    <header class="header-section ">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        hello.stopNshop@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +65 11.188.888
                    </div>
                </div>
                <div class="ht-right">
                    <a href="#" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    <div class="lan-selector">
                        <!-- <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="img/flag-1.jpg" data-imagecss="flag yt" data-title="English">
                            </option>
                            English</option>
                            <option value='yu' data-image="img/flag-2.jpg" data-imagecss="flag yu"
                                data-title="Bangladesh">German </option>
                        </select> -->



                    </div>
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
                            <a href="./index.html">
                                <img src="{{ URL::asset('public/assets/frontend/img/logostopnshop.png')}}" alt="" style="height: 60px; width:100px">
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
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span>3</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="si-pic"><img src="{{ URL::asset('public/assets/frontend/img/select-product-1.jpg')}}" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="si-pic"><img src="{{ URL::asset('public/assets/frontend/img/select-product-2.jpg')}}" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>$120.00</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">$150.00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item " id="navbar_top">
            <div class="container-fluid">
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
                        <li><a href="./shop.html">AROMA THERAPY AND HOME FRAGRANCE</a></li>


                        <li><a href="#">
                                FRAGRANCE & BEAUTY PRODUCTS
                            </a>
                            <ul class="dropdown">
                                <li><a href="#">Men Fragrances
                                    </a></li>
                                <li><a href="#"> Women Fragrances
                                    </a></li>
                                <li><a href="#">Unisex Fragrances</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">
                                ORIENTAL MIDDLE EASTERN FRAGRANCES</a></li>
                        <li><a href="./contact.html">Men's Fashion</a></li>
                        <li><a href="#">COSMETICS</a>
                            <ul class="dropdown">
                                <li><a href="./blog-details.html">FACE CARE
                                    </a></li>
                                <li><a href="./shopping-cart.html">BODY CARE
                                    </a></li>
                                <li><a href="./check-out.html"> HAIR CARE
                                    </a></li>
                                <li><a href="./faq.html"> FOOT CARE</a></li>

                            </ul>
                        </li>
                        <li><a href="#">FRAGRANCE & BEAUTY PRODUCTS</a>
                            <ul class="dropdown">
                                <li><a href="./blog-details.html">FACE CARE
                                    </a></li>
                                <li><a href="./shopping-cart.html">BODY CARE
                                    </a></li>
                                <li><a href="./check-out.html"> HAIR CARE
                                    </a></li>
                                <li><a href="./faq.html"> FOOT CARE</a></li>

                            </ul>
                        </li>
                    </ul>

                </nav>

                <div id="mobile-menu-wrap"></div>
            </div>
        </div>

    </header>

    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="{{ URL::asset('public/assets/frontend/img/hero-3.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Stop N Shop</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="{{ URL::asset('public/assets/frontend/img/hero-2.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Stop N Shop</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="{{ URL::asset('public/assets/frontend/img/hero-1.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Stop N Shop</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-lg-10 offset-lg-1">
                    <div class="filter-control">
                        <!-- <ul>
                            <li class="active">woman</li>
    
    
                        </ul> -->
                        <h2>Shop By Category</h2>
                        <img src="{{ URL::asset('public/assets/frontend/img/floral-border.png')}}" alt="">
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img src="{{ URL::asset('public/assets/frontend/img/banner-1.jpg')}}" alt="">
                        <div class="inner-text">
                            <h4>Men’s</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img src="{{ URL::asset('public/assets/frontend/img/banner-2.jpg')}}" alt="">
                        <div class="inner-text">
                            <h4>Women’s</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img src="{{ URL::asset('public/assets/frontend/img/banner-3.jpg')}}" alt="">
                        <div class="inner-text">
                            <h4>Kid’s</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img src="{{ URL::asset('public/assets/frontend/img/banner-3.jpg')}}" alt="">
                        <div class="inner-text">
                            <h4>Kid’s</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img src="{{ URL::asset('public/assets/frontend/img/banner-2.jpg')}}" alt="">
                        <div class="inner-text">
                            <h4>Women’s</h4>
                        </div>
                    </div>
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
                        <h2>Products</h2>
                        <img src="{{ URL::asset('public/assets/frontend/img/floral-border.png')}}" alt="">
                    </div>
                    <div class="product-slider owl-carousel">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ URL::asset('public/assets/frontend/img/products/women-1.jpg')}}" alt="">
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter"
                                            href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Coat</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $14.00
                                    <span>$35.00</span>
                                </div>
                            </div>

                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ URL::asset('public/assets/frontend/img/products/women-2.jpg')}}" alt="">
                                <div class="sale pp-out">out of stock</div>
                                <!-- <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div> -->
                                <ul>
                                    <!-- <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li> -->
                                    <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter">+
                                            Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Shoes</div>
                                <a href="#">
                                    <h5>Guangzhou sweater</h5>
                                </a>
                                <div class="product-price">
                                    $13.00
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ URL::asset('public/assets/frontend/img/products/women-3.jpg')}}" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter">+
                                            Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $34.00
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ URL::asset('public/assets/frontend/img/products/women-4.jpg')}}" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter">+
                                            Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Converse Shoes</h5>
                                </a>
                                <div class="product-price">
                                    $34.00
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ URL::asset('public/assets/frontend/img/products/women-4.jpg')}}" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter">+
                                            Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Converse Shoes</h5>
                                </a>
                                <div class="product-price">
                                    $34.00
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Model start  -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                                                    <img class="product-big-img" src="{{ URL::asset('public/assets/frontend/img/products/women-4.jpg')}}" alt="">
                                                    <div class="zoom-icon">
                                                        <i class="fa fa-search-plus"></i>
                                                    </div>
                                                </div>
                                                <div class="product-thumbs">
                                                    <div class="product-thumbs-track ps-slider owl-carousel">
                                                        <div class="pt active"
                                                            data-imgbigurl="{{ URL::asset('public/assets/frontend/img/products/women-4.jpg')}}"><img
                                                                src="{{ URL::asset('public/assets/frontend/img/products/women-4.jpg')}}" alt=""></div>
                                                        <div class="pt" data-imgbigurl="{{ URL::asset('public/assets/frontend/img/products/women-4.jpg')}}"><img
                                                                src="{{ URL::asset('public/assets/frontend/img/products/women-4.jpg')}}" alt=""></div>
                                                        <div class="pt" data-imgbigurl="{{ URL::asset('public/assets/frontend/img/products/women-4.jpg')}}"><img
                                                                src="{{ URL::asset('public/assets/frontend/img/products/women-4.jpg')}}" alt=""></div>
                                                        <div class="pt" data-imgbigurl="{{ URL::asset('public/assets/frontend/img/products/women-2.jpg')}}"><img
                                                                src="{{ URL::asset('public/assets/frontend/img/products/women-2.jpg')}}" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="product-details">
                                                    <div class="pd-title">
                                                        <span>oranges</span>
                                                        <h3>new new </h3>
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
                                                        <p>Lorem ipsum dolor sit amet, consectetur ing elit, sed do
                                                            eiusmod tempor sum dolor
                                                            sit amet, consectetur adipisicing elit, sed do mod tempor
                                                        </p>
                                                        <h4>$495.00 <span>629.99</span></h4>
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
                        <h1>My Perfumes Online Shop Bangladesh</h1>
                        <!-- <img src="img/floral-border.png" alt=""> -->
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
                        <h2>Man</h2>
                        <img src="{{ URL::asset('public/assets/frontend/img/floral-border.png')}}" alt="">
                    </div>
                    <div class="product-slider owl-carousel">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/products/women-1.jpg" alt="">
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter"
                                            href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Coat</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $14.00
                                    <span>$35.00</span>
                                </div>
                            </div>

                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ URL::asset('public/assets/frontend/img/products/women-2.jpg')}}" alt="">
                                <div class="sale pp-out">out of stock</div>
                                <!-- <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div> -->
                                <ul>
                                    <!-- <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li> -->
                                    <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter">+
                                            Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Shoes</div>
                                <a href="#">
                                    <h5>Guangzhou sweater</h5>
                                </a>
                                <div class="product-price">
                                    $13.00
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ URL::asset('public/assets/frontend/img/products/women-3.jpg')}}" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter">+
                                            Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $34.00
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ URL::asset('public/assets/frontend/img/products/women-4.jpg')}}" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter">+
                                            Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Converse Shoes</h5>
                                </a>
                                <div class="product-price">
                                    $34.00
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ URL::asset('public/assets/frontend/img/products/women-4.jpg')}}" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter">+
                                            Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Converse Shoes</h5>
                                </a>
                                <div class="product-price">
                                    $34.00
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Model start  -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                                                    <img class="product-big-img" src="{{ URL::asset('public/assets/frontend/img/products/women-4.jpg')}}" alt="">
                                                    <div class="zoom-icon">
                                                        <i class="fa fa-search-plus"></i>
                                                    </div>
                                                </div>
                                                <div class="product-thumbs">
                                                    <div class="product-thumbs-track ps-slider owl-carousel">
                                                        <div class="pt active"
                                                            data-imgbigurl="img/products/women-4.jpg"><img
                                                                src="img/products/women-4.jpg" alt=""></div>
                                                        <div class="pt" data-imgbigurl="img/products/women-4.jpg"><img
                                                                src="img/products/women-4.jpg" alt=""></div>
                                                        <div class="pt" data-imgbigurl="img/products/women-4.jpg"><img
                                                                src="img/products/women-4.jpg" alt=""></div>
                                                        <div class="pt" data-imgbigurl="img/products/women-2.jpg"><img
                                                                src="img/products/women-2.jpg" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="product-details">
                                                    <div class="pd-title">
                                                        <span>oranges</span>
                                                        <h3>new new </h3>
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
                                                        <p>Lorem ipsum dolor sit amet, consectetur ing elit, sed do
                                                            eiusmod tempor sum dolor
                                                            sit amet, consectetur adipisicing elit, sed do mod tempor
                                                        </p>
                                                        <h4>$495.00 <span>629.99</span></h4>
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
                    <!-- Model end -->
                </div>
            </div>
        </div>
    </section>
    <!-- Man section end  -->



    <!-- Man Banner Section Begin -->
    <!-- <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Clothings</li>
                            <li>HandBag</li>
                            <li>Shoes</li>
                            <li>Accessories</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/products/man-1.jpg" alt="">
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Coat</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $14.00
                                    <span>$35.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/products/man-2.jpg" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Shoes</div>
                                <a href="#">
                                    <h5>Guangzhou sweater</h5>
                                </a>
                                <div class="product-price">
                                    $13.00
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/products/man-3.jpg" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $34.00
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/products/man-4.jpg" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Converse Shoes</h5>
                                </a>
                                <div class="product-price">
                                    $34.00
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="img/products/man-large.jpg">
                        <h2>Men’s</h2>
                        <a href="#">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Man Banner Section End -->

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
                        <h2>Woman</h2>
                        <img src="img/floral-border.png" alt="">
                    </div>
                    <div class="product-slider owl-carousel">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/products/women-1.jpg" alt="">
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter"
                                            href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Coat</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $14.00
                                    <span>$35.00</span>
                                </div>
                            </div>

                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/products/women-2.jpg" alt="">
                                <div class="sale pp-out">out of stock</div>
                                <!-- <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div> -->
                                <ul>
                                    <!-- <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li> -->
                                    <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter">+
                                            Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Shoes</div>
                                <a href="#">
                                    <h5>Guangzhou sweater</h5>
                                </a>
                                <div class="product-price">
                                    $13.00
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/products/women-3.jpg" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter">+
                                            Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $34.00
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/products/women-4.jpg" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter">+
                                            Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Converse Shoes</h5>
                                </a>
                                <div class="product-price">
                                    $34.00
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/products/women-4.jpg" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a data-toggle="modal" data-target="#exampleModalCenter">+
                                            Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Converse Shoes</h5>
                                </a>
                                <div class="product-price">
                                    $34.00
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Model start  -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                                                    <img class="product-big-img" src="img/products/women-4.jpg" alt="">
                                                    <div class="zoom-icon">
                                                        <i class="fa fa-search-plus"></i>
                                                    </div>
                                                </div>
                                                <div class="product-thumbs">
                                                    <div class="product-thumbs-track ps-slider owl-carousel">
                                                        <div class="pt active"
                                                            data-imgbigurl="img/products/women-4.jpg"><img
                                                                src="img/products/women-4.jpg" alt=""></div>
                                                        <div class="pt" data-imgbigurl="img/products/women-4.jpg"><img
                                                                src="img/products/women-4.jpg" alt=""></div>
                                                        <div class="pt" data-imgbigurl="img/products/women-4.jpg"><img
                                                                src="img/products/women-4.jpg" alt=""></div>
                                                        <div class="pt" data-imgbigurl="img/products/women-2.jpg"><img
                                                                src="img/products/women-2.jpg" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="product-details">
                                                    <div class="pd-title">
                                                        <span>oranges</span>
                                                        <h3>new new </h3>
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
                                                        <p>Lorem ipsum dolor sit amet, consectetur ing elit, sed do
                                                            eiusmod tempor sum dolor
                                                            sit amet, consectetur adipisicing elit, sed do mod tempor
                                                        </p>
                                                        <h4>$495.00 <span>629.99</span></h4>
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
                        <img src="img/floral-border.png" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="img/latest-1.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>The Best Street Style From London Fashion Week</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="img/latest-2.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>Vogue's Ultimate Guide To Autumn/Winter 2019 Shoes</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="img/latest-3.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>How To Brighten Your Wardrobe With A Dash Of Lime</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Latest Blog Section End -->
    
    <div class="container ">
        <div class="benefit-items">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="img/icon-1.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Free Shipping</h6>
                            <p>For all order over 99$</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="img/icon-2.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Delivery On Time</h6>
                            <p>If good have prolems</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="img/icon-1.png" alt="">
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
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="img/logostopnshop.png" alt="" style="width: 100px;height: 50px;"></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 Bangladesh</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello.stopNshop@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Serivius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="copyright-text ">

                            Copyright &copy;
                            2021 All rights reserved | This
                            template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#"
                                target="_blank">Nxgitsoft</a>

                        </div>
                        <!-- <script>document.write(new Date().getFullYear());</script> -->
                        <!-- <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ URL::asset('public/assets/frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/jquery-ui.min.js')}}"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/jquery.countdown.min.js')}}"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/jquery.zoom.min.js')}}"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/jquery.dd.min.js')}}"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/jquery.slicknav.js')}}"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/main.js')}}"></script>

</body>

</html>