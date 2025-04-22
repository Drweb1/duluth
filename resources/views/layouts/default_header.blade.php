<style>
    .icon-btn {
        position: relative; /* Make the parent position relative for absolute positioning of count */
        display: inline-block;
    }

    .cart-count {
        background-color: #ff0000;
    color: #fff;
    border-radius: 50%;
    padding: 15px;
    font-size: 14px;
    height: 20px;
    width: 20px;
    position: absolute;
    top: -20px;
    right: 2px;
    }
</style>
<div class="popup-search-box d-none d-lg-block">
    <button class="searchClose"><i class="fal fa-times"></i></button>
    <form action="#">
        <input type="text" placeholder="What are you looking for?">
        <button type="submit"><i class="fal fa-search"></i></button>
    </form>
</div><!--==============================
Mobile Menu
============================== -->
<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="{{route('index')}}"><img src="{{asset('assets/img/logo/logo.png')}}" alt="Sassa"></a>
        </div>

        <div class="th-mobile-menu">
            <ul>
                <li class="">
                    <a href="{{ route('index') }}">Home</a>
                </li>
                <li class="">
                    <a href="{{ route('tradelines') }}">Buy Tradelines</a>
                </li>
                <li class="">
                    <a href="{{ route('about') }}">About Us</a>
                </li>
                <li class="">
                    <a href="{{ route('contact') }}">Contact Us</a>
                </li>
                <li class="">
                    <a href="{{ route('affiliate') }}">Affiliates</a>
                </li>

                <li class="">
                    <a href="{{ route('cart') }}">Cart</a> <!-- New Cart Link -->
                </li>
                <li class="">
                    @if (session()->has('customer_id'))
                        @php
                               $customer = \App\Models\customer::find(session('customer_id'));
                       @endphp
                    @if ($customer)
                   <li><a href="{{ route('profile') }}"><i class="fas fa-user" style="    margin-right: 12px;"></i>
                           {{ $customer->name }}</a>
                   </li>
                   <li>
                       <form method="POST" action="{{ route('sign_out') }}">
                           @csrf
                           <button type="submit" class="btn"><i class="fas fa-sign-out-alt"
                                   style=" margin-right: 12px;"></i>Logout</button>
                       </form>
                   </li>
                   @endif
                    @else
                   <a href="{{ route('sign_up') }}" style="">Sign Up</a>
                   @endif
                   </li>
            </ul>
        </div>
    </div>
</div>
<header class="th-header default-header">
    <div class="sticky-wrapper">
        <div class="container">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a class="icon-masking" href="{{route('index')}}">
                                <span data-mask-src="{{asset('assets/img/logo/logo.png')}}" class="mask-icon"></span>
                                <img src="{{asset('assets/img/logo/logo.png')}}" alt="Sassa">
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <nav class="main-menu style2 d-none d-lg-inline-block">
                            <ul>
                                <li class="">
                                    <a href="{{route('index')}}">Home</a>
                                </li>
                                <li class="">
                                    <a href="{{route('tradelines')}}">Buy Tradelines</a>
                                </li>
                                <li class="">
                                    <a href="{{route('about')}}">About Us</a>
                                </li>
                                <li class="">
                                    <a href="{{route('contact')}}">Contact</a>
                                </li>
                                <li>
                            <a href="{{route('affiliate')}}">Affiliates</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="header-button">
                            <button type="button" class="th-menu-toggle d-inline-block d-lg-none">
                                <i class="far fa-bars"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('cart') }}" class="icon-btn me-3" title="View Cart">
                                <i class="fas fa-shopping-cart" style="margin-top: 14px; color: #50ae28;"></i>
                                @if(session()->has('cart_item_count') && session('cart_item_count') > 0)
                                <sup class="cart-count">{{ session('cart_item_count') }}</sup>
                                @endif
                            </a>
                            @if(session()->has('customer_id'))
                            @php
                                $customer = \App\Models\customer::find(session('customer_id'));
                            @endphp

                            @if($customer)
                                <div class="dropdown">
                                    <button class="btn th-btn dropdown-toggle" type="button" id="customerDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $customer->name }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="customerDropdown" style="position: absolute;
                                    inset: 0px auto auto 0px;
                                    margin: 0px;
                                    border-radius: 20px;
                                    width: 100%;
                                    transform: translate(0px, 55px);">
                                        <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fas fa-user" style="    margin-right: 12px;"></i>
                                            Profile</a></li>
                                        <li>
                                            <form method="POST" action="{{ route('sign_out') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt" style="    margin-right: 12px;"></i>Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        @else
                            <a href="{{ route('sign_up') }}" class="th-btn">Sign Up</a>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
