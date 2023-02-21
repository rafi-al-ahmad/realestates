<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="advanced custom search, agency, agent, business, clean, corporate, directory, google maps, homes, idx agent, listing properties, membership packages, property, real broker, real estate, real estate agent, real estate agency, realtor">
    <meta name="description" content="{{env('APP_NAME')}} - Real Estate Platform">
    <meta name="CreativeLayers" content="ATFN">

    <title>@yield('title') - {{env('APP_NAME')}}</title>

    @include("frontpage.layouts.styles")
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-66Q2ENPCLZ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-66Q2ENPCLZ');
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="preloader"></div>
        @include("frontpage.layouts.navbar")
        @yield('content')
        @include("frontpage.layouts.footer")

    </div>
    @include("frontpage.layouts.scripts")

</body>

</html>
