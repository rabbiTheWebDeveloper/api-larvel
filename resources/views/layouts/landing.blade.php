<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Solution</title>


    <!-- FONT LINK -->
    <!-- font-family: 'Montserrat', sans-serif; -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">



    <!-- CSS Link -->
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/media.css') }}">



</head>

<body>

<!-- Preloader -->

<div class="preloader">
    <img src="{{ asset('landing/images/preloader.gif')}}" alt="">
</div>



<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START Header PART
---------------------------------------------------------------------------------------------------------------------------------------------------  -->

<nav class="Nav">

    <div class="container">

        <div class="DesktopNav">

            <div class="row d_flex">

                <!-- logo -->
                <div class="col-lg-3">

                    <div class="logo">
                        <img src="{{ asset('landing/images/logo.svg') }}" alt="logo">
                    </div>

                </div>

                <!-- Menubar -->
                <div class="col-lg-6">

                    <div class="Menubar">

                        <ul>

                            <li><a href="" class="active">Home</a></li>
                            <li><a href="">Feature</a></li>
                            <li><a href="">Themes</a></li>
                            <li><a href="">Pricing</a></li>
                            <li><a href="">Blogs</a></li>

                        </ul>

                    </div>

                </div>

                <!-- Login -->
                <div class="col-lg-3">

                    <div class="Login">

                        <a href="">Log In</a>
                        <a href="{{ route('merchant.register') }}">Sign Up</a>

                    </div>

                </div>

            </div>

        </div>

        <div class="MobileNav">

            <div class="row d_flex">

                <!-- logo -->
                <div class="col-7">

                    <div class="logo">
                        <img src="{{ asset('landing/images/logo.svg') }}" alt="logo">
                    </div>

                </div>

                <!-- Menubar -->
                <div class="col-5">

                    <button class="MenuIcon" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <img src="{{ asset('landing/images/menu.png')}}" alt="">
                    </button>

                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="uil uil-multiply"></i></button>
                        <div class="offcanvas-body">

                            <div class="Menubar">

                                <ul>

                                    <li><a href="" class="active">Home</a></li>
                                    <li><a href="">Feature</a></li>
                                    <li><a href="">Themes</a></li>
                                    <li><a href="">Pricing</a></li>
                                    <li><a href="">Blogs</a></li>

                                </ul>

                                <div class="Login">
                                    <a href="">Log In</a>
                                    <a href="">Sign Up</a>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</nav>

<!-- Sections Gaps -->
<div class="section_gaps"></div>

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    Banner   PART
---------------------------------------------------------------------------------------------------------------------------------------------------  -->
<section class="Banner">

    <div class="container">

        <div class="row d_flex">

            <div class="col-lg-5">

                <div class="BannerText">
                    <h2> <span>Welcome to</span> the first Ever automated E-Commerce Sales funnel <span>in bangladesh</span></h2>
                </div>

            </div>

            <div class="col-lg-2">

                <div class="img">
                    <img src="{{ asset('landing/images/banner_arrow.png')}}" alt="">
                </div>

            </div>

            <div class="col-lg-5">

                <div class="BannerRight">
                    <h2> <span>Create Your</span> Own Online Shop, <span>Decorate Your Shop,</span> Boost Up Your Sales !</h2>
                </div>

            </div>

        </div>

    </div>

    <div class="BannerBg">
        <img src="{{ asset('landing/images/banner_bg.svg') }}" alt="">

        <div class="overlay">

            <div class="container">

                <div class="row">

                    <div class="col-lg-6 m-auto">

                        <img src="{{ asset('landing/images/banner_img.png') }}" alt="">

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>




<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    How to setup  PART
---------------------------------------------------------------------------------------------------------------------------------------------------  -->

<section class="HowToSetUp section_gaps" data-aos="fade-up" data-aos-duration="1000">

    <div class="container">

        <div class="row">

            <div class="col-lg-10 m-auto">

                <div class="Header">

                    <h2>How To Set Up Your Online Shop</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget proin aliquet eget massa quis mi netus mi. Morbi sed id amet faucibus dolor, auctor. Pulvinar vitae risus leo.</p>
                </div>

                <div class="img">
                    <img src="{{ asset('landing/images/how-to-set-up.svg')}}" alt="">
                </div>

            </div>

        </div>

    </div>

</section>


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    BestFeatures  PART
---------------------------------------------------------------------------------------------------------------------------------------------------  -->

<section class="BestFeatures section_gaps">

    <div class="row d_flex">

        <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1000">

            <div class="BestFeaturesImg">
                <img src="{{ asset('landing/images/best_feature.svg')}}" alt="">
            </div>

        </div>

        <div class="col-lg-6" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">

            <div class="BestFeaturesText">

                <h2>Best Features That Will Make <span>Your Shop Best</span></h2>

                <ul>
                    <li>Easy & Smart Dashboard</li>
                    <li>Instant Shop Creation</li>
                    <li>Easy Shop Management</li>
                    <li>Smart Analytics Report</li>
                    <li>Effecient Order Management</li>
                    <li>Quick Courier Setup</li>
                    <li>One Page Funnel Template</li>
                    <li>Vast Collection Of Themes</li>
                    <li>Smart Customer Management</li>
                    <li>Instant Shop Creation</li>
                    <li>Easy Shop Management</li>
                    <li>Smart Analytics Report</li>
                    <li>Effecient Order Management</li>
                </ul>

            </div>

        </div>

    </div>

</section>

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START ManageYourShop PART
---------------------------------------------------------------------------------------------------------------------------------------------------  -->
<section class="ManageYourShop section_gaps">

    <div class="container">

        <div class="row d_flex">

            <div class="col-lg-7" data-aos="fade-up"data-aos-anchor-placement="top-bottom" data-aos-duration="1000">

                <div class="Header">

                    <h2>Manage Your Shop On The Go With <span>Mobile Friendly Application</span></h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget proin aliquet eget massa quis mi netus mi. Morbi sed id amet faucibus dolor, auctor. Pulvinar vitae risus leo. Aliquet nunc sodales commodo nec. Dictum ornare ut ullamcorper eleifend. Non sed suspendisse ullamcorper ultrices elementum.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis praesentium earum delectus vero doloribus soluta reprehenderit, eos tempore, sapiente ipsam pariatur corporis laboriosam eveniet possimus. Consectetur beatae libero eaque suscipit.</p>

                </div>

                <div class="SmartDashbord d_flex d_justify">

                    <!-- item -->
                    <div class="SmartDashbordItem">

                        <div class="img">
                            <img src="{{ asset('landing/images/home.png')}}" alt="">
                        </div>

                        <p>Smart <br> Dashboard</p>

                    </div>

                    <!-- item -->
                    <div class="SmartDashbordItem">

                        <div class="img">
                            <img src="{{ asset('landing/images/browser.png')}}" alt="">
                        </div>

                        <p>Fast <br> Browsing</p>

                    </div>

                    <!-- item -->
                    <div class="SmartDashbordItem">

                        <div class="img">
                            <img src="{{ asset('landing/images/computer.png') }}" alt="">
                        </div>

                        <p>Easy Website <br> Management</p>

                    </div>

                    <!-- item -->
                    <div class="SmartDashbordItem">

                        <div class="img">
                            <img src="{{ asset('landing/images/mobile.png') }}" alt="">
                        </div>

                        <p>All Device <br> Compatible</p>

                    </div>

                </div>

            </div>

            <div class="col-lg-5" data-aos="fade-down"data-aos-anchor-placement="top-bottom" data-aos-duration="1000">

                <div class="ManageShop">
                    <img src="{{ asset('landing/images/manageshop.png') }}" alt="">
                </div>

            </div>

        </div>

    </div>

</section>


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
  START OurService PART
---------------------------------------------------------------------------------------------------------------------------------------------------  -->
<section class="OurService section_gaps" data-aos="fade-up" data-aos-duration="1000">

    <div class="container">

        <div class="row">

            <div class="col-lg-10 m-auto">

                <div class="Header text-center">
                    <h2>Business Sectors Who Can Use Our Service</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget proin aliquet eget massa quis mi netus mi. Morbi sed id amet faucibus dolor, auctor. Pulvinar vitae risus leo.</p>
                </div>

            </div>

        </div>

    </div>

    <!-- slider -->
    <div class="OurServiceSliderContent">

        <div class="swiper OurServiceSlider">

            <div class="swiper-wrapper">

                <!-- item -->
                <div class="swiper-slide">

                    <div class="OurServiceSliderItem">

                        <a href="">

                            <div class="img">
                                <img src="{{ asset('landing/images/service1.png') }}" alt="">
                            </div>

                            <p>Watch & Clock Shop</p>

                        </a>

                    </div>

                </div>

                <!-- item -->
                <div class="swiper-slide">

                    <div class="OurServiceSliderItem">

                        <a href="">

                            <div class="img">
                                <img src="{{ asset('landing/images/service2.png') }}" alt="">
                            </div>

                            <p>Watch & Clock Shop</p>

                        </a>

                    </div>

                </div>

                <!-- item -->
                <div class="swiper-slide">

                    <div class="OurServiceSliderItem">

                        <a href="">

                            <div class="img">
                                <img src="{{ asset('landing/images/service3.png') }}" alt="">
                            </div>

                            <p>Watch & Clock Shop</p>

                        </a>

                    </div>

                </div>

                <!-- item -->
                <div class="swiper-slide">

                    <div class="OurServiceSliderItem">

                        <a href="">

                            <div class="img">
                                <img src="{{ asset('landing/images/service4.png') }}" alt="">
                            </div>

                            <p>Watch & Clock Shop</p>

                        </a>

                    </div>

                </div>

                <!-- item -->
                <div class="swiper-slide">

                    <div class="OurServiceSliderItem">

                        <a href="">

                            <div class="img">
                                <img src="{{ asset('landing/images/service5.png') }}" alt="">
                            </div>

                            <p>Watch & Clock Shop</p>

                        </a>

                    </div>

                </div>

                <!-- item -->
                <div class="swiper-slide">

                    <div class="OurServiceSliderItem">

                        <a href="">

                            <div class="img">
                                <img src="{{ asset('landing/images/service6.png') }}" alt="">
                            </div>

                            <p>Watch & Clock Shop</p>

                        </a>

                    </div>

                </div>

                <!-- item -->
                <div class="swiper-slide">

                    <div class="OurServiceSliderItem">

                        <a href="">

                            <div class="img">
                                <img src="{{ asset('landing/images/service7.png') }}" alt="">
                            </div>

                            <p>Watch & Clock Shop</p>

                        </a>

                    </div>

                </div>

                <!-- item -->
                <div class="swiper-slide">

                    <div class="OurServiceSliderItem">

                        <a href="">

                            <div class="img">
                                <img src="{{ asset('landing/images/service1.png') }}" alt="">
                            </div>

                            <p>Watch & Clock Shop</p>

                        </a>

                    </div>

                </div>

                <!-- item -->
                <div class="swiper-slide">

                    <div class="OurServiceSliderItem">

                        <a href="">

                            <div class="img">
                                <img src="{{ asset('landing/images/service2.png') }}" alt="">
                            </div>

                            <p>Watch & Clock Shop</p>

                        </a>

                    </div>

                </div>

                <!-- item -->
                <div class="swiper-slide">

                    <div class="OurServiceSliderItem">

                        <a href="">

                            <div class="img">
                                <img src="{{ asset('landing/images/service3.png') }}" alt="">
                            </div>

                            <p>Watch & Clock Shop</p>

                        </a>

                    </div>

                </div>

                <!-- item -->
                <div class="swiper-slide">

                    <div class="OurServiceSliderItem">

                        <a href="">

                            <div class="img">
                                <img src="{{ asset('landing/images/service4.png') }}" alt="">
                            </div>

                            <p>Watch & Clock Shop</p>

                        </a>

                    </div>

                </div>

                <!-- item -->
                <div class="swiper-slide">

                    <div class="OurServiceSliderItem">

                        <a href="">

                            <div class="img">
                                <img src="{{ asset('landing/images/service5.png') }}" alt="">
                            </div>

                            <p>Watch & Clock Shop</p>

                        </a>

                    </div>

                </div>

                <!-- item -->
                <div class="swiper-slide">

                    <div class="OurServiceSliderItem">

                        <a href="">

                            <div class="img">
                                <img src="{{ asset('landing/images/service6.png') }}" alt="">
                            </div>

                            <p>Watch & Clock Shop</p>

                        </a>

                    </div>

                </div>

                <!-- item -->
                <div class="swiper-slide">

                    <div class="OurServiceSliderItem">

                        <a href="">

                            <div class="img">
                                <img src="{{ asset('landing/images/service7.png') }}" alt="">
                            </div>

                            <p>Watch & Clock Shop</p>

                        </a>

                    </div>

                </div>

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </div>

</section>

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    slider  PART
---------------------------------------------------------------------------------------------------------------------------------------------------  -->
<section class="ShopTheme section_gaps" data-aos="fade-up" data-aos-duration="1000">

    <div class="container">

        <div class="row">

            <div class="col-lg-10 m-auto">

                <div class="Header text-center">
                    <h2>Choose Your Shop Theme</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget proin aliquet eget massa quis mi netus mi. Morbi sed id amet faucibus dolor, auctor. Pulvinar vitae risus leo.</p>
                </div>

            </div>

        </div>

        <!-- ShopThemeContent -->

        <div class="ShopThemeContent">

            <div class="row">

                <!-- item -->
                <div class="col-lg-4 col-sm-6">

                    <div class="ShopThemeItem">

                        <div class="img">
                            <img src="{{ asset('landing/images/theme1.png') }}" alt="">
                        </div>

                        <div class="text">

                            <h3>Furniture & Interior Business</h3>

                            <a href="">View Demo</a>

                        </div>

                    </div>

                </div>

                <!-- item -->
                <div class="col-lg-4 col-sm-6">

                    <div class="ShopThemeItem">

                        <div class="img">
                            <img src="{{ asset('landing/images/theme2.png') }}" alt="">
                        </div>

                        <div class="text">

                            <h3>Grocery/Organic Foods Farm</h3>

                            <a href="">View Demo</a>

                        </div>

                    </div>

                </div>

                <!-- item -->
                <div class="col-lg-4 col-sm-6">

                    <div class="ShopThemeItem">

                        <div class="img">
                            <img src="{{ asset('landing/images/theme3.png') }}" alt="">
                        </div>

                        <div class="text">

                            <h3>Restaurant/FoodBusiness</h3>

                            <a href="">View Demo</a>

                        </div>

                    </div>

                </div>

                <!-- item -->
                <div class="col-lg-4 col-sm-6">

                    <div class="ShopThemeItem">

                        <div class="img">
                            <img src="{{ asset('landing/images/theme4.png') }}" alt="">
                        </div>

                        <div class="text">

                            <h3>Electronics And Gadgets Shop</h3>

                            <a href="">View Demo</a>

                        </div>

                    </div>

                </div>

                <!-- item -->
                <div class="col-lg-4 col-sm-6">

                    <div class="ShopThemeItem">

                        <div class="img">
                            <img src="{{ asset('landing/images/theme5.png') }}" alt="">
                        </div>

                        <div class="text">

                            <h3>Fancy Watch & Clock Shop</h3>

                            <a href="">View Demo</a>

                        </div>

                    </div>

                </div>

                <!-- item -->
                <div class="col-lg-4 col-sm-6">

                    <div class="ShopThemeItem">

                        <div class="img">
                            <img src="{{ asset('landing/images/theme6.png') }}" alt="">
                        </div>

                        <div class="text">

                            <h3>Jewellery & Ornaments Shop</h3>

                            <a href="">View Demo</a>

                        </div>

                    </div>

                </div>

                <!-- item -->
                <div class="col-lg-12">

                    <div class="ShowMore">
                        <a href="">View All Themes</a>
                    </div>

                </div>

            </div>

        </div>


    </div>

</section>

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    Subscription Package  PART
---------------------------------------------------------------------------------------------------------------------------------------------------  -->
<section class="ShopTheme section_gaps" data-aos="fade-up" data-aos-duration="1000">

    <div class="container">

        <div class="row">

            <div class="col-lg-10 m-auto" >

                <div class="Header text-center">
                    <h2>Choose Your One Page Funnel Template</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget proin aliquet eget massa quis mi netus mi. Morbi sed id amet faucibus dolor, auctor. Pulvinar vitae risus leo.</p>
                </div>

            </div>

        </div>

        <!-- ShopThemeContent -->

        <div class="ShopThemeContent">

            <div class="row">

                <!-- item -->
                <div class="col-lg-4 col-sm-6">

                    <div class="ShopThemeItem">

                        <div class="img">
                            <img src="{{ asset('landing/images/landing1.png') }}" alt="">
                        </div>

                        <div class="text">

                            <h3>Landing Page 1</h3>

                            <a href="">View Demo</a>

                        </div>

                    </div>

                </div>

                <!-- item -->
                <div class="col-lg-4 col-sm-6">

                    <div class="ShopThemeItem">

                        <div class="img">
                            <img src="{{ asset('landing/images/landing2.png') }}" alt="">
                        </div>

                        <div class="text">

                            <h3>Landing Page 2</h3>

                            <a href="">View Demo</a>

                        </div>

                    </div>

                </div>

                <!-- item -->
                <div class="col-lg-4 col-sm-6">

                    <div class="ShopThemeItem">

                        <div class="img">
                            <img src="{{ asset('landing/images/landing3.png') }}" alt="">
                        </div>

                        <div class="text">

                            <h3>Landing Page 3</h3>

                            <a href="">View Demo</a>

                        </div>

                    </div>

                </div>

                <!-- item -->
                <div class="col-lg-4 col-sm-6">

                    <div class="ShopThemeItem">

                        <div class="img">
                            <img src="{{ asset('landing/images/landing4.png') }}" alt="">
                        </div>

                        <div class="text">

                            <h3>Landing Page 4</h3>

                            <a href="">View Demo</a>

                        </div>

                    </div>

                </div>

                <!-- item -->
                <div class="col-lg-4 col-sm-6">

                    <div class="ShopThemeItem">

                        <div class="img">
                            <img src="{{ asset('landing/images/landing5.png') }}" alt="">
                        </div>

                        <div class="text">

                            <h3>Landing Page 5</h3>

                            <a href="">View Demo</a>

                        </div>

                    </div>

                </div>

                <!-- item -->
                <div class="col-lg-4 col-sm-6">

                    <div class="ShopThemeItem">

                        <div class="img">
                            <img src="{{ asset('landing/images/landing6.png') }}" alt="">
                        </div>

                        <div class="text">

                            <h3>Landing Page 6</h3>

                            <a href="">View Demo</a>

                        </div>

                    </div>

                </div>

                <!-- item -->
                <div class="col-lg-12">

                    <div class="ShowMore">
                        <a href="">View All Themes</a>
                    </div>

                </div>

            </div>

        </div>


    </div>

</section>
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    ask question  PART
---------------------------------------------------------------------------------------------------------------------------------------------------  -->
<section class="CustomerReview section_gaps" data-aos="fade-up" data-aos-duration="1000">

    <div class="Customeroverlay">
        <img src="{{ asset('landing/images/customer_overlay.png') }}" alt="">
    </div>

    <div class="CustomeroverlayRight">
        <img src="{{ asset('landing/images/customer_overlay.png') }}" alt="">
    </div>

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="swiper CustomerReviewSlider">

                    <div class="swiper-wrapper">

                        <!-- item -->
                        <div class="swiper-slide">

                            <div class="CustomerItem">

                                <div class="Quate">
                                    <img src="{{ asset('landing/images/quote.png') }}" alt="">
                                </div>

                                <div class="img">
                                    <img src="{{ asset('landing/images/profile.png') }}" alt="">
                                </div>

                                <h3>SaleSolution was best solution for my clothing business !</h3>

                                <h4>Yeasmin Chowdhury</h4>

                                <h5>Founder & CEO, Myshop</h5>

                            </div>

                        </div>

                        <!-- item -->
                        <div class="swiper-slide">

                            <div class="CustomerItem">

                                <div class="Quate">
                                    <img src="{{ asset('landing/images/quote.png') }}" alt="">
                                </div>

                                <div class="img">
                                    <img src="{{ asset('landing/images/profile.png') }}" alt="">
                                </div>

                                <h3>SaleSolution was best solution for my clothing business !</h3>

                                <h4>Yeasmin Chowdhury</h4>

                                <h5>Founder & CEO, Myshop</h5>

                            </div>

                        </div>

                        <!-- item -->
                        <div class="swiper-slide">

                            <div class="CustomerItem">

                                <div class="Quate">
                                    <img src="{{ asset('landing/images/quote.png') }}" alt="">
                                </div>

                                <div class="img">
                                    <img src="{{ asset('landing/images/profile.png') }}" alt="">
                                </div>

                                <h3>SaleSolution was best solution for my clothing business !</h3>

                                <h4>Yeasmin Chowdhury</h4>

                                <h5>Founder & CEO, Myshop</h5>

                            </div>

                        </div>

                        <!-- item -->
                        <div class="swiper-slide">

                            <div class="CustomerItem">

                                <div class="Quate">
                                    <img src="{{ asset('landing/images/quote.png') }}" alt="">
                                </div>

                                <div class="img">
                                    <img src="{{ asset('landing/images/profile.png') }}" alt="">
                                </div>

                                <h3>SaleSolution was best solution for my clothing business !</h3>

                                <h4>Yeasmin Chowdhury</h4>

                                <h5>Founder & CEO, Myshop</h5>

                            </div>

                        </div>

                        <!-- item -->
                        <div class="swiper-slide">

                            <div class="CustomerItem">

                                <div class="Quate">
                                    <img src="{{ asset('landing/images/quote.png') }}" alt="">
                                </div>

                                <div class="img">
                                    <img src="{{ asset('landing/images/profile.png') }}" alt="">
                                </div>

                                <h3>SaleSolution was best solution for my clothing business !</h3>

                                <h4>Yeasmin Chowdhury</h4>

                                <h5>Founder & CEO, Myshop</h5>

                            </div>

                        </div>

                    </div>

                    <div class="swiper-pagination"></div>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    ChossePackageConent PART
---------------------------------------------------------------------------------------------------------------------------------------------------  -->
<section class="ChossePackage section_gaps" data-aos="fade-up" data-aos-duration="1000">

    <div class="container">

        <div class="row">

            <div class="col-lg-10 m-auto">

                <div class="Header text-center">
                    <h2>Choose Your Subscription Package</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo cumque, magni aliquam dolores necessitatibus asperiores numquam dignissimos explicabo distinctio pariatur!</p>
                </div>

            </div>

        </div>

        <!-- ChossePackageConent -->
        <div class="ChossePackageConent">

            <div class="row">

                <!-- item -->
                <div class="col-lg-4">

                    <div class="ChossePackageItem">

                        <div class="PackageImg">
                            <img src="{{ asset('landing/images/package_img.svg') }}" alt="">
                        </div>

                        <h4>Basic</h4>
                        <h3>BDT 2500</h3>
                        <h5>Every Month</h5>

                        <ul>

                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> 1 online store</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Unlimited products</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> 501-800 Order Monthly</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Payment gateway integration</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Marketing tools</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Free SSL certificate</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Discount codes</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Themes</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Plugins</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> 24/7 support</li>

                        </ul>

                        <a href="">Subscribe</a>

                    </div>

                </div>

                <!-- item -->
                <div class="col-lg-4">

                    <div class="ChossePackageItem">

                        <div class="PackageImg">
                            <img src="{{ asset('landing/images/package_img.svg') }}" alt="">
                        </div>

                        <h4>Basic</h4>
                        <h3>BDT 2500</h3>
                        <h5>Every Month</h5>

                        <ul>

                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> 1 online store</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Unlimited products</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> 501-800 Order Monthly</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Payment gateway integration</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Marketing tools</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Free SSL certificate</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Discount codes</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Themes</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Plugins</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> 24/7 support</li>

                        </ul>

                        <a href="">Subscribe</a>

                    </div>

                </div>

                <!-- item -->
                <div class="col-lg-4">

                    <div class="ChossePackageItem">

                        <div class="PackageImg">
                            <img src="{{ asset('landing/images/package_img.svg') }}" alt="">
                        </div>

                        <h4>Basic</h4>
                        <h3>BDT 2500</h3>
                        <h5>Every Month</h5>

                        <ul>

                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> 1 online store</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Unlimited products</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> 501-800 Order Monthly</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Payment gateway integration</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Marketing tools</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Free SSL certificate</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Discount codes</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Themes</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> Plugins</li>
                            <li> <img src="{{ asset('landing/images/sign.svg') }}" alt=""> 24/7 support</li>

                        </ul>

                        <a href="">Subscribe</a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    toatal client clounter  PART
---------------------------------------------------------------------------------------------------------------------------------------------------  -->
<section class="AskQus section_gaps" data-aos="zoom-in-down" data-aos-duration="1000">

    <div class="container">

        <div class="row">

            <div class="col-lg-10 m-auto">

                <div class="Header text-center">
                    <h2>Frequently Asked Questions</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget proin aliquet eget massa quis mi netus mi. Morbi sed id amet faucibus dolor, auctor. Pulvinar vitae risus leo.</p>
                </div>

            </div>

        </div>

        <!-- AskQusContent -->
        <div class="AskQusContent">

            <div class="row d_flex">

                <div class="col-lg-6">

                    <div class="AskQusTabs">

                        <div class="accordion" id="accordionExample">

                            <div class="accordion-item">

                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Where can I watch?
                                    </button>
                                </h2>

                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">

                                    <div class="accordion-body">
                                        <p>Nibh quisque suscipit fermentum netus nulla cras porttitor euismod nulla. Orci, dictumst nec aliquet id ullamcorper venenatis. </p>
                                    </div>

                                </div>

                            </div>

                            <div class="accordion-item">

                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Accordion Item #2
                                    </button>
                                </h2>

                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">

                                    <div class="accordion-body">

                                        <p>Nibh quisque suscipit fermentum netus nulla cras porttitor euismod nulla. Orci, dictumst nec aliquet id ullamcorper venenatis. </p>

                                    </div>

                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Accordion Item #3
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Nibh quisque suscipit fermentum netus nulla cras porttitor euismod nulla. Orci, dictumst nec aliquet id ullamcorper venenatis. </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="AskImg">
                        <img src="{{ asset('landing/images/qus.png') }}" alt="">
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    footer   PART
---------------------------------------------------------------------------------------------------------------------------------------------------  -->
<section class="JoinUs section_gaps" data-aos="fade-up" data-aos-duration="1000">

    <div class="container">

        <div class="row">

            <div class="col-lg-10 m-auto">

                <div class="Header text-center">

                    <h2>Join Us On Social Media</h2>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis rerum error, esse unde quo maiores repellat ipsum blanditiis non architecto.</p>

                </div>

                <div class="SocialIcon d_flex">

                    <a href="" class="fb"><i class="uil uil-facebook-f"></i></a>
                    <a href="" class="ins"><i class="uil uil-instagram"></i></a>
                    <a href="" class="youtube"><i class="uil uil-youtube"></i></a>
                    <a href="" class="whats"><i class="uil uil-whatsapp"></i></a>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="OurPlugin section_gaps">

    <div class="container">

        <div class="row">

            <div class="col-lg-3 col-sm-6">

                <div class="OurPluginItem">
                    <h3>2000+</h3>
                    <h4>Clients Onboarded</h4>
                </div>

            </div>

            <div class="col-lg-3 col-sm-6">

                <div class="OurPluginItem">
                    <h3>50+</h3>
                    <h4>Shop Themes</h4>
                </div>

            </div>

            <div class="col-lg-3 col-sm-6">

                <div class="OurPluginItem">
                    <h3>100+</h3>
                    <h4>Shop Crearted</h4>
                </div>

            </div>

            <div class="col-lg-3 col-sm-6">

                <div class="OurPluginItem">
                    <h3>590+</h3>
                    <h4>Plugin Added</h4>
                </div>

            </div>

        </div>

    </div>

