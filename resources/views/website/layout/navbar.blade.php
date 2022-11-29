<header>
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top ">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="d-flex justify-content-between align-items-center flex-sm">
                                <div class="header-info-left d-flex align-items-center">
                                    <!-- logo -->
                                    <div class="logo">
                                        <a href="#"><img src="{{ url('template/assets/img/logo/logo.png') }}"
                                                alt=""></a>
                                    </div>
                                    <a> </a>
                                </div>
                                <div class="header-info-right d-flex align-items-center">
                                    <ul>
                                        @if (Session::get('locale') == 'en')
                                            <li><a href="{{ url('/set-language/ar') }}">العربية</a></li>
                                        @else
                                            <li><a href="{{ url('/set-language/en') }}">English</a></li>
                                        @endif
                                        <li><a href="tel:+966 5 6444 2238"><i class="fa fa-phone"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="mailto:info@smartcore-ksa.com"><i class="fa fa-envelope"
                                                    aria-hidden="true"></i></a></li>
                                        {{-- <li class="shopping-card">
                                            <a href="cart.html"><img
                                                    src="{{ url('template/assets/img/icon/cart.svg') }}"
                                                    alt=""></a>
                                        </li> --}}
                                        <li><a href="/login" class="btn header-btn">{{__('content.signin')}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom  header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12">
                            <!-- logo 2 -->
                            <div class="logo2">
                                <a href="#"><img src="{{ url('template/assets/img/logo/logo.png') }}"
                                        alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu text-center d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="#">{{__('content.Home')}}</a></li>
                                        <li><a href="#about">{{__('content.About')}}</a></li>
                                        <li><a href="#best_selling">{{__('content.Best Selling')}}</a></li>
                                        <li><a href="#latest">{{__('content.Latest')}}</a></li>
                                        <li><a href="#contact_us">{{__('content.Contact Us')}}</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-xl-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
