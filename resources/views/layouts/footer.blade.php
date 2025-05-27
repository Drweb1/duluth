

<footer class="footer-wrapper footer-layout1">
    <div class="container">
        {{-- <div class="footer-top">
            <div class="row gx-0 align-items-center">
                <div class="col-xl-6">
                    <div class="footer-newsletter-content">
                        <h3 class="mb-15 mt-n1">Subscribe our Newsletter</h3>
                        <p class="footer-text2">Get started for 1 Month free trial No Purchace required</p>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="footer-newsletter">
                        <form class="newsletter-form style2">
                            <div class="form-group">
                                <i class="fa-sharp fa-light fa-envelope"></i>
                                <input class="form-control" type="email" placeholder="Email Address" required="">
                            </div>
                            <button type="submit" class="th-btn">Subscribe Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="widget-area">
            <div class="row justify-content-between">
                <div class="col-md-10">
                    <div class="widget footer-widget">
                        <div class="th-widget-about">
                            <div class="about-logo">
                                <a class="icon-masking" href="{{route('index')}}"><span data-mask-src="{{asset('assets/img/logo/logo.png')}}" class="mask-icon"></span><img src="{{asset('assets/img/logo/logo.png')}}" alt="Duluth"></a>
                            </div>
                            <p class="about-text">Our Duluth hospital management system simplifies healthcare operations by offering dedicated tools for efficient nurse scheduling, patient tracking, and client management—enhancing care delivery and streamlining administrative tasks for better outcomes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Links</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="{{route('index')}}">Home</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="copyright-wrap text-center">
        <div class="container">
            <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2024 <a href="https://themeforest.net/user/themeholy">Duluth</a>. All Rights Reserved.</p>
        </div>
    </div>
</footer>
