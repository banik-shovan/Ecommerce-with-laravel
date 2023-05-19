@extends('layouts.master')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{route('index')}}"><i class="fa fa-home"></i> Home</a>
                        <span>About Us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img src="img/banner.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="contact-title">
                        <h4>About Us</h4>
                        
                    </div>
                    <hr>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <!-- <i class="ti-location-pin"></i> -->
                            </div>
                            <div class="ci-text p-5">
                                <!-- <span>Address:</span> -->
                                <p>Welcome to <a href=""> ArabianShelf.com,</a> an online marketplace for your various lifestyle items. Arabian Shelf is a concern of Fakhruddin Associates. <br><br>
                                We have been importing Arabian perfumes and distributing them to the local market. We have a vast collection of perfumes that can enrich your daily social experience.
                                Our shelf is filled with handpicked items to suit your needs. <br><br>
                                Fragrance that defines self-identity is a choice of many individuals. We have collections that are unique and boost your confidence in business or casual meetings or 
                                in any other social occasions. <br><br>

                                Our site is designed in a way so as to make your online shopping experience convenient and intuitive. You can browse your favorite items throughout and check out using your 
                                preferred payment method. <br><br> We accept bank cards (Credit/Debit), mobile financial payment (bKash), and cash.</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection