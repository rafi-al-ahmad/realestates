<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{url('dashboard')}}/assets/vendor/libs/jquery/jquery.js"></script>
<script src="{{url('dashboard')}}/assets/vendor/libs/popper/popper.js"></script>
<script src="{{url('dashboard')}}/assets/vendor/js/bootstrap.js"></script>
<script src="{{url('dashboard')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{url('dashboard')}}/assets/vendor/libs/node-waves/node-waves.js"></script>

<script src="{{url('dashboard')}}/assets/vendor/libs/hammer/hammer.js"></script>
<!-- <script src="{{url('dashboard')}}/assets/vendor/libs/i18n/i18n.js"></script> -->
<script src="{{url('dashboard')}}/assets/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="{{url('dashboard')}}/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{url('dashboard')}}/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="{{url('dashboard')}}/assets/vendor/libs/swiper/swiper.js"></script>
<script src="{{url('dashboard')}}/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

<!-- Main JS -->
<script src="{{url('dashboard')}}/assets/js/main.js"></script>
<script src="{{url('dashboard')}}/assets/vendor/libs/toastr/toastr.js"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "200",
        "hideDuration": "1000",
        "timeOut": "8000",
        "extendedTimeOut": "6000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
@stack('scripts')