<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

<!-- Icons -->
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/fonts/fontawesome.css" />
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/fonts/tabler-icons.css" />
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/fonts/flag-icons.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{url('dashboard')}}/assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/libs/node-waves/node-waves.css" />
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/libs/typeahead-js/typeahead.css" />
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/libs/apex-charts/apex-charts.css" />
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/libs/swiper/swiper.css" />
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/libs/toastr/toastr.css" />

<!-- Page CSS -->
<link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/css/pages/cards-advance.css" />
<style>
    .btn-danger {
        color: #fff !important;
        background-color: #ea5455;
        border-color: #ea5455;
    }

    .btn-light {
        color: #4b465c !important;
    }

    .image-square-100-cover {
        height: 100px !important;
        width: 100px !important;
        object-fit: cover !important;
    }

    .required:after {
        content: " *";
        color: red;
    }
</style>
@stack('style')
