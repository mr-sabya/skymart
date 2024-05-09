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
                                <h3 class="mb-0">Orders tracking</h3>
                            </div>
                            <div class="card-body contact-from-area">
                                <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                            <div class="input-style mb-20">
                                                <label>Order ID</label>
                                                <input name="order-id" placeholder="Found in your order confirmation email" type="text" />
                                            </div>
                                            <div class="input-style mb-20">
                                                <label>Billing email</label>
                                                <input name="billing-email" placeholder="Email you used during checkout" type="email" />
                                            </div>
                                            <button class="submit submit-auto-width" type="submit">Track</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-3 mb-lg-0">
                                    <div class="card-header">
                                        <h3 class="mb-0">Billing Address</h3>
                                    </div>
                                    <div class="card-body">
                                        <address>
                                            3522 Interstate<br />
                                            75 Business Spur,<br />
                                            Sault Ste. <br />Marie, MI 49783
                                        </address>
                                        <p>New York</p>
                                        <a href="#" class="btn-small">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Shipping Address</h5>
                                    </div>
                                    <div class="card-body">
                                        <address>
                                            4299 Express Lane<br />
                                            Sarasota, <br />FL 34249 USA <br />Phone: 1.941.227.4444
                                        </address>
                                        <p>Sarasota</p>
                                        <a href="#" class="btn-small">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5>Account Details</h5>
                            </div>
                            <div class="card-body">
                                <p>Already have an account? <a href='page-login.html'>Log in instead!</a></p>
                                <form method="post" name="enq">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>First Name <span class="required">*</span></label>
                                            <input required="" class="form-control" name="name" type="text" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Last Name <span class="required">*</span></label>
                                            <input required="" class="form-control" name="phone" />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Display Name <span class="required">*</span></label>
                                            <input required="" class="form-control" name="dname" type="text" />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input required="" class="form-control" name="email" type="email" />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Current Password <span class="required">*</span></label>
                                            <input required="" class="form-control" name="password" type="password" />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>New Password <span class="required">*</span></label>
                                            <input required="" class="form-control" name="npassword" type="password" />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Confirm Password <span class="required">*</span></label>
                                            <input required="" class="form-control" name="cpassword" type="password" />
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection