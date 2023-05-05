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
        color: {{(Route::currentRouteName()=="home") ? "#ffffff": "#484848"}};
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
</style>
@stack('style')