</section>


<footer class="Footer section_gaps">

    <div class="container">

        <div class="row">

            <div class="col-lg-6">

                <div class="row">

                    <div class="col-lg-6 col-sm-6">

                        <div class="Address">
                            <h4>Address</h4>
                            <p>52 Bedok Reservoir Cres Singapore 479226</p>
                        </div>

                        <div class="Address">
                            <h4>Contact No.</h4>
                            <a href="tel:0123456789">+880 123 456 789</a>
                            <a href="tel:0123456789">+880 123 456 789</a>
                        </div>

                        <div class="Address">
                            <h4>E-mail Address</h4>
                            <a href="mailto:support@salesolution.com">support@salesolution.com</a>
                        </div>

                        <div class="Logo">
                            <img src="{{ asset('landing/images/logo.svg') }}" alt="">
                        </div>

                    </div>

                    <div class="col-lg-6 col-sm-6">

                        <div class="Address">

                            <h4>Quick Links</h4>

                            <div class="Menubar">

                                <ul>

                                    <li><a href="">Home</a></li>
                                    <li><a href="">Feature</a></li>
                                    <li><a href="">Themes</a></li>
                                    <li><a href="">Pricing</a></li>
                                    <li><a href="">Blogs</a></li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="FormPart">

                    <form action="" method="post">

                        <div class="CustomeInput">
                            <input type="text" name="" placeholder="Full Name">
                        </div>

                        <div class="CustomeInput">
                            <input type="text" name="" placeholder="Contact Number">
                        </div>

                        <div class="CustomeInput">
                            <input type="text" name="" placeholder="E-mail Address">
                        </div>

                        <div class="CustomeInput">
                            <textarea name="" id="" rows="5" placeholder="Enter Your Message"></textarea>
                        </div>

                        <div class="CustomeInput">
                            <button type="submit">Submit</button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</footer>

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START  PART
---------------------------------------------------------------------------------------------------------------------------------------------------  -->
<a id="backToTop"><i class="fas fa-long-arrow-alt-up"></i></a>

<!-- JS Link -->
<script src="{{ asset('landing/js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('landing/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('landing/js/all.min.js') }}"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('landing/js/custom.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</body>

</html>
