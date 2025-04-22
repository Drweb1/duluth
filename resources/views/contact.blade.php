@extends('layouts.master')

@section('content')
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Contact Us</h1>
            <ul class="breadcumb-menu">
                <li><a href="home-hr-management.html">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</div>
<div class="space">
    <div class="container">
        <div class="row gy-4 flex-row-reverse">
            <div class="col-lg-6 col-xl-7">
                <form action="{{ url('mail') }}" method="POST" class="contact-form2 input-smoke ajax-contact">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 position-relative">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                            <i class="fal fa-user form-icon"></i>
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
                            <i class="fal fa-envelope form-icon"></i>
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <input type="tel" class="form-control" name="number" id="number" placeholder="Phone Number">
                            <i class="fal fa-phone form-icon"></i>
                        </div>
                        {{-- <div class="form-group col-md-6">
                            <select name="subject" id="subject" class="form-select nice-select" required>
                                <option value="" disabled selected hidden>Select Service</option>
                                <option value="Web Development">Web Development</option>
                                <option value="Cyber Security">Cyber Security</option>
                                <option value="App Development">App Development</option>
                                <option value="Cloud Service">Cloud Service</option>
                            </select>
                        </div> --}}
                        <div class="form-group col-12 position-relative">
                            <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Your Message" required></textarea>
                            <i class="fal fa-pencil form-icon"></i>
                        </div>
                        <div class="form-btn col-12">
                            <button class="th-btn">Send Message</button>
                        </div>
                    </div>
                    <p class="form-messages mb-0 mt-3"></p>
                </form>
            </div>
            <div class="col-lg-6 col-xl-5">
                <div class="contact-item-wrap">
                    <div class="title-area mt-n2 mb-40">
                        <h3 class="sec-title">Contact Info</h3>
                        <p>Thank you for your interest in Attach Web Agency. We're excited to hear from you and discuss...</p>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item_icon"><img src="assets/img/icon/phone.svg" alt=""></div>
                        <div class="media-body">
                            <span class="contact-item_title">Call Us For Query</span>
                            <span class="contact-item_text"><a href="tel:+58125253158">(+58-125) 25-3158</a></span>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item_icon"><img src="assets/img/icon/message.svg" alt=""></div>
                        <div class="media-body">
                            <span class="contact-item_title">Email Anytime</span>
                            <span class="contact-item_text"><a href="mailto:accounts@tradelineenvy.com">accounts@tradelineenvy.com</a></span>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item_icon"><img src="assets/img/icon/location.svg" alt=""></div>
                        <div class="media-body">
                            <span class="contact-item_title">Visit Our Office</span>
                            <span class="contact-item_text">15 Maniel Lane, USA</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
