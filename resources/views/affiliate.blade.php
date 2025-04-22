@extends('layouts.master')
@section('content')
<div class="breadcumb-wrapper " data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" style="font-size: 50px">Earn commissions by promoting our tradelines as a trusted publisher.</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('index')}}">Home</a></li>
                <li>Affiliates</li>
            </ul>
        </div>
    </div>
</div>
<div class="space-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mt-5">
                <div class="">
                    <form  method="POST" class="contact-form style2 ajax-contact">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" placeholder="Your name*" class="form-control">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" placeholder="Email address*" class="form-control">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="tel" class="form-control" name="number" id="number" placeholder="Phone number*">
                                <i class="fal fa-phone"></i>
                            </div>
                            <div class="col-12 form-group mb-0">
                                <button class="th-btn btn-fw">Submit</button>
                            </div>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-image style2">
                    <img src="assets/img/hero/contact-image.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection
