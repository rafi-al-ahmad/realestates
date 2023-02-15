<!-- css file -->
<link rel="stylesheet" href="{{url('frontpage')}}/css/bootstrap.min.css">
<link rel="stylesheet" href="{{url('frontpage')}}/css/style.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="{{url('frontpage')}}/css/responsive.css">

<!-- Favicon -->
<link href="{{url('frontpage')}}/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="{{url('frontpage')}}/images/favicon.ico" sizes="128x128" rel="shortcut icon" />
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
</style>
@stack('style')