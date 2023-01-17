<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{url('dashboard')}}/assets/" data-template="vertical-menu-template">
@include("dashboard.layouts.head")

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include("dashboard.layouts.sidebar")
            <!-- Layout container -->
            <div class="layout-page">
                @include("dashboard.layouts.navbar")
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    <!-- / Content -->
                    @include("dashboard.layouts.footer")
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
        <!-- / Layout container -->
    </div>
    <!-- / Layout wrapper -->

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

</body>

</html>