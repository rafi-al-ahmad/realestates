<!-- css file -->
@if(app()->currentLocale() == 'ar')
<link rel="stylesheet" href="{{url('frontpage')}}/css/rtl/bootstrap.rtl.min.css">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{url('frontpage')}}/css/style.css">
<link rel="stylesheet" href="{{url('frontpage')}}/css/rtl/style.rtl.css">

<style>

</style>
@else
<link rel="stylesheet" href="{{url('frontpage')}}/css/bootstrap.min.css">
<link rel="stylesheet" href="{{url('frontpage')}}/css/style.css">
<link rel="stylesheet" href="{{url('frontpage')}}/css/custom.css">

@endif
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="{{url('frontpage')}}/css/responsive.css">

<!-- Favicon -->
<link href="{{url('/')}}/assets/frontpage/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="{{url('/')}}/assets/frontpage/images/favicon.ico" sizes="128x128" rel="shortcut icon" />
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/fonts/fontawesome.css" />
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/libs/toastr/toastr.css" />

<style>
    header.header-nav.menu_style_home_one .ace-responsive-menu li a {
        color: {
                {
                (Route::currentRouteName()=="home") ? "#ffffff": "#484848"
            }
        }

        ;
    }

    .home5_bgi5 {
        background-image: url("{{url('assets/frontpage/images/home/home-1920x960.jpg')}}");
    }


    .inner_page_breadcrumb {
        background-image: url("{{url('assets/frontpage/images/contact-us/1.jpg')}}");
        background-repeat: no-repeat;
        height: 410px;
        position: relative;
    }

    .city-slider.owl-carousel.owl-theme.owl-loaded .owl-prev,
    .feature_post_slider.owl-carousel.owl-theme.owl-loaded .owl-prev,
    .feature_property_home3_slider.owl-carousel.owl-theme.owl-loaded .owl-prev,
    .feature_property_home6_slider.owl-carousel.owl-theme.owl-loaded .owl-prev,
    .our_agents_home6_slider.owl-carousel.owl-theme.owl-loaded .owl-prev {
        left: -25px;
    }

    .city-slider.owl-carousel.owl-theme.owl-loaded .owl-next,
    .feature_post_slider.owl-carousel.owl-theme.owl-loaded .owl-next,
    .feature_property_home3_slider.owl-carousel.owl-theme.owl-loaded .owl-next {
        right: -25px;
    }

    .city-slider.owl-carousel.owl-theme.owl-loaded .owl-prev,
    .city-slider.owl-carousel.owl-theme.owl-loaded .owl-next,
    .feature_post_slider.owl-carousel.owl-theme.owl-loaded .owl-prev,
    .feature_post_slider.owl-carousel.owl-theme.owl-loaded .owl-next,
    .feature_property_home3_slider.owl-carousel.owl-theme.owl-loaded .owl-prev,
    .feature_property_home3_slider.owl-carousel.owl-theme.owl-loaded .owl-next,
    .feature_property_home6_slider.owl-carousel.owl-theme.owl-loaded .owl-prev,
    .feature_property_home6_slider.owl-carousel.owl-theme.owl-loaded .owl-next,
    .our_agents_home6_slider.owl-carousel.owl-theme.owl-loaded .owl-prev,
    .our_agents_home6_slider.owl-carousel.owl-theme.owl-loaded .owl-next {
        background-color: #ffffff !important;
        border-radius: 50%;
        color: #006c70;
        height: 40px;
        line-height: 35px;
        position: absolute;
        top: 40%;
        width: 40px;
        -webkit-box-shadow: 0px 0px 50px 0px rgba(32, 32, 32, 0.15);
        -moz-box-shadow: 0px 0px 50px 0px rgba(32, 32, 32, 0.15);
        -o-box-shadow: 0px 0px 50px 0px rgba(32, 32, 32, 0.15);
        box-shadow: 0px 0px 50px 0px rgba(32, 32, 32, 0.15);
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
    }

    .city-slider.owl-carousel.owl-theme.owl-loaded .owl-prev:hover,
    .city-slider.owl-carousel.owl-theme.owl-loaded .owl-next:hover,
    .feature_post_slider.owl-carousel.owl-theme.owl-loaded .owl-prev:hover,
    .feature_post_slider.owl-carousel.owl-theme.owl-loaded .owl-next:hover,
    .feature_property_home3_slider.owl-carousel.owl-theme.owl-loaded .owl-prev:hover,
    .feature_property_home3_slider.owl-carousel.owl-theme.owl-loaded .owl-next:hover,
    .feature_property_home6_slider.owl-carousel.owl-theme.owl-loaded .owl-prev:hover,
    .feature_property_home6_slider.owl-carousel.owl-theme.owl-loaded .owl-next:hover,
    .our_agents_home6_slider.owl-carousel.owl-theme.owl-loaded .owl-prev:hover,
    .our_agents_home6_slider.owl-carousel.owl-theme.owl-loaded .owl-next:hover {
        background-color: #013e6b  !important;
        color: #ffffff;
    }

    .city-slider.owl-carousel.owl-theme .owl-nav,
    .feature_property_home3_slider.owl-carousel.owl-theme .owl-nav,
    .feature_property_home6_slider.owl-carousel.owl-theme .owl-nav,
    .our_agents_home6_slider.owl-carousel.owl-theme .owl-nav {
        margin: 0;
    }
</style>
@stack('style')
