<!-- css file -->
<link rel="stylesheet" href="{{url('frontpage')}}/css/bootstrap.min.css">
<link rel="stylesheet" href="{{url('frontpage')}}/css/style.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="{{url('frontpage')}}/css/responsive.css">

<!-- Favicon -->
<link href="{{url('/')}}/assets/frontpage/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="{{url('/')}}/assets/frontpage/images/favicon.ico" sizes="128x128" rel="shortcut icon" />
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/fonts/fontawesome.css" />
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/libs/toastr/toastr.css" />

<style>
    .home5_bgi5 {
        background-image: url("{{url('assets/frontpage/images/home/home-1920x960.jpg')}}");
    }

    .search_option_button.home5 button {
        background-image: -moz-linear-gradient(0deg, rgb(250, 124, 65) 0%, rgb(255, 101, 101) 100%);
        background-image: -webkit-linear-gradient(0deg, rgb(216 185 119) 0%, rgb(217 186 120) 100%);
        background-image: -ms-linear-gradient(0deg, rgb(250, 124, 65) 0%, rgb(255, 101, 101) 100%);
        border: 1px solid rgb(223 193 132);
        color: #ffffff;
    }

    ul.tag li:last-child {
        background-color: #ddc082;
    }

    .why_chose_us .icon span {
        color: #dec081;
    }

    .why_chose_us.style2:hover:before {
        background-color: #dcbe7d;
    }

    .why_chose_us.style2:hover .icon {
        background-image: -moz-linear-gradient(0deg, rgb(250, 124, 65) 0%, rgb(255, 101, 101) 100%);
        background-image: -webkit-linear-gradient(0deg, rgb(213 181 111) 0%, rgb(218 185 116) 100%);
        background-image: -ms-linear-gradient(0deg, rgb(250, 124, 65) 0%, rgb(255, 101, 101) 100%);
    }

    .footer_mailchimp_form.home5 .col-auto button {
        background-image: -moz-linear-gradient(0deg, rgb(250, 124, 65) 0%, rgb(255, 101, 101) 100%);
        background-image: -webkit-linear-gradient(0deg, rgb(220 190 125) 0%, rgb(221 192 129) 100%);
        background-image: -ms-linear-gradient(0deg, rgb(250, 124, 65) 0%, rgb(255, 101, 101) 100%);
    }

    .feat_property .thumb .thmb_cntnt ul.tag li:last-child,
    .feat_property.home8 ul.tag li:last-child,
    .properti_city.home6 .thumb .thmb_cntnt ul.tag li:last-child,
    .feat_property.list .dtls_headr ul.tag li:last-child {
        background-color: #dcbd7c;
    }

    .btn-thm {
        background-color: #d9b76f;
        border: 2px solid #dec082;
        color: #ffffff;
    }

    .mbp_pagination ul.page_navigation li.active .page-link {
        background-color: #dcbe7d;
        color: #ffffff;
    }

    header.header-nav.menu_style_home_one a.navbar_brand span,
    header.header-nav.menu_style_home_three a.navbar_brand span,
    header.header-nav.menu_style_home_five a.navbar_brand span {
        color: #484848;
    }

    .inner_page_breadcrumb {
        background-image: url("{{url('assets/frontpage/images/contact-us/1.jpg')}}");
        background-repeat: no-repeat;
        height: 410px;
        position: relative;
    }

    .form_grid .contact_form button {
        background-color: #dabd7b;
    }

    .btn-thm:hover,
    .btn-thm:active,
    .btn-thm:focus {
        background-color: #ffffff;
        border-color: #8a917e;
    }

    .bgc-thm {
        background-color: #dbba76 !important;
    }

    .parner_reg_btn a.btn {
        background-color: rgb(35 39 51);
    }

    .btn-thm2 {
        background-color: #ff787c;
        border-color: #dbba76;
        color: #fffdfa;

    }

    .parner_reg_btn a.btn:hover,
    .parner_reg_btn a.btn:active,
    .parner_reg_btn a.btn:focus {
        background-color: #ffffff;
        color: #232733;
    }

    .btn-thm2:hover,
    .btn-thm2:active,
    .btn-thm2:focus {
        background-color: #ffffff;
        border-color: #232733;
        color: #232733;
    }

    .text-thm {
        color: #013e6b !important;
    }

    .btn-thm:hover,
    .btn-thm:active,
    .btn-thm:focus {
        color: #232733;
    }

    .start-partners.home5 {
        background-image: -moz-linear-gradient(0deg, rgb(218 185 118) 0%, rgb(222 193 132) 100%);
        background-image: -webkit-linear-gradient(0deg, rgb(218 185 118) 0%, rgb(222 193 132) 100%);
        background-image: -ms-linear-gradient(0deg, rgb(218 185 118) 0%, rgb(222 193 132) 100%);
    }

    .parner_reg_btn.home5 a.btn {
        background-color: #ffffff;
        color: #232733;
    }

    .parner_reg_btn.home5 a.btn:hover,
    .parner_reg_btn.home5 a.btn:active,
    .parner_reg_btn.home5 a.btn:focus {
        background-color: #232733;
        border: 1px solid #ffffff;
        color: #ffffff;
    }

    #open.flaticon-filter-results-button:before,
    #open.flaticon-close:before,
    #open2.flaticon-filter-results-button:before,
    #open2.flaticon-close:before {
        background-color: #dbba73;
    }

    #main .filteropen,
    #main2 .filteropen2,
    #main2 .filter_open_btn {
        background-color: #e6c985;
    }

    header.header-nav.menu_style_home_one .ace-responsive-menu>li>ul.sub-menu,
    header.header-nav.home2.style_one .ace-responsive-menu>li>ul.sub-menu {
        margin-left: -30px;
    }

    header.header-nav.menu_style_home_one .ace-responsive-menu li a {
        color: {{(Route::currentRouteName() == 'home') ? '#ffffff' : '#484848'}};
    }

    .lh-10 {
        line-height: 1 !important;
    }
    .lh-15 {
        line-height: 1.5 !important;
    }
    .lh-20 {
        line-height: 2 !important;
    }
    .lh-25 {
        line-height: 2.5 !important;
    }
    .lh-30 {
        line-height: 3 !important;
    }

    .font-size-2 {
        font-size: 2rem !important;
    }

    .font-size-25 {
        font-size: 2.5rem !important;
    }

    .font-size-3 {
        font-size: 3rem !important;
    }


    .owl-dots {
        max-height: 25px;
    }

    .btn-blue {
        background-color: #013e6b !important;
        border-color: #013e6b !important;
        color: #ffffff !important;
    }

    .bg-blue {
        color: #ffffff !important;
        background-color: #013e6b !important;
    }

    .font-blue {
        color: #013e6b !important;
    }

    .font-size-3 {
        font-size: 3rem !important;
    }

    .font-size-4 {
        font-size: 4rem !important;
    }

    .font-size-5 {
        font-size: 5rem !important;
    }

    .font-sans-serif {
        font-family: sans-serif !important;
    }

    .bg-white-34 {
        background-color: rgb(255 255 255 / 34%) !important
    }



    .br-8 {
        border-radius: 8px !important
    }

    .br-15 {
        border-radius: 15px !important
    }

    .br-25 {
        border-radius: 25px !important
    }

    .font-x-large {
        font-size: x-large !important
    }

    .font-23px {
        font-size: 23px !important
    }

    .mw-245 {
        min-width: 245px !important;
    }

    .fit-cover {
        object-fit: cover !important;
    }

    @media only screen and (min-width: 1199px) {
        .mt-xl-242 {
            margin-top: 242px !important;
        }

        .plr-xl-6 {
            padding-left: 6rem !important;
            padding-right: 6rem !important;
        }

        .font-size-xl-4 {
            font-size: 4rem !important;
        }

        .font-size-xl-4 {
            font-size: 4rem !important;
        }
    }

    @media only screen and (min-width: 979px) {
        .font-size-lg-3 {
            font-size: 3rem !important;
        }
    }

    .search_option_button.home5 .btn {
        background-image: -moz-linear-gradient(0deg, rgb(250, 124, 65) 0%, rgb(255, 101, 101) 100%);
        background-image: -webkit-linear-gradient(0deg, rgb(216 185 119) 0%, rgb(217 186 120) 100%);
        background-image: -ms-linear-gradient(0deg, rgb(250, 124, 65) 0%, rgb(255, 101, 101) 100%);
        border: 1px solid rgb(223 193 132);
        color: #ffffff;
    }

    .h700 {
        height: 700px !important;
    }

    .w-35 {
        width: 35% !important;
    }
</style>
@stack('style')
