
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
    a[href="#"]:hover {
        color: #0066ff;
        background-color: rgba(0, 102, 255, 0.05);
    }
    a[href="#"]:hover svg {
        transform: translateX(3px); /* Arrow moves right on hover */
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
    <div class="container h-100" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <div class="d-flex align-items-center justify-content-between h-100">

            <div class="header-logo" style="height: 40px; display: flex; align-items: center;">
                <a href="{{ route('index') }}" style="display: inline-block;">
                    <img src="{{asset('assets/img/logo/logo.png')}}" alt="Duluth" style="height: 80px; width: auto; max-width: 150px; object-fit: contain;">
                </a>
            </div>
            <nav class="d-none d-lg-block">
                <ul style="display: flex; gap: 25px; margin: 0; padding: 0; list-style: none; align-items: center;">
                    <li><a href="{{ route('index') }}" style="text-decoration: none; color: #333; font-size: 14px; font-weight: 500; transition: color 0.3s;">Home</a></li>
                    <li><a href="#" class="scroll-to-register" style="text-decoration: none; color: #333; font-size: 14px; font-weight: 500; transition: color 0.3s;">Register</a></li>
                    <li><a href="#" class="scroll-to-plans" style="text-decoration: none; color: #333; font-size: 14px; font-weight: 500; transition: color 0.3s;">Plans</a></li>
                    <li><a href="#" class="scroll-to-about" style="text-decoration: none; color: #333; font-size: 14px; font-weight: 500; transition: color 0.3s;">About Us</a></li>
                </ul>
            </nav>
            <div class="d-flex align-items-center gap-4">
              <a href="{{route('signup')}}" style="text-decoration: none; color: #333; font-size: 14px; font-weight: 500; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 6px; padding: 8px 12px; border-radius: 4px;">
                Sign Up
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="transition: all 0.3s ease;">
                    <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <path d="M12 5L19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </a>
            <button class="th-menu-toggle d-inline-block d-lg-none mobile-menu-toggle" style="background: none; border: none; font-size: 20px; color: #333; cursor: pointer; margin-left: 8px;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 12H21" stroke="#333" stroke-width="2" stroke-linecap="round"/>
                    <path d="M3 6H21" stroke="#333" stroke-width="2" stroke-linecap="round"/>
                    <path d="M3 18H21" stroke="#333" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>

            </div>
        </div>
    </div>
    <div class="mobile-menu-backdrop" style="display: none; position: fixed; top: 60px; left: 0; width: 100%; height: calc(100vh - 60px); background: rgba(0,0,0,0.5); backdrop-filter: blur(5px); z-index: 998; opacity: 0; transition: opacity 0.3s ease;"></div>
    <div class="mobile-menu d-lg-none" style="display: none; position: fixed; top: 60px; left: 0; width: 100%; background: #fff; box-shadow: 0 5px 10px rgba(0,0,0,0.1); z-index: 999; padding: 20px 0; transform: translateY(-100%); transition: transform 0.3s ease;">
        <ul style="list-style: none; margin: 0; padding: 0; display: flex; flex-direction: column; gap: 15px;">
            <li><a href="{{ route('index') }}" style="display: block; padding: 10px 20px; text-decoration: none; color: #333; font-size: 16px; font-weight: 500;">Home</a></li>
            <li><a href="#" class="scroll-to-register" style="display: block; padding: 10px 20px; text-decoration: none; color: #333; font-size: 16px; font-weight: 500;">Register</a></li>
            <li><a href="#" class="scroll-to-plans" style="display: block; padding: 10px 20px; text-decoration: none; color: #333; font-size: 16px; font-weight: 500;">Plans</a></li>
            <li><a href="#" class="scroll-to-about" style="display: block; padding: 10px 20px; text-decoration: none; color: #333; font-size: 16px; font-weight: 500;">About Us</a></li>
            <li>
                <a href="{{route('signup')}}" style="display: block; padding: 10px 20px; text-decoration: none; color: #333; font-size: 16px; font-weight: 500;">
                    Sign Up
                </a>
            </li>
        </ul>
    </div>
</header>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileMenu = document.querySelector('.mobile-menu');
    const mobileMenuBackdrop = document.querySelector('.mobile-menu-backdrop');

    // Toggle mobile menu
    mobileMenuToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        toggleMobileMenu();
    });

    // Close when clicking on links
    document.querySelectorAll('.mobile-menu a').forEach(link => {
        link.addEventListener('click', () => {
            closeMobileMenu();
        });
    });

    // Close when clicking outside
    document.addEventListener('click', function(e) {
        if (!mobileMenu.contains(e.target) && e.target !== mobileMenuToggle) {
            closeMobileMenu();
        }
    });

    function toggleMobileMenu() {
        if (mobileMenu.style.transform === 'translateY(0px)') {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    }

    function openMobileMenu() {
        mobileMenu.style.display = 'block';
        mobileMenuBackdrop.style.display = 'block';
        setTimeout(() => {
            mobileMenu.style.transform = 'translateY(0px)';
            mobileMenuBackdrop.style.opacity = '1';
        }, 10);
    }

    function closeMobileMenu() {
        mobileMenu.style.transform = 'translateY(-100%)';
        mobileMenuBackdrop.style.opacity = '0';
        setTimeout(() => {
            mobileMenu.style.display = 'none';
            mobileMenuBackdrop.style.display = 'none';
        }, 300);
    }
});
</script>

