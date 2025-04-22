@extends('layouts.master')
@section('content')
<div class="breadcumb-wrapper " data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">About Us </h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('index')}}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</div>
<div class="overflow-hidden space" id="about-sec">
    <div class="container">
        <div class="row gy-5 align-items-center">
            <div class="col-xl-6">
                <div class="pe-xxl-4 me-xl-3">
                    <div class="title-area mb-35">
                        <h2 class="sec-title">Build and manage your tradeline business effortlessly.  </h2>
                    </div>
                    <p class="mt-n2 mb-35"> We are committed to providing top-notch support for all your tradeline needs. Our dedicated customer support team is available to assist you via email, phone, and live chat. Whether you have questions about adding tradelines, need guidance on improving your credit score, or encounter any issues along the way, we’re here to help. Additionally, our comprehensive help documentation and FAQs offer detailed information on our services, processes, and credit-building strategies.</p>
                    <div class="about-feature-wrap">
                        <div class="about-feature style3">
                            <div class="box-icon">
                                <img src="assets/img/icon/about_3_1.svg" alt="Icon" style="margin-top: 12px">
                            </div>
                            <div class="media-body">
                                <h3 class="box-title">Affordable Solutions</h3>
                                <p class="box-text">Get impactful tradeline services that deliver value without breaking the bank.</p>
                            </div>

                        </div>
                        <div class="about-feature style3">
                            <div class="box-icon">
                                <img src="assets/img/icon/about_3_2.svg" alt="Icon" style="margin-top: 12px">
                            </div>
                            <div class="media-body">
                                <h3 class="box-title">Industry Recognition</h3>
                                <p class="box-text">Our tradeline solutions have earned top industry accolades for innovation and results.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-30 mb-xl-0">
                <div class="img-box6">
                    <div class="img1">
                        <img src="assets/img/hero/about_5_1.png" alt="About">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class=" overflow-hidden space-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="title-area text-center">
                    <span class="sub-title">Our Process</span>
                    <h2 class="sec-title">Empowering Your Credit Journey with Trusted Tradeline Solutions</h2>
                </div>
            </div>
        </div>
        <div class="process-wrap">
            <div class="process-bg-line">
                <img src="assets/img/bg/process_line.svg" alt="img">
            </div>
            <div class="row gy-80 justify-content-center justify-content-lg-between align-items-center">
                <div class="col-lg-6">
                    <div class="process-thumb-1">
                        <img src="assets/img/hero/process-img-1-1.png" alt="img">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="process-content me-xl-5">
                        <h4 class="process-content-title mb-25">We Boost Your Credit <br class="d-xl-block d-none">with Proven Solutions!</h4>
                        <p class="mb-25">Our tradeline services help elevate your credit score with a streamlined process, connecting you with seasoned credit lines for optimal results and financial growth.</p>
                        <div class="two-column mb-35">
                            <div class="checklist">
                                <ul>
                                    <li><i class="fas fa-check"></i> Quick Credit Enhancement</li>
                                    <li><i class="fas fa-check"></i> Trusted Credit Partners</li>
                                </ul>
                            </div>
                            <div class="checklist">
                                <ul>
                                    <li><i class="fas fa-check"></i> Secure and Confidential</li>
                                    <li><i class="fas fa-check"></i> Tailored Credit Solutions</li>
                                </ul>
                            </div>
                        </div>
                        <div class="btn-wrap">
                            <a href="about.html" class="th-btn style-radius">Get Started Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 order-lg-4">
                    <div class="process-thumb-1">
                        <img src="assets/img/hero/process-img-1-2.png" alt="img">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="process-content left-content me-xl-5">
                        <h4 class="process-content-title mb-25">We Help Elevate Your <br class="d-xl-block d-none"> Credit Score</h4>
                        <p class="mb-25">Utilize our tradeline services to strategically enhance your credit profile, opening doors to better financial opportunities and lending options.</p>
                        <div class="two-column mb-35">
                            <div class="checklist">
                                <ul>
                                    <li><i class="fas fa-check"></i> Select your tradelines</li>
                                    <li><i class="fas fa-check"></i> Personalized guidance</li>
                                </ul>
                            </div>
                            <div class="checklist">
                                <ul>
                                    <li><i class="fas fa-check"></i> Secure transactions</li>
                                    <li><i class="fas fa-check"></i> Fast and reliable</li>
                                </ul>
                            </div>
                        </div>
                        <div class="btn-wrap">
                            <a href="about.html" class="th-btn style-radius">Learn More</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
