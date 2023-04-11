<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="CreativeLayers" content="ATFN">

    @stack('seo')

    <title>@yield('title') | {{env('APP_NAME')}}</title>

    @include("frontpage.layouts.styles")
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-T87LFL4GQN"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-T87LFL4GQN');
    </script>

    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = 'da9b549793f518ad4c8cef0ce0dbb9809d51af7a';
        window.smartsupp || (function(d) {
            var s, c, o = smartsupp = function() {
                o._.push(arguments)
            };
            o._ = [];
            s = d.getElementsByTagName('script')[0];
            c = d.createElement('script');
            c.type = 'text/javascript';
            c.charset = 'utf-8';
            c.async = true;
            c.src = 'https://www.smartsuppchat.com/loader.js?';
            s.parentNode.insertBefore(c, s);
        })(document);
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
