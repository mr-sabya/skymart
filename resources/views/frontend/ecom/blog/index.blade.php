@extends('layouts.ecom')

@section('content')
<div class="page-header mt-30 mb-75">
    <div class="container">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-3">
                    <h1 class="mb-15">Blog & News</h1>
                    <div class="breadcrumb">
                        <a href='index.html' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
                        <span></span> Blog & News
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="shop-product-fillter mb-50 pr-30">
                    <div class="totall-product">
                        <h2>
                            <img class="w-36px mr-10" src="{{ url('assets/frontend/imgs/theme/icons/category-1.svg') }}" alt="" />
                            Recips Articles
                        </h2>
                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>Show:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">50</a></li>
                                    <li><a href="#">100</a></li>
                                    <li><a href="#">150</a></li>
                                    <li><a href="#">200</a></li>
                                    <li><a href="#">All</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>Sort:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span>Featured <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">Featured</a></li>
                                    <li><a href="#">Newest</a></li>
                                    <li><a href="#">Most comments</a></li>
                                    <li><a href="#">Release Date</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="loop-grid pr-30">
                    <div class="row">
                        <article class="col-xl-4 col-lg-6 col-md-6 text-center hover-up mb-30 animated">
                            <div class="post-thumb">
                                <a href='blog-post-right.html'>
                                    <img class="border-radius-15" src="{{ url('assets/frontend/imgs/blog/blog-1.png') }}" alt="" />
                                </a>
                                <div class="entry-meta">
                                    <a class='entry-meta meta-2' href='blog-category-grid.html'><i class="fi-rs-heart"></i></a>
                                </div>
                            </div>
                            <div class="entry-content-2">
                                <h6 class="mb-10 font-sm"><a class='entry-meta text-muted' href='blog-category-grid.html'>Side Dish</a></h6>
                                <h4 class="post-title mb-15">
                                    <a href='blog-post-right.html'>The Intermediate Guide to Healthy Food</a>
                                </h4>
                                <div class="entry-meta font-xs color-grey mt-10 pb-10">
                                    <div>
                                        <span class="post-on mr-10">25 April 2024</span>
                                        <span class="hit-count has-dot mr-10">126k Views</span>
                                        <span class="hit-count has-dot">4 mins read</span>
                                    </div>
                                </div>
                            </div>
                        </article>

                    </div>
                </div>
                <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3 primary-sidebar sticky-sidebar">
                <div class="widget-area">
                    <div class="sidebar-widget-2 widget_search mb-50">
                        <div class="search-form">
                            <form action="#">
                                <input type="text" placeholder="Search…" />
                                <button type="submit"><i class="fi-rs-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- category -->
                    <x-ecom.sidebar.category></x-ecom.sidebar.category>

                    <!-- Product sidebar Widget -->
                    <x-ecom.sidebar.products></x-ecom.sidebar.products>
                    
                    <!-- gallery -->
                    <x-ecom.sidebar.gallery></x-ecom.sidebar.gallery>

                    <!--Tags-->
                    <x-ecom.sidebar.tags></x-ecom.sidebar.tags>
                    
                    <!-- banner -->
                    <x-ecom.sidebar.banner></x-ecom.sidebar.banner>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection