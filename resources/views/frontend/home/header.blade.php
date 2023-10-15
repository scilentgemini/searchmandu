<header class="main-header">
    <!-- header-top -->
    <div class="header-top">
        <div class="top-inner clearfix">
            <div class="left-column pull-left">
                <ul class="info clearfix">
                    <li><i class="far fa-map-marker-alt"></i>Badegaun - 14, Lalitpur</li>
                    <li><i class="far fa-clock"></i>Mon - Sat 9.00 - 18.00</li>
                    <li><i class="far fa-phone"></i><a href="tel:2512353256">+977-9803507666</a></li>
                </ul>
            </div>
            <div class="right-column pull-right">
                <ul class="social-links clearfix">
                    <li><a href="/"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="/"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="/"><i class="fab fa-pinterest-p"></i></a></li>
                    <li><a href="/"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href="/"><i class="fab fa-vimeo-v"></i></a></li>
                </ul>

                @auth
                    <div class="sign-box">
                        <a href="{{ route('user.logout') }}"><i class="fas fa-user"></i>Logout</a>
                    </div>
                @else
                    <div class="sign-box">
                        <a href="{{ route('login') }}"><i class="fas fa-user"></i>Login</a>
                    </div>
                @endauth




            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{ url('/') }}"><img
                                src="{{ asset('frontend/assets/images/logo.png') }}" alt=""></a></figure>
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li><a href="/"><span>Home</span></a>
                                </li>
                                <li class=" "><a href="index.html"><span>Listing</span></a>
                                    <ul>
                                        <li><a href="agents-list.html">Agents List</a></li>
                                        <li><a href="agents-grid.html">Agents Grid</a></li>
                                        <li><a href="agents-details.html">Agent Details</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href="index.html"><span>Property</span></a>
                                </li>
                                <li class=" "><a href="index.html"><span>Agency</span></a>
                                    <ul>
                                        <li><a href="agency-list.html">Agency List</a></li>
                                        <li><a href="agency-grid.html">Agency Grid</a></li>
                                        <li><a href="agency-details.html">Agency Details</a></li>
                                    </ul>
                                </li>
                                <li class=" "><a href="index.html"><span>Blog</span></a>
                                    <ul>
                                        <li><a href="blog-1.html">Blog 01</a></li>
                                        <li><a href="blog-2.html">Blog 02</a></li>
                                        <li><a href="blog-3.html">Blog 03</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html"><span>Contact</span></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="btn-box">
                    <a href="index.html" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="/"><img
                                src="{{ asset('frontend/assets/images/logo.png') }}" alt=""></a></figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <div class="btn-box">
                    <a href="/" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                </div>
            </div>
        </div>
    </div>
</header>
