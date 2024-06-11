<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    @include('partials.logo')
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="#">
                            <select class="select-active">
                                <option>All Categories</option>
                                <option>Milks and Dairies</option>
                                <option>Wines & Alcohol</option>
                                <option>Clothing & Beauty</option>
                                <option>Pet Foods & Toy</option>
                                <option>Fast food</option>
                                <option>Baking material</option>
                                <option>Vegetables</option>
                                <option>Fresh Seafood</option>
                                <option>Noodles & Rice</option>
                                <option>Ice cream</option>
                            </select>
                            <input type="text" placeholder="Search for items..." />
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <!-- <div class="search-location">
                                <form action="#">
                                    <select class="select-active">
                                        <option>Your Location</option>
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>Arizona</option>
                                        <option>Delaware</option>
                                        <option>Florida</option>
                                        <option>Georgia</option>
                                        <option>Hawaii</option>
                                        <option>Indiana</option>
                                        <option>Maryland</option>
                                        <option>Nevada</option>
                                        <option>New Jersey</option>
                                        <option>New Mexico</option>
                                        <option>New York</option>
                                    </select>
                                </form>
                            </div> -->
                            <div class="header-action-icon-2">
                                <a href='shop-compare.html'>
                                    <img class="svgInject" alt="Nest" src="{{ url('assets/frontend/imgs/theme/icons/icon-compare.svg') }}" />
                                    <span class="pro-count blue">3</span>
                                </a>
                                <a href='shop-compare.html'><span class="lable ml-0">Compare</span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a href='shop-wishlist.html'>
                                    <img class="svgInject" alt="Nest" src="{{ url('assets/frontend/imgs/theme/icons/icon-heart.svg') }}" />
                                    <span class="pro-count blue">6</span>
                                </a>
                                <a href='shop-wishlist.html'><span class="lable">Wishlist</span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class='mini-cart-icon' href='shop-cart.html'>
                                    <img alt="Nest" src="{{ url('assets/frontend/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count blue">2</span>
                                </a>
                                <a href='shop-cart.html'><span class="lable">Cart</span></a>
                                @include('partials.ecom.cart')
                            </div>

                            @auth
                            <div class="header-action-icon-2">
                                <a href="{{ route('profile.index') }}">
                                    <img class="svgInject" alt="Nest" src="{{ url('assets/frontend/imgs/theme/icons/icon-user.svg') }}" />
                                </a>
                                <a href='page-account.html'><span class="lable ml-0">Account</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li><a href='page-account.html'><i class="fi fi-rs-user mr-10"></i>My Account</a></li>
                                        <li><a href='page-account.html'><i class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a></li>
                                        <li><a href='page-account.html'><i class="fi fi-rs-label mr-10"></i>My Voucher</a></li>
                                        <li><a href='shop-wishlist.html'><i class="fi fi-rs-heart mr-10"></i>My Wishlist</a></li>
                                        <li><a href='page-account.html'><i class="fi fi-rs-settings-sliders mr-10"></i>Setting</a></li>
                                        <li><a href="{{ route('logout')}}"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a></li>
                                    </ul>
                                </div>
                            </div>
                            @else
                            <div class="header-action-icon-2">
                                <a href="{{ route('login') }}">
                                    <img class="svgInject" alt="Nest" src="{{ url('assets/frontend/imgs/theme/icons/icon-user.svg') }}" />
                                </a>
                                <a href="{{ route('login') }}"><span class="lable ml-0">Login</span></a>
                                
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    @include('partials.logo')
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> <span class="et">Browse</span> All Categories
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    <li>
                                        <a href='shop-grid-right.html'> <img src="{{ url('assets/frontend/imgs/theme/icons/category-1.svg') }}" alt="" />Milks and Dairies</a>
                                    </li>
                                    <li>
                                        <a href='shop-grid-right.html'> <img src="{{ url('assets/frontend/imgs/theme/icons/category-2.svg') }}" alt="" />Clothing & beauty</a>
                                    </li>
                                    <li>
                                        <a href='shop-grid-right.html'> <img src="{{ url('assets/frontend/imgs/theme/icons/category-3.svg') }}" alt="" />Pet Foods & Toy</a>
                                    </li>
                                    <li>
                                        <a href='shop-grid-right.html'> <img src="{{ url('assets/frontend/imgs/theme/icons/category-4.svg') }}" alt="" />Baking material</a>
                                    </li>
                                    <li>
                                        <a href='shop-grid-right.html'> <img src="{{ url('assets/frontend/imgs/theme/icons/category-5.svg') }}" alt="" />Fresh Fruit</a>
                                    </li>
                                </ul>
                                <ul class="end">
                                    <li>
                                        <a href='shop-grid-right.html'> <img src="{{ url('assets/frontend/imgs/theme/icons/category-6.svg') }}" alt="" />Wines & Drinks</a>
                                    </li>
                                    <li>
                                        <a href='shop-grid-right.html'> <img src="{{ url('assets/frontend/imgs/theme/icons/category-7.svg') }}" alt="" />Fresh Seafood</a>
                                    </li>
                                    <li>
                                        <a href='shop-grid-right.html'> <img src="{{ url('assets/frontend/imgs/theme/icons/category-8.svg') }}" alt="" />Fast food</a>
                                    </li>
                                    <li>
                                        <a href='shop-grid-right.html'> <img src="{{ url('assets/frontend/imgs/theme/icons/category-9.svg') }}" alt="" />Vegetables</a>
                                    </li>
                                    <li>
                                        <a href='shop-grid-right.html'> <img src="{{ url('assets/frontend/imgs/theme/icons/category-10.svg') }}" alt="" />Bread and Juice</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="more_slide_open" style="display: none">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        <li>
                                            <a href='shop-grid-right.html'> <img src="{{ url('assets/frontend/imgs/theme/icons/icon-1.svg') }}" alt="" />Milks and Dairies</a>
                                        </li>
                                        <li>
                                            <a href='shop-grid-right.html'> <img src="{{ url('assets/frontend/imgs/theme/icons/icon-2.svg') }}" alt="" />Clothing & beauty</a>
                                        </li>
                                    </ul>
                                    <ul class="end">
                                        <li>
                                            <a href='shop-grid-right.html'> <img src="{{ url('assets/frontend/imgs/theme/icons/icon-3.svg') }}" alt="" />Wines & Drinks</a>
                                        </li>
                                        <li>
                                            <a href='shop-grid-right.html'> <img src="{{ url('assets/frontend/imgs/theme/icons/icon-4.svg') }}" alt="" />Fresh Seafood</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            @include('partials.ecom.menu')
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-flex">
                    <img src="{{ url('assets/frontend/imgs/theme/icons/icon-headphone.svg') }}" alt="hotline" />
                    <p>1900 - 888<span>24/7 Support Center</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href='shop-wishlist.html'>
                                <img alt="Nest" src="{{ url('assets/frontend/imgs/theme/icons/icon-heart.svg') }}" />
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class='mini-cart-icon' href='#'>
                                <img alt="Nest" src="{{ url('assets/frontend/imgs/theme/icons/icon-cart.svg') }}" />
                                <span class="pro-count white">2</span>
                            </a>
                            @include('partials.ecom.cart')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                @include('partials.logo')
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…" />
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    @include('partials.ecom.menu')
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info">
                    <a href='page-contact.html'><i class="fi-rs-marker"></i> Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href='page-login.html'><i class="fi-rs-user"></i>Log In / Sign Up </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="#"><img src="{{ url('assets/frontend/imgs/theme/icons/icon-facebook-white.svg') }}" alt="" /></a>
                <a href="#"><img src="{{ url('assets/frontend/imgs/theme/icons/icon-twitter-white.svg') }}" alt="" /></a>
                <a href="#"><img src="{{ url('assets/frontend/imgs/theme/icons/icon-instagram-white.svg') }}" alt="" /></a>
                <a href="#"><img src="{{ url('assets/frontend/imgs/theme/icons/icon-pinterest-white.svg') }}" alt="" /></a>
                <a href="#"><img src="{{ url('assets/frontend/imgs/theme/icons/icon-youtube-white.svg') }}" alt="" /></a>
            </div>
            <div class="site-copyright">Copyright 2024 © Nest. All rights reserved. Powered by AliThemes.</div>
        </div>
    </div>
</div>