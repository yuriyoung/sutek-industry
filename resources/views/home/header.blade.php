<div class="header-container">
    {{-- 头部信息栏 --}}
    <div class="header-top colored">
        <div class="container">
            <div class="row">

                <div class="col-2 col-md-4">
                    <div class="header-top-first clearfix">
                        <ul class="social-links animated-effect-1 circle small clearfix hidden-sm-down">
                            <li class="wechat"><a href="{!! config('st_social_wechat', '#') !!}"><i class="fa fa-wechat"></i></a></li>
                            <li class="qq"><a href="{!! config('st_social_qq', '#') !!}"><i class="fa fa-qq"></i></a></li>
                            <li class="weibo"><a href="{!! config('st_social_weibo', '#') !!}"><i class="fa fa-weibo"></i></a></li>
{{--                            <li class="skype"><a href="{!! config('st_social_skype', '#') !!}"><i class="fa fa-skype"></i></a></li>--}}
                            <li class="linkedin"><a href="{!! config('st_social_linkedin', '#') !!}"><i class="fa fa-linkedin"></i></a></li>
                            <li class="facebook"><a href="{!! config('st_social_facebook', '#') !!}"><i class="fa fa-facebook"></i></a></li>
                        </ul>
                        <div class="social-links hidden-md-up circle small">
                            <div class="btn-group dropdown">
                                <button id="header-top-drop-1" type="button" class="btn dropdown-toggle dropdown-toggle--no-caret"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-share-alt"></i></button>
                                <ul class="dropdown-menu dropdown-animation" aria-labelledby="header-top-drop-1">
                                    <li class="wechat"><a href="{!! config('st_social_wechat', '#') !!}"><i class="fa fa-wechat"></i></a></li>
                                    <li class="qq"><a href="{!! config('st_social_qq', '#') !!}"><i class="fa fa-qq"></i></a></li>
                                    <li class="weibo"><a href="{!! config('st_social_weibo', '#') !!}"><i class="fa fa-weibo"></i></a></li>
                                    {{--<li class="skype"><a href="{!! config('st_social_skype', '#') !!}"><i class="fa fa-skype"></i></a></li>--}}
                                    <li class="linkedin"><a href="{!! config('st_social_linkedin', '#') !!}"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="facebook"><a href="{!! config('st_social_facebook', '#') !!}"><i class="fa fa-facebook"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        {{-- 其他div --}}
                    </div>
                </div>

                <div class="col-10 col-md-8">
                    <div id="header-top-second"  class="clearfix text-right">
                        <ul class="list-inline">
                            {{--<li class="list-inline-item"><i class="fa fa-map-marker pr-1 pl-2"></i>{!! config('st_company_address') !!}</li>--}}
                            <li class="list-inline-item"><i class="fa fa-phone pr-1 pl-2"></i> {!! config('st_company_phone') !!}</li>
                            <li class="list-inline-item"><i class="fa fa-fax pr-1 pl-2"></i> {!! config('st_company_fax') !!}</li>
                            <li class="list-inline-item"><a href="mailto:{!! config('st_company_email', 'sutek@sutek-industry.com') !!}"><i class="fa fa-envelope-o pr-1 pl-2"></i> {!! config('st_company_email') !!}</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>{{-- /.header-top --}}

    {{-- 头部菜单导航栏 --}}
    <header class="header fixed fixed-desktop clearfix">
        <div class="container">
            <div class="row">

                {{-- Logo --}}
                <div class="col-md-auto hidden-md-down pl-2">
                    <div class="header-first clearfix">
                        <div id="logo" class="logo"><a href="{!! url('/') !!}"><img id="logo_img" src="/images/logo.png" alt="Sutek Industry"></a></div>
                    </div>
                    <div class="site-slogan">{!! config('st_company', 'Shanghai Sutek Industry Co.,Ldt') !!}</div>
                </div>

                {{-- 菜单导航栏 --}}
                <div class="col-lg-8 ml-lg-auto">
                    <div class="header-second clearfix">
                        <div class="main-navigation main-navigation--mega-menu animated">
                            <nav class="navbar navbar-expand-lg navbar-light p-0">
                                {{-- Mobile logo --}}
                                <div class="navbar-brand clearfix hidden-lg-up">
                                    <div id="logo-mobile" class="logo">
                                        <a href="{!! url('/') !!}"><img id="logo-img-mobile" src="/images/logo.png" alt="Sutek Industry"></a>
                                    </div>
                                    <div class="site-slogan">{!! config('st_company_name', 'Sutek-Industries') !!}</div>
                                </div>

                                {{-- menu navigation --}}
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-1" aria-controls="navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                    {{-- main-menu start --}}
                                    <ul class="navbar-nav ml-xl-auto">
                                        <li class="nav-item {!! isset($active)?$active['home']:'' !!}"><a href="{!! url('/') !!}" class="nav-link" aria-haspopup="false" aria-expanded="false">Home</a></li>
                                        <li class="nav-item {!! isset($active)?$active['services']:'' !!}"><a href="{!! url('services') !!}" class="nav-link" aria-haspopup="false" aria-expanded="false">Services</a></li>
                                        {{--<li class="nav-item {!! $active['news'] !!}"><a href="{!! url('news') !!}" class="nav-link" aria-haspopup="false" aria-expanded="false">News</a></li>--}}
                                        {{-- drop menu--}}
                                        {{--<li class="nav-item dropdown">--}}
                                            {{--<a href="#" class="nav-link dropdown-toggle" id="third-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>--}}
                                            {{--<ul class="dropdown-menu" aria-labelledby="third-dropdown">--}}
                                                {{--@if(isset($dropdownMenu))--}}
                                                    {{--{!! $dropdownMenu !!}--}}
                                                {{--@endif--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                        {{-- mega-menu--}}
                                        <li class="nav-item dropdown mega-menu mega-menu--wide {!! isset($active)?$active['products']:'' !!}">
                                            <a href="{!! url('products') !!}" class="nav-link dropdown-toggle" id="first-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
                                            <ul class="dropdown-menu" aria-labelledby="first-dropdown">
                                                <li>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-3 hidden-md-down">
                                                            <h4 class="title">Cutting Tool Solutions</h4>
                                                            <p class="mb-2">Manufacture of HSS, Taps, Cobalt, Powder, Metal &
                                                                Carbide Precision Tools.
                                                                EndMills, Drills, Cutters, Routers and Chamfer Mills.
                                                                Metal/Stone/Wood Working.</p>
                                                            <img src="/images/stuek-image-1.jpg" alt="Sutek image">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h4 class="title"><a href="{!! url('/categories') !!}">Categories</a></h4>
                                                            <div class="divider"></div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    {{--<h4 class="title"><a href="{!! url('/categories') !!}">Categories</a></h4>--}}
                                                                    {{--<div class="divider"></div>--}}
                                                                    <ul class="menu">
                                                                        @if(isset($hotCategories))
                                                                            @foreach($hotCategories as $category)
                                                                                <li ><a href="{!! url('products/category/'.$category->slug) !!}"><i class="fa fa-list-ul"></i>
                                                                                        {!! $category->name !!}<span class="badge text-info">{!! $category->products_count !!}</span>
                                                                                    </a></li>
                                                                                @if($loop->index >= 10)
                                                                                    {{--<li ><a href="{!! url('/categories') !!}"><i class="fa fa-angle-right"></i>More<i class="fa fa-long-arrow-right pl-1"></i></a></li>--}}
                                                                                    @break
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    {{--<h4 class="title"><a href="{!! url('/specifications') !!}">Specifications</a></h4>--}}
                                                                    {{--<div class="divider"></div>--}}
                                                                    <ul class="menu">
                                                                        @if(isset($hotCategories) && count($hotCategories)>10)
                                                                            @for($i = 11; $i < count($hotCategories); ++$i)
                                                                                <li ><a href="{!! url('products/category/'.$hotCategories[$i]->slug) !!}"><i class="fa fa-list-ul"></i>
                                                                                        {!! $hotCategories[$i]->name !!}<span class="badge text-info">{!! $hotCategories[$i]->products_count !!}</span>
                                                                                    </a></li>
                                                                                @if($i >= 21)
                                                                                    @break
                                                                                @endif
                                                                            @endfor
                                                                        @endif
                                                                    </ul>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul> {{-- /.dropdown-men--}}
                                        </li> {{-- end products /.mega-menu --}}
                                        <li class="nav-item {!! isset($active)?$active['downloads']:'' !!}"><a href="{!! url('downloads') !!}" class="nav-link" aria-haspopup="false" aria-expanded="false">Downloads</a></li>
                                        <li class="nav-item {!! isset($active)?$active['about']:'' !!}"><a href="{!! url('about') !!}" class="nav-link" aria-haspopup="false" aria-expanded="false">About</a></li>
                                    </ul>{{-- /.navbar-nav --}}
                                    {{-- main menu end --}}
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

                {{-- 导航栏最后的 Contact --}}
                <div class="col-auto hidden-md-down pl-0 pl-md-1">
                    <div class="header-dropdown-buttons">
                        <a href="{!! url('contact') !!}" class="btn btn-sm btn-default">Contact Us <i class="fa fa-envelope-o pl-1"></i></a>
                    </div>
                </div>

            </div>{{-- /.row --}}
        </div>{{-- /.container --}}
    </header>{{-- /.header --}}

</div>
