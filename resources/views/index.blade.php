@extends('layouts.master')
<div class="th-hero-wrapper hero-1" id="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="hero-style1">
                    <span class="sub-title">Welcome to Tradeline Envy</span>
                    <h1 class="hero-title">
                        Effortless Credit Building, Endless Possibilities</h1>
                    <p class="hero-text">Boost your credit fast by leveraging seasoned tradelines. Improve scores, unlock better loans, lower interest rates, and access premium financial opportunities effortlessly.</p>
                    <div class="btn-group">
                        <a href="{{route('about')}}" class="th-btn">Boost Your Credit Today</a>

                    </div>
                    <div class="client-box mb-sm-0 mb-3">
                        <div class="client-thumb-group">
                            <div class="thumb"><img src="assets/img/shape/client-1-1.png" alt="avater"></div>
                            <div class="thumb"><img src="assets/img/shape/client-1-2.png" alt="avater"></div>
                            <div class="thumb"><img src="assets/img/shape/client-1-3.png" alt="avater"></div>
                            <div class="thumb icon"><i class="fa-regular fa-plus"></i></div>
                        </div>
                        <div class="cilent-box">
                            <h4 class="box-title"><span class="counter-number">10</span>k+ Happy Clients</h4>
                            <div class="client-wrapp">
                                <div class="client-review">
                                    <i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                </div>
                                <span class="rating">4.8 Rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="hero-img tilt-active">
                    <img src="assets/img/hero/hero_1_1.png" alt="Hero Image">
                </div>
            </div>
        </div>
    </div>
    <div class="ripple-shape">
        <span class="ripple-1"></span>
        <span class="ripple-2"></span>
        <span class="ripple-3"></span>
        <span class="ripple-4"></span>
        <span class="ripple-5"></span>
    </div>
    <div class="th-circle">
        <span class="circle style1"></span>
        <span class="circle style2"></span>
        <span class="circle style3"></span>
    </div>
</div>
<div class="about-area space-extra2" id="about-sec">
    <div class="container">
        <div class="row gy-5 align-items-center">
            <div class="col-xl-6">
                <div class="pe-xxl-4 me-xl-3">
                    <div class="title-area mb-35">
                        <h2 class="sec-title">Simple and Powerful Credit-Boosting Solution </h2>
                    </div>
                    <p class="mt-n2 mb-35">Our customer support team is available to assist you through multiple channels, ensuring you have a smooth experience. Whether you prefer reaching out via email, speaking directly with our experts over the phone, or using live chat for real-time help, we're ready to provide quick and effective solutions. Additionally, our comprehensive help center offers detailed guides and FAQs to answer common questions. No matter the issue, you can count on us to support you every step of the way.</p>
                    <div class="about-feature-wrap">
                        <div class="about-feature">
                            <div class="box-icon">
                                <img src="assets/img/icon/about_1_1.svg" alt="Icon">
                            </div>
                            <div class="media-body">
                                <h3 class="box-title">Cost-Effective</h3>
                                <p class="box-text">Our tradeline services offer an affordable way to boost your credit score, providing excellent value with fast and reliable results.</p>
                            </div>
                        </div>
                        <div class="about-feature">
                            <div class="box-icon">
                                <img src="assets/img/icon/about_1_2.svg" alt="Icon">
                            </div>
                            <div class="media-body">
                                <h3 class="box-title">Trusted by Thousands</h3>
                                <p class="box-text">Experience the unique benefits of our tradeline services, helping users enhance their credit scores and achieve financial freedom.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-30 mb-xl-0">
                <div class="img-box1">
                    <div class="img1">
                        <img src="assets/img/hero/about_1_1.png" alt="About">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="space" id="process-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="title-area text-center">
                    <span class="sub-title">How It Works</span>
                    <h2 class="sec-title">Effortlessly Enhance Your Credit with Easy Access.</h2>
                </div>
            </div>
        </div>
        <div class="process-tabs-wrapper">
            <div class="nav nav-tabs process-tabs" id="nav-tab" role="tablist">
                <button class="nav-link th-btn active" id="nav-step1-tab" data-bs-toggle="tab" data-bs-target="#nav-step1" type="button">01.Create account</button>
                <button class="nav-link th-btn" id="nav-step2-tab" data-bs-toggle="tab" data-bs-target="#nav-step2" type="button">02. Install tracking code</button>
                <button class="nav-link th-btn" id="nav-step3-tab" data-bs-toggle="tab" data-bs-target="#nav-step3" type="button">Track analytics</button>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-step1" role="tabpanel">
                    <div class="process-wrapp">
                        <div class="process-content">
                            <div class="process-title-area">
                                <div class="process-icon">
                                    <img src="assets/img/icon/user.svg" alt="">
                                </div>
                                <h3 class="">Explore Tradelines & Begin Your Credit Journey</h3>
                            </div>
                            <p class="process-text">Ensure that your tradeline platform is optimized for mobile devices and tablets, as many users will access their credit-building tools on the go. A responsive design guarantees a seamless and consistent experience, making it easy to manage your tradelines from any device.
                            </p>
                            <a href="{{route('contact')}}" class="th-btn style2">Get Started Now</a>
                        </div>
                        <div class="process-image">
                            <img src="assets/img/hero/process-img.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-step2" role="tabpanel">
                    <div class="process-wrapp">
                        <div class="process-content">
                            <div class="process-title-area">
                                <div class="process-icon">
                                    <img src="assets/img/icon/code.svg" alt="">
                                </div>
                                <h3 class="">Add Your Tradeline & Start Boosting Your Credit</h3>
                            </div>
                            <p class="process-text">Make sure your tradeline website is optimized for mobile devices and tablets, as users will frequently access their accounts on the go. A responsive design ensures a consistent and user-friendly experience across all devices, allowing for easy management of your credit-building tools anywhere, anytime.
                            </p>
                            <a href="{{route('contact')}}" class="th-btn style2">Get Started Now</a>
                        </div>
                        <div class="process-image">
                            <img src="assets/img/hero/process-img-2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-step3" role="tabpanel">
                    <div class="process-wrapp">
                        <div class="process-content">
                            <div class="process-title-area">
                                <div class="process-icon">
                                    <img src="assets/img/icon/search.svg" alt="">
                                </div>
                                <h3 class="">Monitor Your Progress & Secure Your Account</h3>
                            </div>
                            <p class="process-text">Ensure that your tradeline platform is optimized for mobile devices and tablets, as many users will be accessing their accounts on various devices. A responsive design guarantees a smooth and consistent user experience across all screen sizes, making it easy to manage and track your credit-building progress anytime, anywhere. </p>
                            <a href="contact.html" class="th-btn style2">Get Started Now</a>
                        </div>
                        <div class="process-image">
                            <img src="assets/img/hero/process-img-3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

