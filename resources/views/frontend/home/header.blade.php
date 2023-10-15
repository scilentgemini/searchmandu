<header class="main-header">
    <!-- header-top -->
    <div class="header-top">
        <div class="top-inner clearfix">
            <div class="left-column pull-left">
                <ul class="info clearfix">
                    <li><i class="far fa-map-marker-alt"></i>Badegaun - 14, Lalitpur</li>
                    <li><i class="far fa-clock"></i> @include('_current-time')</li>
                    <li><i class="far fa-phone"></i><a href="tel:9803507666">+977-9803507666</a></li>
                </ul>
            </div>
            <div class="right-column pull-right">
                {{-- <ul class="social-links clearfix">
                    <li><a href="/"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="/"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="/"><i class="fab fa-pinterest-p"></i></a></li>
                    <li><a href="/"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href="/"><i class="fab fa-vimeo-v"></i></a></li>
                </ul> --}}

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
                                <li><a href="{{ url('/') }}"><span>Home</span></a>
                                </li>
                                <li class="dropdown"><a href="/"><span>Properties</span></a>
                                    <ul>
                                        <li><a href="{{ route('rent.property') }}"><span>Property Rent List</span></a></li>
                                        <li><a href="{{ route('buy.property') }}"><span>Property Buy List</span></a></li>
                                    </ul>
                                </li>

                                @auth
                                    <li><a href="{{ route('dashboard') }}"><span>Dashboard</span></a></li>
                                @else
                                    
                                @endauth
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="/"><img src="{{ asset('frontend/assets/images/logo.png') }}"
                                alt=""></a></figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
