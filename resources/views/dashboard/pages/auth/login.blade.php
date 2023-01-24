<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="{{url('dashboard')}}/assets/" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{__('login')}} | {{env('APP_NAME')}}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{url('/')}}/assets/images/favicon.ico" />
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
    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{url('dashboard')}}/assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="{{url('dashboard')}}/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{url('dashboard')}}/assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{url('dashboard')}}/assets/js/config.js"></script>
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Login -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-4 mt-2">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0" />
                                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0" />
                                    </svg>
                                </span>
                                <span class="app-brand-text demo text-body fw-bold my-1 ms-1">{{env('APP_NAME')}}</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <form id="formAuthentication" class="mb-3" action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">{{__('Email or Username')}}</label>
                                <input type="text" class="form-control" id="email" value="{{old('email')}}" name="email" placeholder="Enter your email or username" autofocus />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="multicol-password">{{__('password')}}</label>
                                    <a href="auth-forgot-password-basic.html">
                                        <small>{{__("Forgot Password?")}}</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input required name="password" type="password" id="multicol-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multicol-password2" />
                                    <span class="input-group-text cursor-pointer" id="multicol-password2"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" name="remember" {{(old('remember') != null)? 'checked':''}} type="checkbox" id="remember" />
                                    <label class="form-check-label" for="remember"> {{__('Remember Me')}} </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">{{__('Sign in')}}</button>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->

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
            "hideDuration": "6000",
            "timeOut": "8000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    <x-dashboard.ui.show-messages-as-toasts />
</body>

</html>