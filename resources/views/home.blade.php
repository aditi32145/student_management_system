<!DOCTYPE html>
<!-- saved from url=(0057)https://validthemes.net/site-template/learna/index-7.html -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Learna - Education HTML Template">
    <title>Learna - Education HTML Template</title>
    
    <!-- Add Laravel CSRF Token for forms -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="https://validthemes.net/site-template/learna/assets/img/favicon.png') }}" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/validnavs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('css/unit-test.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- ========== End Stylesheet ========== -->
</head>

<body class="theme-style-three">
<div class="wrapper">
 
<header class="custom-header">
    <!-- Navigation -->
    <nav class="navbar custom-navbar">
       <div class="custom-container nav-container">


            <!-- Logo -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo2.png') }}" class="logo" alt="Logo">
            </a>


            <!-- Desktop Navigation -->
            <ul class="nav-menu">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ url('/#courses') }}" class="nav-link">Courses</a></li>
                <li class="nav-item"><a href="{{ url('/#fees') }}" class="nav-link">Fees</a></li>
                <li class="nav-item"><a href="{{ url('/#events') }}" class="nav-link">Events</a></li>
                <li class="nav-item"><a href="{{ url('/#contact') }}" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="{{ url('/#blog') }}" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="{{ url('/login') }}" class="nav-link login-btn">Login</a></li>
            </ul>

            <!-- Mobile Hamburger -->
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div class="mobile-overlay"></div>

        <!-- Mobile Menu -->
        <div class="mobile-menu">
            <div class="mobile-menu-header">
                <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="mobile-logo">
                <button class="close-menu">&times;</button>
            </div>
            <ul class="mobile-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/#courses') }}">Courses</a></li>
                <li><a href="{{ url('/#fees') }}">Fees</a></li>
                <li><a href="{{ url('/#events') }}">Events</a></li>
                <li><a href="{{ url('/#contact') }}">Contact</a></li>
                <li><a href="{{ url('/#blog') }}">Blog</a></li>
                <li><a href="{{ url('/login') }}" class="mobile-login-btn">Login</a></li>
            </ul>
        </div>
    </nav>
</header>


<style>
/* Custom Header Styles */
.custom-header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    transition: all 0.3s ease;
}


/* Transparent background for laptop/desktop */
@media (min-width: 992px) {
    .custom-header {
        background: transparent !important;
        box-shadow: none !important;
    }
   
    .custom-header.sticky {
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(10px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1) !important;
    }
}


/* For mobile/tablet */
@media (max-width: 991px) {
    .custom-header {
        background: #ffffff;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
    }
}

.custom-navbar {
    padding: 15px 0;
}


.custom-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    position: relative;
}

.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}


/* Logo positioning for laptop/desktop */
@media (min-width: 992px) {
    .navbar-brand {
        position: absolute;
        left: -1000%;
        top:10px;
        transform: translateX(-60%);
        z-index: 1;
    }
   
    .navbar-brand .logo {
        height: auto;
        width: 12rem;
        transition: all 0.3s ease;
    }
}


/* Logo for mobile */
@media (max-width: 991px) {
    .navbar-brand {
        position: static;
        transform: none;
    }
   
    .navbar-brand .logo {
        height: auto;
        width: 10rem;
        transition: all 0.3s ease;
    }
}


/* Desktop Navigation */
.nav-menu {
    display: flex;
    align-items: center;
    gap: 40px;
    list-style: none;
    margin: 0;
    padding: 0;
}


/* Navigation positioning for laptop/desktop */
@media (min-width: 992px) {
    .nav-menu {
        position: absolute;
        right: 60%; /* 60% from right */
        transform: translateX(50%);
        gap: 25px;
    }
}


.nav-item {
    position: relative;
    top:30px;
    right:-300px;
}


.nav-link {
    color: #333;
    text-decoration: none;
    font-size: 18px;
    font-weight: 600;
    padding: 8px 0;
    transition: color 0.3s ease;
    position: relative;
}


/* For transparent header on desktop */
@media (min-width: 992px) {
    .custom-header:not(.sticky) .nav-link {
        color: #333;
    }
   
    .custom-header:not(.sticky) .nav-link:hover {
        color: #7A0A1A;
    }
}


.nav-link:hover {
    color: #401B34;
}


.nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background: #401B34;
    transition: width 0.3s ease;
}


.nav-link:hover::after {
    width: 100%;
}


.login-btn {
    background: #401B34;
    color: white !important;
    padding: 10px 25px !important;
    border-radius: 10px;
    margin-left: 40px;
    transition: all 0.3s ease;
}


.login-btn:hover {
    background: #60224dff;
    transform: translateY(-2px);
}


.login-btn::after {
    display: none;
}


/* Hamburger Menu - Positioned on left side for mobile */
.hamburger {
    display: none;
    flex-direction: column;
    cursor: pointer;
    width: 20px;
    height: 12px;
    justify-content: space-between;
}


.bar {
    width: 100%;
    height: 3px;
    background: #333;
    border-radius: 2px;
    transition: all 0.3s ease;
}


/* Mobile Menu */
.mobile-menu {
    position: fixed;
    top: 0;
    left: -100%; /* Changed from right: -100% to left: -100% */
    width: 300px;
    height: 100vh;
    background: white;
    padding: 0px 30px;
    transition: left 0.4s cubic-bezier(0.785, 0.135, 0.15, 0.86); /* Changed from right to left */
    z-index: 1001;
    box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1); /* Changed shadow direction */
    overflow-y: auto;
}


.mobile-menu.active {
    left: 0; /* Changed from right: 0 to left: 0 */
}


.mobile-menu-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 4px;
    padding-bottom: 0px;
    border-bottom: 1px solid #eee;
}


.mobile-logo {
    width: 10rem;
    height: 5rem;
}


.close-menu {
    background: none;
    border: none;
    font-size: 24px;
    color: #333;
    cursor: pointer;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: all 0.3s ease;
}


.close-menu:hover {
    background: #f5f5f5;
    color: #7A0A1A;
}


.mobile-nav {
    list-style: none;
    padding: 0;
    margin: 0;
}


.mobile-nav li {
    margin-bottom: 20px;
}


.mobile-nav li:last-child {
    margin-bottom: 0;
}


.mobile-nav a {
    color: #333;
    text-decoration: none;
    font-size: 18px;
    font-weight: 500;
    display: block;
    padding: 10px 0;
    border-bottom: 1px solid #f0f0f0;
    transition: all 0.3s ease;
}


.mobile-nav a:hover {
    color: #7A0A1A;
    padding-left: 10px;
}


.mobile-login-btn {
    background: #7A0A1A;
    color: white !important;
    padding: 12px 20px !important;
    border-radius: 5px;
    text-align: center;
    margin-top: 20px !important;
    border: none !important;
}


.mobile-login-btn:hover {
    background: #7A0A1A;
    padding-left: 20px !important;
}


/* Mobile Overlay */
.mobile-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background: rgba(0, 0, 0, 0.5);
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 1000;
}


.mobile-overlay.active {
    opacity: 1;
    visibility: visible;
}
/* Sticky Header */
.custom-header.sticky {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    height:90px;
    padding: 2px 0;
}
.custom-header.sticky .navbar-brand .logo {
    width: 10rem;
}


/* Responsive */
@media (max-width: 991px) {
    .nav-menu {
        display: none;
    }


    .hamburger {
        display: flex;
    }


    .nav-container {
        padding: 0 15px;
        justify-content: flex-start; /* Align items to start */
    }
   
    .navbar-brand {
        margin: 0 auto; /* Center logo */
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
    }
   
    .hamburger {
        position: relative;
        z-index: 1002;
    }
}


@media (max-width: 480px) {
    .mobile-menu {
        width: 85%; /* Slightly narrower on mobile */
    }
   
    .navbar-brand .logo {
        width: 10rem;
    }
}


/* Active State */
.nav-link.active {
    color: #f3dfe2ff;
}


.nav-link.active::after {
    width: 100%;
}


/* Hamburger Animation */
.hamburger.active .bar:nth-child(1) {
    transform: translateY(10px) rotate(45deg);
}


.hamburger.active .bar:nth-child(2) {
    opacity: 0;
}


.hamburger.active .bar:nth-child(3) {
    transform: translateY(-11px) rotate(-45deg);
}


/* Prevent horizontal scroll */
body {
    overflow-x: hidden;
}


/* Smooth scrolling for anchor links */
html {
    scroll-behavior: smooth;
}


/* Section padding for anchor links */
section {
    scroll-margin-top: 100px;
}


/* For better visibility on transparent header */
@media (min-width: 992px) {
    .custom-header:not(.sticky) .nav-link {
        text-shadow: 0 1px 2px rgba(255, 255, 255, 0.8);
    }
}
</style>


<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get DOM elements
    const hamburger = document.querySelector('.hamburger');
    const mobileMenu = document.querySelector('.mobile-menu');
    const closeMenu = document.querySelector('.close-menu');
    const mobileOverlay = document.querySelector('.mobile-overlay');
    const mobileLinks = document.querySelectorAll('.mobile-nav a');
    const header = document.querySelector('.custom-header');
    const navLinks = document.querySelectorAll('.nav-link');
   
    // Toggle mobile menu
    hamburger.addEventListener('click', () => {
        mobileMenu.classList.add('active');
        mobileOverlay.classList.add('active');
        hamburger.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
   
    // Close mobile menu with close button
    closeMenu.addEventListener('click', () => {
        mobileMenu.classList.remove('active');
        mobileOverlay.classList.remove('active');
        hamburger.classList.remove('active');
        document.body.style.overflow = '';
    });
   
    // Close mobile menu with overlay click
    mobileOverlay.addEventListener('click', () => {
        mobileMenu.classList.remove('active');
        mobileOverlay.classList.remove('active');
        hamburger.classList.remove('active');
        document.body.style.overflow = '';
    });
   
    // Close menu when clicking mobile links
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            mobileOverlay.classList.remove('active');
            hamburger.classList.remove('active');
            document.body.style.overflow = '';
        });
    });
   
    // Sticky header on scroll
    window.addEventListener('scroll', () => {
        if (window.scrollY > 100) {
            header.classList.add('sticky');
        } else {
            header.classList.remove('sticky');
        }
    });
   
    // Active link highlighting for anchor links
    window.addEventListener('scroll', () => {
        let current = '';
        const sections = document.querySelectorAll('section[id], div[id]');
       
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
           
            if (window.scrollY >= (sectionTop - 150)) {
                current = section.getAttribute('id');
            }
        });
       
        navLinks.forEach(link => {
            link.classList.remove('active');
            const href = link.getAttribute('href');
            if (href && href.includes('#')) {
                const linkId = href.split('#')[1];
                if (linkId === current) {
                    link.classList.add('active');
                }
            }
        });
       
        // Highlight Home if at top
        if (window.scrollY < 100) {
            const homeLink = document.querySelector('.nav-link[href="{{ url('/') }}"]');
            if (homeLink) homeLink.classList.add('active');
        }
    });
   
    // Close menu on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
            mobileMenu.classList.remove('active');
            mobileOverlay.classList.remove('active');
            hamburger.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
   
    // Active state for Home on page load
    if (window.location.pathname === '/') {
        const homeLink = document.querySelector('.nav-link[href="{{ url('/') }}"]');
        if (homeLink) homeLink.classList.add('active');
    }
   
    // Add click event to all nav links
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Remove active class from all links
            navLinks.forEach(l => l.classList.remove('active'));
            // Add active class to clicked link
            this.classList.add('active');
           
            // For anchor links, wait a bit then add active class
            if (this.getAttribute('href').includes('#')) {
                setTimeout(() => {
                    navLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                }, 100);
            }
        });
    });
});
</script>

    
    <!-- Start Banner Area 
    ============================================= -->
    <div class="banner-area banner-style-seven-area navigation-circle zoom-effect overflow-hidden text-light">
        <div class="banner-round-shape"></div>
        <!-- Slider main container -->
        <div class="banner-fade swiper-fade swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper" id="swiper-wrapper-0c5894de9a13dd79" aria-live="off" style="transition-duration: 0ms;"><div class="swiper-slide banner-style-seven swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="1" role="group" aria-label="2 / 2" style="width: 1491px; opacity: 0; transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                    <div class="banner-thumb bg-cover shadow dark" style="background: url(assets/images/4.png);"></div>
                    <div class="container">
                        <div class="banner-style-seven-info">
                            <div class="fixed-thumb">
                                <img src="{{ asset('images/4.png') }}" alt="Image Not Found">
                            </div>
                            <div class="row align-center">
                                <div class="col-lg-7">
                                    <div class="content">
                                        <h2>World best higher University ranking</h2>
                                        <div class="info">
                                            <p>
                                                Education is a key to success and freedom from all the forces is a power and makes a person powerful
                                            </p>
                                            <div class="button">
                                                <a class="btn btn-md btn-gradient animation" href="https://validthemes.net/site-template/learna/contact-us.html">Apply Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <div class="right-info">
                                        <ul>
                                            <li>
                                                <h5>Undergraduate</h5>
                                                <p>
                                                    Browse the undergraduate degrees
                                                </p>
                                            </li>
                                            <li>
                                                <h5>Graduate</h5>
                                                <p>
                                                    Browse the graduate degrees
                                                </p>
                                            </li>
                                        </ul>
                                        <img src="{{ asset('images/25.png') }}" alt="Image Not Found">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Item -->
                <div class="swiper-slide banner-style-seven swiper-slide-prev swiper-slide-duplicate-next" data-swiper-slide-index="0" role="group" aria-label="1 / 2" style="width: 1491px; opacity: 0; transform: translate3d(-1491px, 0px, 0px); transition-duration: 0ms;">
                    <div class="banner-thumb bg-cover shadow dark" style="background: url(assets/images/4.png);"></div>
                    <div class="container">
                        <div class="banner-style-seven-info">
                            <div class="fixed-thumb">
                                <img src="{{ asset('images/4.png') }}" alt="Image Not Found">
                            </div>
                            <div class="row align-center">
                                <div class="col-lg-7">
                                    <div class="content">
                                        <h2>Distance Learning, Bound Possibilities!</h2>
                                        <div class="info">
                                            <p>
                                                Education is a key to success and freedom from all the forces is a power and makes a person powerful
                                            </p>
                                            <div class="button">
                                                <a class="btn btn-md btn-gradient animation" href="#contacts">Apply Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <div class="right-info">
                                        <ul>
                                            <li>
                                                <h5>Undergraduate</h5>
                                                <p>
                                                    Browse the undergraduate degrees
                                                </p>
                                            </li>
                                            <li>
                                                <h5>Graduate</h5>
                                                <p>
                                                    Browse the graduate degrees
                                                </p>
                                            </li>
                                        </ul>
                                        <img src="{{ asset('images/25.png') }}" alt="Image Not Found">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->

                <!-- Single Item -->
                <div class="swiper-slide banner-style-seven swiper-slide-visible swiper-slide-active" data-swiper-slide-index="1" role="group" aria-label="2 / 2" style="width: 1491px; opacity: 1; transform: translate3d(-2982px, 0px, 0px); transition-duration: 0ms;">
                    <div class="banner-thumb bg-cover shadow dark" style="background: url(assets/images/4.png);"></div>
                    <div class="container">
                        <div class="banner-style-seven-info">
                            <div class="fixed-thumb">
                                <img src="{{ asset('images/4.png') }}" alt="Image Not Found">
                            </div>
                            <div class="row align-center">
                                <div class="col-lg-7">
                                    <div class="content">
                                        <h2>World best higher University ranking</h2>
                                        <div class="info">
                                            <p>
                                                Education is a key to success and freedom from all the forces is a power and makes a person powerful
                                            </p>
                                            <div class="button">
                                                <a class="btn btn-md btn-gradient animation" href="https://validthemes.net/site-template/learna/contact-us.html">Apply Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <div class="right-info">
                                        <ul>
                                            <li>
                                                <h5>Undergraduate</h5>
                                                <p>
                                                    Browse the undergraduate degrees
                                                </p>
                                            </li>
                                            <li>
                                                <h5>Graduate</h5>
                                                <p>
                                                    Browse the graduate degrees
                                                </p>
                                            </li>
                                        </ul>
                                        <img src="{{ asset('images/25.png') }}" alt="Image Not Found">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->

            <div class="swiper-slide banner-style-seven swiper-slide-duplicate swiper-slide-next swiper-slide-duplicate-prev" data-swiper-slide-index="0" role="group" aria-label="1 / 2" style="width: 1491px; opacity: 0; transform: translate3d(-4473px, 0px, 0px); transition-duration: 0ms;">
                    <div class="banner-thumb bg-cover shadow dark" style="background: url(assets/images/m2.jpg);"></div>
                    <div class="container">
                        <div class="banner-style-seven-info">
                            <div class="fixed-thumb">
                                <img src="{{ asset('images/m2.jpg') }}" alt="Image Not Found">
                            </div>
                            <div class="row align-center">
                                <div class="col-lg-7">
                                    <div class="content">
                                        <h2>Distance Learning, Boundless Possibilities!</h2>
                                        <div class="info">
                                            <p>
                                                Education is a key to success and freedom from all the forces is a power and makes a person powerful
                                            </p>
                                            <div class="button">
                                                <a class="btn btn-md btn-gradient animation" href="https://validthemes.net/site-template/learna/contact-us.html">Apply Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <div class="right-info">
                                        <ul>
                                            <li>
                                                <h5>Undergraduate</h5>
                                                <p>
                                                    Browse the undergraduate degrees
                                                </p>
                                            </li>
                                            <li>
                                                <h5>Graduate</h5>
                                                <p>
                                                    Browse the graduate degrees
                                                </p>
                                            </li>
                                        </ul>
                                        <img src="{{ asset('images/25.png') }}" alt="Image Not Found">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div></div>

            <!-- Navigation -->
            <div class="swiper-nav-left">
                <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-0c5894de9a13dd79"></div>
                <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-0c5894de9a13dd79"></div>
            </div>

        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>        
    </div>
    <!-- End Main -->

    <!-- Start Feature 
    ============================================= -->
    <div class="feature-style-two-area default-padding-top bg-gray-gradient-secondary">
        <div class="shape">
            <img src="{{ asset('images/58.png') }}" alt="Image Not Found">
        </div>
        <div class="container">
            <div class="row">
                <!-- Single Item -->
                <div class="col-lg-4 col-md-12 mb-md-50">
                    <div class="experience-card-two wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="counter">
                            <div class="timer" data-to="85" data-speed="1000">85</div>
                            <div class="operator">%</div>
                        </div>
                        <h3>Of recent graduates started new job</h3>
                    </div>
                    <div class="card-style-two wow fadeInUp mt-40" data-wow-delay="200ms" style="visibility: visible; animation-delay: 200ms; animation-name: fadeInUp;">
                        <h6>28k Graduated Students</h6>
                        <div class="thumb">
                            <img src="{{ asset('images/m4.jpg') }}" alt="Image Not Found">
                            <img src="{{ asset('images/m3.jpg') }}" alt="Image Not Found">
                            <img src="{{ asset('images/m2.jpg') }}" alt="Image Not Found">
                            <img src="{{ asset('images/m1.jpg') }}" alt="Image Not Found">
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-style-two-item active wow fadeInUp" data-wow-delay="400ms" style="visibility: visible; animation-delay: 400ms; animation-name: fadeInUp;">
                        <div class="icon">
                            <img src="{{ asset('images/60.png') }}" alt="Image Not Found">
                        </div>
                        <h4><a href="https://validthemes.net/site-template/learna/index-7.html#">Scholarship Facility</a></h4>
                        <p>
                            It is a long established fact that a reader will be distracted readable content of a page when looking at its layout skill.
                        </p>
                        <div class="bottom">
                            <span>01</span>
                            <a href="https://validthemes.net/site-template/learna/about-us.html"><i class="fas fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-style-two-item wow fadeInUp" data-wow-delay="600ms" style="visibility: visible; animation-delay: 600ms; animation-name: fadeInUp;">
                        <div class="icon">
                            <img src="{{ asset('images/61.png') }}" alt="Image Not Found">
                        </div>
                        <h4><a href="https://validthemes.net/site-template/learna/index-7.html#">Book Library &amp; Store</a></h4>
                        <p>
                            Perfection is long established fact that a reader will be distracted by the readable content of a page when looking at skill.
                        </p>
                        <div class="bottom">
                            <span>02</span>
                            <a href="https://validthemes.net/site-template/learna/about-us.html"><i class="fas fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
    </div>
    <!-- End Feature -->

    <!-- Start About 
    ============================================= -->
    <div class="about-style-six-area default-padding bg-gray-gradient-secondary">
        <div class="about-style-six-thumb">
            <img class="wow fadeInUp" src="{{ asset('images/7.jpg') }}" alt="Image Not Found" style="visibility: visible; animation-name: fadeInUp;">
            <a href="https://validthemes.net/site-template/learna/about-us.html" class="round-text">
                <img src="{{ asset('images/12.png') }}" alt="Image Not Found">
                <i class="fas fa-long-arrow-right"></i>
            </a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-5">
                    <div class="about-style-six-info pl-50 pl-md-0 pl-xs-0">
                        <div class="top-info wow fadeInUp mb-30" style="visibility: visible; animation-name: fadeInUp;">
                            <h2>Since <strong>1996</strong></h2>
                            <img src="{{ asset('images/6.jpg') }}" alt="Image Not Found">
                        </div>
                        <div class="wow fadeInUp" data-wow-delay="300ms" style="visibility: hidden; animation-delay: 300ms; animation-name: none;">
                            <h4 class="sub-title">Get to know us</h4>
                            <h2 class="title split-text" style=""><div class="line" style="display: block; text-align: start; position: relative;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">Dedicated</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">to</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">academic</div> </div><div class="line" style="display: block; text-align: start; position: relative;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">excellence</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">inclusion,</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">research</div></div></h2>
                            <p>
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Start Faculty 
    ============================================= -->
    <div id="courses" class="faculty-area default-padding bottom-less bg-theme" style="background-image: url(assets/images/m2.jpg);">
        <div class="container">
            <div class="site-heading text-light text-center">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                        <h4 class="sub-title">Top Faculty</h4>
                        <h2 class="title split-text" style=""><div class="line" style="display: block; text-align: center; position: relative;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">Most</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">demanding</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">and</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">top</div> </div><div class="line" style="display: block; text-align: center; position: relative;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">Academic</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">programs</div></div></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="faculty-style-one-items">
                <div class="row">
                    <!-- Single Item -->
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="faculty-style-one-item wow fadeInUp" style="visibility: hidden; animation-name: none;">
                            <div class="thumb">
                                <img src="{{ asset('images/1.jpg') }}" alt="Image Not Found">
                            </div>
                            <div class="info">
                                <h4><a href="https://validthemes.net/site-template/learna/course-single.html">Faculty Of Science</a></h4>
                                <p>
                                    Embark on a journey of knowledge discovery and growth very university.
                                </p>
                                <ul class="faculty-list">
                                    <li>Canteen</li>
                                    <li>Hotel</li>
                                    <li>Library</li>
                                    <li>Playground</li>
                                    <li>Lab</li>
                                </ul>
                                <a href="#contact" class="btn btn-gradient btn-sm animation">Apply Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="faculty-style-one-item wow fadeInUp" data-wow-delay="200ms" style="visibility: hidden; animation-delay: 200ms; animation-name: none;">
                            <div class="thumb">
                                <img src="{{ asset('images/2.jpg') }}" alt="Image Not Found">
                            </div>
                            <div class="info">
                                <h4><a href="https://validthemes.net/site-template/learna/course-single.html">Economics, BA</a></h4>
                                <p>
                                    Regular edu on a journey of knowledge discovery and growth at university.
                                </p>
                                <ul class="faculty-list">
                                    <li>Canteen</li>
                                    <li>Hotel</li>
                                    <li>Library</li>
                                    <li>Playground</li>
                                    <li>Lab</li>
                                </ul>
                                <a href="https://validthemes.net/site-template/learna/course-single.html" class="btn btn-gradient btn-sm animation">Apply Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="faculty-style-one-item wow fadeInUp" data-wow-delay="400ms" style="visibility: hidden; animation-delay: 400ms; animation-name: none;">
                            <div class="thumb">
                                <img src="{{ asset('images/3.jpg') }}" alt="Image Not Found">
                            </div>
                            <div class="info">
                                <h4><a href="https://validthemes.net/site-template/learna/course-single.html">M.A. in Education</a></h4>
                                <p>
                                    Emergency park on a journey of knowledge discovery and growth track.
                                </p>
                                <ul class="faculty-list">
                                    <li>Canteen</li>
                                    <li>Hotel</li>
                                    <li>Library</li>
                                    <li>Playground</li>
                                    <li>Lab</li>
                                </ul>
                                <a href="https://validthemes.net/site-template/learna/course-single.html" class="btn btn-gradient btn-sm animation">Apply Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Faculty -->

    <!-- Start Choose Us 
    ============================================= -->
    <div class="choose-us-style-four-area default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-xl-6 col-lg-5 pr-60 pr-md-15 pr-xs-15">
                    <div class="thumb-style-six wow fadeInUp" style="visibility: hidden; animation-name: none;">
                        <img src="{{ asset('images/8.jpg') }}" alt="Image Not Found">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <div class="choose-us-style-four-info">
                        <h2 class="title split-text" style=""><div class="line" style="display: block; text-align: start; position: relative;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">Campus</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">Highlights</div></div></h2>
                        <p class="wow fadeInUp" data-wow-delay="200ms" style="visibility: hidden; animation-delay: 200ms; animation-name: none;">
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything.
                        </p>
                        <div class="d-grid mt-30 wow fadeInUp" data-wow-delay="400ms" style="visibility: hidden; animation-delay: 400ms; animation-name: none;">
                            <div class="faq-style-two-items">
                                <div class="accordion" id="faqAccordion">
                                    <div class="accordion-item faq-style-two">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Student Life
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <p>
                                                    There are many variations of passages of available, but the majority have suffered alteration in injected humour to access.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item faq-style-two">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Arts &amp; Clubs
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <p>
                                                    Maximum are many variations of passages of available, but the majority have suffered alteration in injected humour to access.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item faq-style-two">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Sports &amp; Fitness
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <p>
                                                    Perfect are many variations of passages of available, but the majority have suffered alteration in injected humour to access.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fun-fact">
                                <div class="icon">
                                    <img src="{{ asset('images/62.png') }}" alt="Image Not Found">
                                </div>
                                <div class="info">
                                    <div class="counter">
                                        <div class="timer" data-to="56" data-speed="2000">56</div>
                                        <div class="operator">K</div>
                                    </div>
                                    <span class="medium">Students Worldwide</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Choose Us -->


   <!-- Start Event
============================================= -->
<div class="event-style-four-area default-padding-top">
    <div class="container">

        <!-- Heading -->
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h4 class="sub-title">Upcoming Events</h4>
                    <h3 class="title">
                        Join Our Upcoming Events
                    </h3>
                </div>
            </div>
        </div>

        <!-- Events List -->
        <div class="row" style="margin-bottom:80px;">
            <div class="col-lg-12" >

                @foreach($events as $event)
                    <div class="event-style-four-item wow fadeInUp"
                         style="background-image: url('{{ asset('assets/images/m2.jpg') }}');">

                        <!-- Date -->
                        <div class="date">
                            <h2>{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</h2>
                            <span>{{ \Carbon\Carbon::parse($event->event_date)->format('M, Y') }}</span>
                        </div>

                        <!-- Title -->
                        <div class="info">
                            <h2>
                                <a href="{{ $event->booking_link ?? '#' }}">
                                    {{ $event->title }}
                                </a>
                            </h2>
                        </div>

                        <!-- Meta -->
                        <div class="event-meta">
                            <ul>
                                <li>
                                    <i class="fas fa-clock"></i>
                                    {{ $event->time }}
                                </li>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $event->location }}
                                </li>
                            </ul>
                        </div>

                        <!-- Button -->
                        <div class="button">
                            <a class="btn btn-ms btn-gradient animation"
                               href="{{ $event->booking_link ?? '#' }}">
                                Book a ticket
                            </a>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>

    </div>
</div>
<!-- End Event -->


    <!-- Start Apply Form 
    ============================================= -->
    <div id="contact" class="admission-form-style-one-area default-padding') }}">
        <div class="shape">
            <img src="{{ asset('images/59.png') }}" style="position:absolute; top:24em; left:20em;" alt="Image Not Found">
        </div>
        <div class="container container-stage">
            <div class="admission-form-items bg-cover wow fadeInUp" style="background-image: url(&quot;assets/images/m2.jpg&quot;); visibility: hidden; animation-name: none;">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="admission-form-style-one">
                            <h4 class="sub-title">Admission Form</h4>
                            <p>
                                Please fill in the form carefully and make sure all information is accurate*
                            </p>
                            <form action="{{ route('enquiry.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input class="form-control" id="first_name" name="first_name" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input class="form-control" id="last_name" name="last_name" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input class="form-control" id="email" name="email" type="email">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input class="form-control" id="phone" name="phone" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input class="form-control" id="country" name="country" value="India" readonly placeholder="Country" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input class="form-control" id="address" name="address" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input class="form-control" id="state" name="state" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="enquiry">Enquiry</label>
                                           <textArea class="form-control" name="enquiry" rows="4"></textarea>
                                               
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit" name="submit" id="submit">
                                            <i class="fa fa-paper-plane"></i> Apply Now
                                        </button>
                                    </div>
                                </div>
                                <!-- Alert Message -->
                                <div class="col-lg-12 alert-notification">
                                    <div id="message" class="alert-msg"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if(session('success'))
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session ('success') }}",
            showConfirmButton: false,
            timer:3000
        });
        </script>
        @endif

    <!-- End Apply Form  -->

    <!-- Start Blog 
    ============================================= -->
    <div class="blog-area home-blog-style-two bg-gray-gradient-secondary default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">Blog Insight</h4>
                        <h2 class="title split-text" style=""><div class="line" style="display: block; text-align: center; position: relative;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">Valuable</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">insights</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">to</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">change</div> </div><div class="line" style="display: block; text-align: center; position: relative;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">your</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">startup</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, 100%);">idea</div></div></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- Single Item -->
                <div class="col-xl-4 col-md-6 col-lg-6 mb-30">
                    <div class="home-blog-style-two-item wow fadeInUp" style="visibility: hidden; animation-name: none;">
                        <div class="thumb">
                            <img src="{{ asset('images/5.jpg') }}" alt="Image not Found">
                            <ul class="blog-meta">
                                <li><a href="https://validthemes.net/site-template/learna/index-7.html#">Courses</a></li>
                                <li><i class="fas fa-calendar-alt"></i> October 18, 2025</li>
                            </ul>
                        </div>
                        <div class="info">
                            <h3 class="blog-title">
                                <a href="https://validthemes.net/site-template/learna/blog-single-with-sidebar.html">Drefabrice passive are house most memorable</a>
                            </h3>
                            <p>
                                Plan upon yet way get cold spot its week almost do am or limits hearts resolve parties.
                            </p>
                            <a href="https://validthemes.net/site-template/learna/blog-single-with-sidebar.html" class="btn-read-more">Read More <i class="fas fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-xl-4 col-md-6 col-lg-6 mb-30">
                    <div class="home-blog-style-two-item wow fadeInUp" data-wow-delay="200ms" style="visibility: hidden; animation-delay: 200ms; animation-name: none;">
                        <div class="thumb">
                            <img src="{{ asset('images/3(1).jpg') }}" alt="Image not Found">
                            <ul class="blog-meta">
                                <li><a href="https://validthemes.net/site-template/learna/index-7.html#">Laravel</a></li>
                                <li><i class="fas fa-calendar-alt"></i> November 15, 2025</li>
                            </ul>
                        </div>
                        <div class="info">
                            <h3 class="blog-title">
                                <a href="https://validthemes.net/site-template/learna/blog-single-with-sidebar.html">Announcing attachment resolution perform</a>
                            </h3>
                            <p>
                                Taking upon yet way get cold spot its week almost do am or limits hearts resolve parties.
                            </p>
                            <a href="https://validthemes.net/site-template/learna/blog-single-with-sidebar.html" class="btn-read-more">Read More <i class="fas fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-xl-4 col-md-6 col-lg-6 mb-30">
                    <div class="home-blog-style-two-item wow fadeInUp" data-wow-delay="400ms" style="visibility: hidden; animation-delay: 400ms; animation-name: none;">
                        <div class="thumb">
                            <img src="{{ asset('images/4.jpg') }}" alt="Image not Found">
                            <ul class="blog-meta">
                                <li><a href="https://validthemes.net/site-template/learna/index-7.html#">WordPress</a></li>
                                <li><i class="fas fa-calendar-alt"></i> December 13, 2025</li>
                            </ul>
                        </div>
                        <div class="info">
                            <h3 class="blog-title">
                                <a href="https://validthemes.net/site-template/learna/blog-single-with-sidebar.html">Resolution performing the regular sentim.</a>
                            </h3>
                            <p>
                                Media upon yet way get cold spot its week almost do am or limits hearts resolve parties.
                            </p>
                            <a href="https://validthemes.net/site-template/learna/blog-single-with-sidebar.html" class="btn-read-more">Read More <i class="fas fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
    </div>
    <!-- End Blog -->

    <!-- Start Footer 
    ============================================= -->
    <footer class="cf-footer">
    <div class="footer-main">
        <div class="footer-container">
            <div class="footer-grid">
                <!-- Quick Links -->
                <div class="footer-section">
                    <h3 class="footer-heading">Quick Links</h3>
                    <ul class="footer-links">
                       <li><a href="{{ url('/portfolio') }}">Portfolio</a></li>
                        <li><a href="{{ url('/about') }}">About Us</a></li>
                         <li><a href="{{ url('/register') }}">Register</a></li>
                        
                    </ul>
                </div>

                <!-- Courses -->
                <div class="footer-section">
                    <h3 class="footer-heading">Courses</h3>
                    <ul class="footer-links">
                        <li><a href="{{ url('/courses/admissions') }}">Admissions</a></li>
                        <li><a href="{{ url('/courses/curriculum') }}">Curriculum</a></li>
                        <li><a href="{{ url('/courses/placements') }}">Placements</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="footer-section contact-info">
                    <h3 class="footer-heading">Get In Touch</h3>
                    <div class="contact-details">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <p>Kolkata, West Bengal</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-text">
                                <p>+91 7439752587</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <p>college@ych.com</p>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <!-- Company Description & Social Media -->
                <div class="footer-section company-description">
                    <div class="company-logo">
                        <img src="{{ asset('images/logo2.png') }}" alt="cf Logo" class="logo-img">
                    </div>
                    <p class="company-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                    <div class="social-media">
                        <a href="https://instagram.com" target="_blank" class="social-icon" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://facebook.com" target="_blank" class="social-icon" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://linkedin.com" target="_blank" class="social-icon" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="footer-bottom">
        <div class="footer-container">
            <div class="bottom-content">
                <div class="copyright">
                    <p>&copy; <span id="current-year"></span> YCH. All Rights Reserved.</p>
                </div>
                <div class="legal-links">
                    <a href="#privacy-policy-modal" class="legal-link open-modal">Privacy Policy</a>
                    <a href="#terms-of-service-modal" class="legal-link open-modal">Terms of Service</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Privacy Policy Modal -->
<div id="privacy-policy-modal" class="modal">
    <div class="modal-content">
        <span class="modal-close">&times;</span>
        <h2>Privacy Policy</h2>
        <div class="modal-body">
            <p>Hello</p>
        </div>
    </div>
</div>

<!-- Terms of Service Modal -->
<div id="terms-of-service-modal" class="modal">
    <div class="modal-content">
        <span class="modal-close">&times;</span>
        <h2>Terms of Service</h2>
        <div class="modal-body">
            <p>Hello</p>
        </div>
    </div>
</div>

<style>
/* Footer Main Styles */
.cf-footer {
    background: #1a1a1a;
    color: #fff;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 10px;
}

.footer-main {
    padding: 40px 0 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 40px;
}

.footer-section {
    margin-bottom: 10px;
}

.footer-heading {
    color: #fff;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 25px;
    position: relative;
    padding-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.footer-heading::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 40px;
    height: 2px;
    background: #c9a96e;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 12px;
}

.footer-links li:last-child {
    margin-bottom: 0;
}

.footer-links a {
    color: #b0b0b0;
    text-decoration: none;
    font-size: 16px;
    transition: all 0.3s ease;
    display: inline-block;
}

.footer-links a:hover {
    color: #c9a96e;
    transform: translateX(5px);
}

/* Contact Info */
.contact-info .contact-details {
    margin-top: 10px;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 10px;
}

.contact-item:last-child {
    margin-bottom: 0;
}

.contact-icon {
    color: #c9a96e;
    margin-right: 15px;
    font-size: 17px;
    margin-top: 3px;
    min-width: 20px;
}

.contact-text p {
    margin: 0 0 5px 0;
    color: #b0b0b0;
    font-size: 16px;
    line-height: 1.5;
}

.contact-text p:last-child {
    margin-bottom: 0;
}

/* Company Description */
.company-description {
    grid-column: span 1;
}

.company-logo {
    margin-bottom: 10px;
}

.logo-img {
    height: 80px;
    width: auto;
    filter: brightness(0) invert(1);
}

.company-text {
    color: #b0b0b0;
    line-height: 1.6;
    margin-bottom: 25px;
    font-size: 18px;
}

/* Social Media */
.social-media {
    display: flex;
    gap: 12px;
    margin-top: 20px;
    flex-wrap: wrap;
}

.social-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 50%;
    color: #cfc3c3ff;
    text-decoration: none;
    font-size: 18px;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.social-icon:hover {
    background: #c9a96e;
    color: #1a1a1a;
    border-color: #c9a96e;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(201, 169, 110, 0.3);
}

/* Specific social media colors on hover */
.social-icon:nth-child(1):hover { /* Instagram */
    background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
    color: white;
}

.social-icon:nth-child(2):hover { /* Facebook */
    background: #1877f2;
    color: white;
}

.social-icon:nth-child(3):hover { /* LinkedIn */
    background: #0077b5;
    color: white;
}

/* Footer Bottom */
.footer-bottom {
    padding: 25px 0;
    background: rgba(0, 0, 0, 0.2);
}

.bottom-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.copyright p {
    color: #8a8a8a;
    font-size: 16px;
    margin: 0;
}

.legal-links {
    display: flex;
    gap: 30px;
}

.legal-link {
    color: #8a8a8a;
    text-decoration: none;
    font-size: 16px;
    transition: color 0.3s ease;
    cursor: pointer;
}

.legal-link:hover {
    color: #c9a96e;
}

/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.modal.active {
    display: block;
    opacity: 1;
}

.modal-content {
    background-color: #1a1a1a;
    margin: 5% auto;
    padding: 30px;
    border: 1px solid #c9a96e;
    width: 80%;
    max-width: 600px;
    border-radius: 10px;
    position: relative;
    transform: translateY(-50px);
    opacity: 0;
    transition: all 0.3s ease;
}

.modal.active .modal-content {
    transform: translateY(0);
    opacity: 1;
}

.modal-close {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 28px;
    font-weight: bold;
    color: #c9a96e;
    cursor: pointer;
    transition: color 0.3s ease;
}

.modal-close:hover {
    color: #fff;
}

.modal-content h2 {
    color: #c9a96e;
    margin-top: 0;
    margin-bottom: 20px;
    font-size: 24px;
    border-bottom: 2px solid #c9a96e;
    padding-bottom: 10px;
}

.modal-body {
    color: #b0b0b0;
    font-size: 16px;
    line-height: 1.6;
}

.modal-body p {
    font-size: 18px;
    text-align: center;
    padding: 40px 0;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .footer-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
    }
    
    .company-description {
        grid-column: span 2;
        text-align: center;
    }
    
    .social-media {
        justify-content: center;
    }
    
    .company-logo {
        display: flex;
        justify-content: center;
    }
    
    .footer-heading::after {
        left: 0;
        right: 0;
        margin: 0 auto;
    }
}

@media (max-width: 768px) {
    .footer-main {
        padding: 50px 0 30px;
    }
    
    .footer-grid {
        grid-template-columns: 1fr;
        gap: 40px;
        text-align: center;
    }
    
    .company-description {
        grid-column: span 1;
    }
    
    .footer-heading::after {
        left: 50%;
        transform: translateX(-50%);
    }
    
    .footer-links a:hover {
        transform: translateX(0);
    }
    
    .contact-item {
        justify-content: center;
        text-align: center;
    }
    
    .contact-icon {
        margin-right: 0;
        margin-bottom: 10px;
    }
    
    .contact-text {
        width: 100%;
    }
    
    .bottom-content {
        flex-direction: column;
        gap: 20px;
        text-align: center;
    }
    
    .legal-links {
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }
    
    .modal-content {
        width: 90%;
        margin: 10% auto;
        padding: 20px;
    }
}

@media (max-width: 480px) {
    .footer-container {
        padding: 0 15px;
    }
    
    .footer-main {
        padding: 40px 0 20px;
    }
    
    .footer-grid {
        gap: 35px;
    }
    
    .footer-heading {
        font-size: 16px;
        margin-bottom: 20px;
    }
    
    .footer-links a,
    .company-text,
    .contact-text p {
        font-size: 14px;
    }
    
    .social-icon {
        width: 38px;
        height: 38px;
        font-size: 16px;
    }
    
    .copyright p,
    .legal-link {
        font-size: 13px;
    }
    
    .legal-links {
        gap: 15px;
    }
    
    .modal-content h2 {
        font-size: 20px;
    }
    
    .modal-body p {
        font-size: 16px;
        padding: 30px 0;
    }
}

/* Smooth transitions */
.footer-links a,
.social-icon,
.legal-link {
    transition: all 0.3s ease;
}

/* Ensure footer stays at bottom */
body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.cf-footer {
    margin-top: auto;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Update current year in copyright
    const currentYear = new Date().getFullYear();
    document.getElementById('current-year').textContent = currentYear;
    
    // Smooth scroll for footer links
    const footerLinks = document.querySelectorAll('.footer-links a');
    footerLinks.forEach(link => {
        if (link.getAttribute('href').startsWith('#') || link.getAttribute('href').includes('#')) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        }
    });
    
    // Add hover effect to contact items
    const contactItems = document.querySelectorAll('.contact-item');
    contactItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
    
    // Modal functionality
    const modalLinks = document.querySelectorAll('.open-modal');
    const modals = document.querySelectorAll('.modal');
    const closeButtons = document.querySelectorAll('.modal-close');
    
    // Open modal
    modalLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const modalId = this.getAttribute('href');
            const modal = document.querySelector(modalId);
            
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden'; // Prevent scrolling
            }
        });
    });
    
    // Close modal
    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const modal = this.closest('.modal');
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = 'auto'; // Restore scrolling
            }
        });
    });
    
    // Close modal when clicking outside
    modals.forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('active');
                document.body.style.overflow = 'auto'; // Restore scrolling
            }
        });
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            modals.forEach(modal => {
                if (modal.classList.contains('active')) {
                    modal.classList.remove('active');
                    document.body.style.overflow = 'auto'; // Restore scrolling
                }
            });
        }
    });
});
</script>

    <!-- End Footer -->
    <!-- jQuery Frameworks -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/progress-bar.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/count-to.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/YTPlayer.min.js') }}"></script>
    <script src="{{ asset('js/loopcounter.js') }}"></script>
    <script src="{{ asset('js/validnavs.js') }}"></script>
    <script src="{{ asset('js/gsap.js') }}"></script>
    <script src="{{ asset('js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('js/SplitText.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

   
</body>
</html>