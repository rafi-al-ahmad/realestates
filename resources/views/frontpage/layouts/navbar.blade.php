<!-- Main Header Nav -->
<header class="header-nav menu_style_home_one home5 navbar-scrolltofixed stricky main-menu">
    <div class="container-fluid p0">
        <!-- Ace Responsive Menu -->
        <nav>
            <!-- Menu Toggle btn-->
            <div class="menu-toggle">
                <img class="nav_logo_img img-fluid" src="{{url('frontpage')}}/images/header-logo.png" alt="header-logo.png">
                <button type="button" id="menu-btn">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <a href="{{route('home')}}" class="navbar_brand float-left dn-smd">
                <img class="logo1 img-fluid" style="height: 60px;" src="{{url('/')}}/assets/frontpage/images/logo/{{ request()->route()->getName() == 'home' ?'beynil-logo-white.png' : 'logo.png'}}" alt="header-logo.png">
                <img class="logo2 img-fluid" style="height: 60px;" src="{{url('/')}}/assets/frontpage/images/logo/logo.png" alt="header-logo2.png">
            </a>
            <ul id="respMenu" class="ace-responsive-menu text-left" data-menu-style="horizontal">
                <li>
                    <a href="{{route('home')}}"><span class="title">{{__('Home')}}</span></a>
                </li>
                <li>
                    <a href="{{route('home.filter')}}"><span class="title">{{__('Listing')}}</span></a>
                </li>
                <li>
                    <a href="{{route('home.contact')}}"><span class="title">{{__('Contact')}}</span></a>
                </li>

                <li class="last">
                    <a href="{{route('home.blog')}}"><span class="title">{{__('Blog')}}</span></a>
                </li>
                <li class="list-inline-item home5 float-right">
                    <a href="#"><span class="title text-uppercase">{{app()->currentLocale()}}</span></a>
                    <ul style="margin-left: -30px !important">
                        @foreach(config('app.supported_locales') ?? [] as $locale)
                        <li class="text-uppercase" style="width: 90px;"><a href="{{route('language.set', ['locale' => $locale])}}">{{$locale}}</a></li>
                        @endforeach
                    </ul>
                </li>


            </ul>
        </nav>
    </div>
</header>


<!-- Main Header Nav For Mobile -->
<div id="page" class="stylehome1 h0">
    <div class="mobile-menu">
        <div class="header stylehome1">
            <div class="main_logo_home2 text-center">
                <img class="logo2 img-fluid mt25" style="height: 35px;" src="{{url('/')}}/assets/frontpage/images/logo/logo.png" alt="header-logo2.png">

            </div>
            <ul class="menu_bar_home2">
                <li class="list-inline-item list_s"></li>
                <li class="list-inline-item"><a href="#menu"><span></span></a></li>
            </ul>
        </div>
    </div><!-- /.mobile-menu -->
    <nav id="menu" class="stylehome1">
        <ul>
            <li>
                <a href="{{route('home')}}"><span class="title">{{__('Home')}}</span></a>
            </li>
            <li>
                <a href="{{route('home.filter')}}"><span class="title">{{__('Listing')}}</span></a>
            </li>
            <li>
                <a href="{{route('home.contact')}}"><span class="title">{{__('Contact')}}</span></a>
            </li>
            <li class="last">
                <a href="{{route('home.blog')}}"><span class="title">{{__('Blog')}}</span></a>
            </li>
            <li>
                <a href="#"><span class="title text-uppercase">{{app()->currentLocale()}}</span></a>
                <ul>
                    @foreach(config('app.supported_locales') ?? [] as $locale)
                    <li class="text-uppercase"><a href="{{route('language.set', ['locale' => $locale])}}">{{$locale}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </nav>
</div>
