@extends('layouts.ecom')

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href='index.html' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Pages <span></span> My Account
        </div>
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-md-3">
                        @include('frontend.ecom.components.profile-menu')
                    </div>
                    <div class="col-md-9">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0">Hello Rosie!</h3>
                            </div>
                            <div class="card-body">
                                <p>
                                    From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>,<br />
                                    manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection