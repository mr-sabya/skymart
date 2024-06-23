@extends('layouts.ecom')

@section('content')
<section class="home-slider style-2 position-relative mb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-12">
                <div class="home-slide-cover">
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                        <div class="single-hero-slider single-animation-wrap" style="background-image: url(assets/frontend/imgs/slider/slider-3.png)">
                            <div class="slider-content">
                                <h1 class="display-2 mb-40">
                                    Pure Coffe Big discount
                                </h1>
                                <p class="mb-65">Save up to 50% off on your first order</p>
                                <div class="form-subcriber">
                                    <a href="#" class="btn" type="submit">Shop Now</a>
                                </div>

                            </div>
                        </div>
                        <div class="single-hero-slider single-animation-wrap" style="background-image: url(assets/frontend/imgs/slider/slider-4.png)">
                            <div class="slider-content">
                                <h1 class="display-2 mb-40">
                                    Snacks box daily save
                                </h1>
                                <p class="mb-65">Sign up for the daily newsletter</p>
                                <div class="form-subcriber">
                                    <a href="#" class="btn" type="submit">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </div>
            <div class="col-lg-4 d-none d-xl-block">
                <div class="banner-img style-3 animated animated">
                    <div class="banner-text mt-50">
                        <h2 class="mb-50">
                            Delivered <br />
                            to
                            <span class="text-brand">your<br />
                                home</span>
                        </h2>
                        <a class='btn btn-xs' href='shop-grid-right.html'>Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--End hero slider-->
<section class="banners mb-25">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="banner-img">
                    <img src="{{ url('assets/frontend/imgs/banner/banner-1.png') }}" alt="" />
                    <div class="banner-text">
                        <h4>
                            Everyday Fresh & <br />Clean with Our<br />
                            Products
                        </h4>
                        <a class='btn btn-xs' href='shop-grid-right.html'>Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="banner-img">
                    <img src="{{ url('assets/frontend/imgs/banner/banner-2.png') }}" alt="" />
                    <div class="banner-text">
                        <h4>
                            Make your Breakfast<br />
                            Healthy and Easy
                        </h4>
                        <a class='btn btn-xs' href='shop-grid-right.html'>Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-md-none d-lg-flex">
                <div class="banner-img mb-sm-0">
                    <img src="{{ url('assets/frontend/imgs/banner/banner-3.png') }}" alt="" />
                    <div class="banner-text">
                        <h4>The best Organic <br />Products Online</h4>
                        <a class='btn btn-xs' href='shop-grid-right.html'>Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End banners-->


<x-ecom.popular-products></x-ecom.popular-products>
<!--Products Tabs-->


<x-ecom.best-selling></x-ecom.best-selling>
<!--End Best Sales-->


<x-ecom.deals></x-ecom.deals>
<!--End Deals-->


@include('frontend.ecom.components.top-products')
<!--End 4 columns-->


@include('frontend.ecom.components.category-slider')
<!--End category slider-->

@endsection