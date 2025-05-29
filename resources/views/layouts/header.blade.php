
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
    body {
        padding-top: 60px; /* Matches header height */
    }

    .compact-header {
        transition: all 0.3s ease;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        background: white;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }
</style>
<div class="popup-search-box d-none d-lg-block">
    <button class="searchClose"><i class="fal fa-times"></i></button>
    <form action="#">
        <input type="text" placeholder="What are you looking for?">
        <button type="submit"><i class="fal fa-search"></i></button>
    </form>
</div>
<div class="th-menu-wrapper">
</div>
<header class="compact-header" style="background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,0.1); height: 60px; position: fixed; top: 0; width: 100%; z-index: 1000;">
    <div class="container h-100">
        <div class="d-flex align-items-center justify-content-between h-100">
            <!-- Logo -->
            <div class="header-logo" style="height: 40px;">
                <a href="{{ route('index') }}">
                    <img src="{{asset('assets/img/logo/logo.png')}}" alt="duluth" style="height: 100%; width: auto;">
                </a>
            </div>
            <nav class="d-none d-lg-block">
                <ul style="display: flex; gap: 20px; margin: 0; padding: 0; list-style: none;">
                    <li><a href="{{ route('index') }}" style="text-decoration: none; color: #333; font-size: 14px; font-weight: 500;">Home</a></li>
                    <li><a href="#" class="scroll-to-register" style="text-decoration: none; color: #333; font-size: 14px; font-weight: 500;">Register</a></li>
                 <li><a href="#" class="scroll-to-plans" style="text-decoration: none; color: #333; font-size: 14px; font-weight: 500;">Plans</a></li>
                 <li><a href="#" class="scroll-to-about" style="text-decoration: none; color: #333; font-size: 14px; font-weight: 500;">About Us</a></li>

                </ul>
            </nav>
            <div class="d-flex align-items-center gap-3">
                <button class="th-menu-toggle d-inline-block d-lg-none" style="background: none; border: none; font-size: 20px; color: #333;">
                    <i class="far fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</header>


