<!DOCTYPE html>
<html dir="ltr" lang="en"> {{-- ==================dir="ltr" important for slider carouusel(see common.js)================ --}}
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <noscript>
        <META http-equiv="refresh" content="0;URL=js-error.html">
    </noscript>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/favicon.ico">

    <title>@yield('title') - {!! config('st_company_name', 'Sutek-Indsutry') !!}</title>

    <script src="{!! asset('/vendor/pace/pace.min.js') !!}"></script>

    {{-- web fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">

    {{-- vendor css --}}
    {{--<link rel="stylesheet" href="{!! asset('/css/material.min.css') !!}">--}}
    <link rel="stylesheet" href="{!! asset('/vendor/bootstrap/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('/vendor/font-awesome/css/font-awesome.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('/vendor/magnific-popup/magnific-popup.css') !!}">
    <link rel="stylesheet" href="{!! asset('/vendor/slick/slick.css') !!}">

    {{-- common css --}}
    <link rel="stylesheet" href="{!! asset('/css/animations.css') !!}">
    <link rel="stylesheet" href="{!! asset('/css/typography.css') !!}">
    <link rel="stylesheet" href="{!! asset('/css/common.css?v=') . uniqid('0.1') !!}">
    <link rel="stylesheet" href="{!! asset('/css/skins/light_blue.css?v=') . uniqid('0.1') !!}">

    {{-- push other js from view --}}
    @stack('css')

    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/json2/20140204/json2.min.js"></script>
    <![endif]-->

</head>

<body class="front-page">

    {{--<div class="preloader">--}}
        {{--<div class="status"></div>--}}
    {{--</div>--}}

    {{-- scrollToTop --}}
    <div class="scrollToTop circle"><i class="fa fa-angle-up"></i></div>

    {{-- 页面开始 --}}
    <div class="page-wrapper">
            @include('home.header')

            @yield('content')

            @include('home.footer')
    </div>

    {{-- jquery/bootstrap --}}
    <script src="{!! asset('/js/jquery.min.js') !!}"></script>
    <script src="{!! asset('/js/popper.min.js') !!}"></script>
    <script src="{!! asset('/js/jquery.rotate.min.js') !!}"></script>
    <script src="{!! asset('/vendor/bootstrap/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('/vendor/slick/slick.min.js') !!}"></script>

    {{-- 响应式弹出框 --}}
    <script src="{!! asset('/vendor/magnific-popup/jquery.magnific-popup.min.js') !!}"></script>
    {{-- 滚动侦听 --}}
    <script src="{!! asset('/vendor/waypoints/jquery.waypoints.min.js') !!}"></script>
    <script src="{!! asset('/vendor/waypoints/sticky.min.js') !!}"></script>
    {{-- 计数插件 --}}
    {{--<script src="/vendor/countTo/jquery.countTo.js"></script>--}}
    {{-- 瀑布流布局 --}}
    {{--<script src="{!! asset('/vendor/isotope/imagesloaded.pkgd.min.js') !!}"></script>--}}
    {{--<script src="{!! asset('/vendor/isotope/isotope.pkgd.min.js') !!}"></script>--}}

    {{-- push other js from view --}}
    @stack('scripts')

    {{-- custom/initialization plugins --}}
    <script src="{!! asset('/js/common.js') !!}"></script>

    <script>
        $('img, a').on('dragstart',function (e) {
            e.preventDefault()
        });

        $('.mega-menu').on('click', function (e) {
            if( window.location.href === '{{ url('products') }}')
                return ;

            window.location = '/products';
        });
    </script>
</body>

</html>