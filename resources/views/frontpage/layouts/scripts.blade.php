<!-- Wrapper End -->
<script type="text/javascript" src="{{url('frontpage')}}/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="{{url('frontpage')}}/js/jquery-migrate-3.0.0.min.js"></script>
<script type="text/javascript" src="{{url('frontpage')}}/js/popper.min.js"></script>
<script type="text/javascript" src="{{url('frontpage')}}/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('frontpage')}}/js/jquery.mmenu.all.js"></script>
<script type="text/javascript" src="{{url('frontpage')}}/js/ace-responsive-menu.js"></script>
<script type="text/javascript" src="{{url('frontpage')}}/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="{{url('frontpage')}}/js/isotop.js"></script>
<script type="text/javascript" src="{{url('frontpage')}}/js/snackbar.min.js"></script>
<script type="text/javascript" src="{{url('frontpage')}}/js/simplebar.js"></script>
<script type="text/javascript" src="{{url('frontpage')}}/js/parallax.js"></script>
<script type="text/javascript" src="{{url('frontpage')}}/js/scrollto.js"></script>
<script type="text/javascript" src="{{url('frontpage')}}/js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="{{url('frontpage')}}/js/jquery.counterup.js"></script>
<script type="text/javascript" src="{{url('frontpage')}}/js/wow.min.js"></script>
<script type="text/javascript" src="{{url('frontpage')}}/js/slider.js"></script>
<!-- <script type="text/javascript" src="{{url('frontpage')}}/js/pricing-slider.js"></script> -->
<script type="text/javascript" src="{{url('frontpage')}}/js/timepicker.js"></script>
<!-- Custom script for all pages -->
<script type="text/javascript" src="{{url('frontpage')}}/js/script.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script> -->
<script src="{{url('dashboard')}}/assets/vendor/libs/toastr/toastr.js"></script>
<x-dashboard.ui.show-messages-as-toasts />

<script>
    $(function() {
        $('.lazy').lazy();
    });

    $('.city-slider').owlCarousel({
        loop:false,
            margin:30,
            dots:false,
            center:true,
            rewind:true,
            nav:true,
            rtl:false,
            autoplayHoverPause:false,
            autoplay: true,
            singleItem: true,
            smartSpeed: 1200,
            navText: [
              '<i class="flaticon-left-arrow"></i>',
              '<i class="flaticon-right-arrow"></i>'
            ],
            responsive: {
                0: {
                    items: 1,
                    center: false
                },
                480:{
                    items:1,
                    center: false
                },
                520:{
                    items:2,
                    center: false
                },
                600: {
                    items: 2,
                    center: false
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                },
                1366: {
                    items: 4
                },
                1400: {
                    items: 4
                }
            }
        })
</script>
@stack('scripts')
