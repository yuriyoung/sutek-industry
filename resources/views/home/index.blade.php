@extends('home.template')
@section('title', 'Home')

@push('css')
    <link rel="stylesheet" href="{!! asset('/vendor/revolution/css/settings.css') !!}">
    <link rel="stylesheet" href="{!! asset('/vendor/revolution/css/layers.css') !!}">
    <link rel="stylesheet" href="{!! asset('/vendor/revolution/css/navigation.css') !!}">
@endpush

@push('scripts')
    {{-- 首页头部幻灯片（旋转木马） --}}
    <script src="{!! asset('/vendor/revolution/js/jquery.themepunch.tools.min.js') !!}"></script>
    <script src="{!! asset('/vendor/revolution/js/jquery.themepunch.revolution.min.js') !!}"></script>
@endpush

@section('content')
    <div class="banner clearfix">
        {{-- slideshow revolution start --}}
        <div class="slideshow">
            <div class="slider-revolution-5-container" style="background:#09afdf;" data-animation-effect="fadeInLeft" data-effect-delay="1000">
                <div id="slider-banner-fullwidth-big-height" class="slider-banner-fullwidth-big-height rev_slider" data-version="5.0">
                    <ul class="slides">
                        {{-- slider 1 --}}
                        @includeIf('home.widgets.slider-item-1', ['background' => '/images/sutek-caption-bg-1.jpg', 'title' => 'Slider 1'])
                        {{-- slider 2 --}}
                        @includeIf('home.widgets.slider-item-2', ['background' => '/images/sutek-caption-bg-2.jpg', 'title' => 'Slider 2'])
                        {{-- slider 3 --}}
                        {{--@includeIf('home.widgets.slider-item-3', ['background' => 'http://placehold.it/1920x650/'. mt_rand(0, 0xfff)])--}}
                        {{-- slider 4 --}}
{{--                        @includeIf('home.widgets.slider-item-4', ['background' => 'http://placehold.it/1920x650/'. mt_rand(0, 0xfff)])--}}
                        {{-- slider 5 --}}
                        @includeIf('home.widgets.slider-item-5', ['background' => '/images/sutek-caption-bg-3.jpg', 'title' => 'Slider 3'])
                    </ul>{{-- /.slides--}}
                    <div class="tp-bannertimer"></div>
                </div>
            </div>
        </div>{{-- /.slideshow --}}
    </div>

    <div id="page-start"></div>

    <section class="light-gray-bg pv-40 border-clear">
        <div class="container">
            <h1 class="page-title text-center">Our <strong>Services</strong></h1>
            <div class="separator"></div>
            <div class="row">

                <div class="col-md-4">
                    <div class="image-box style-2 mb-20 object-non-visible" data-animation-effect="fadeInDown" data-effect-delay="1000">
                        <div class="overlay-container overlay-visible">
                            <img src="http://placehold.it/750x460/'{!! mt_rand(0, 0xfff) !!}" alt="">
                            <a href="#" class="overlay-link"><i class="fa fa-link"></i></a>
                            <div class="overlay-bottom">
                                <div class="text">
                                    <p class="lead margin-clear text-left mobile-visible">Service One</p>
                                </div>
                            </div>
                        </div>
                        <div class="body padding-horizontal-clear">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque ipsam nihil, adipisci rem minus? Voluptatem distinctio laborum porro aspernatur.</p>
                            <a class="link-dark" href="{!! url('services') !!}">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="image-box style-2 mb-20 object-non-visible" data-animation-effect="fadeInDown" data-effect-delay="1000">
                        <div class="overlay-container overlay-visible">
                            <img src="http://placehold.it/750x460/'{!! mt_rand(0, 0xfff) !!}" alt="">
                            <a href="#" class="overlay-link"><i class="fa fa-link"></i></a>
                            <div class="overlay-bottom">
                                <div class="text">
                                    <p class="lead margin-clear text-left mobile-visible">Service Tow</p>
                                </div>
                            </div>
                        </div>
                        <div class="body padding-horizontal-clear">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque ipsam nihil, adipisci rem minus? Voluptatem distinctio laborum porro aspernatur.</p>
                            <a class="link-dark" href="{!! url('services') !!}">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="image-box style-2 mb-20 object-non-visible" data-animation-effect="fadeInDown" data-effect-delay="1000">
                        <div class="overlay-container overlay-visible">
                            <img src="http://placehold.it/750x460/'{!! mt_rand(0, 0xfff) !!}" alt="">
                            <a href="#" class="overlay-link"><i class="fa fa-link"></i></a>
                            <div class="overlay-bottom">
                                <div class="text">
                                    <p class="lead margin-clear text-left mobile-visible">Service Three</p>
                                </div>
                            </div>
                        </div>
                        <div class="body padding-horizontal-clear">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque ipsam nihil, adipisci rem minus? Voluptatem distinctio laborum porro aspernatur.</p>
                            <a class="link-dark" href="{!! url('services') !!}">Read More</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="light-gray-bg pv-20 border-clear">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2 class="text-center mt-4">We Provide Multiple Standards & Specifications</h2>
                    <div class="separator"></div>
                    <div class="row mt-20">
                        <div class="col-lg-6">
                            <div class="feature-box-2 right object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="2000">
                                <span class="icon">
                                    <img src="/images/icons/standard/ISO.png" class="icon">
                                </span>
                                <div class="body">
                                    <h4 class="title">International Standardization Organization</h4>
                                    <p>Multiple standards and specifications see our products.</p>
                                    <br/>
                                    <div class="separator-3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feature-box-2 object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="1000">
                                <span class="icon"><img src="/images/icons/flute/7cutter.png" class="icon"></span>
                                <div class="body">
                                    <h4 class="title">Number of flutes cutters</h4>
                                    <p>2/3/4/5/6/7/8 Flute cutter ballnose, 2/3/4/5/6/7/8 Flute square end.</p>
                                    <br/>
                                    <div class="separator-2"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="feature-box-2 right object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="2000">
                                <span class="icon"><img src="/images/icons/angle/118de.png" class="icon"></span>
                                <div class="body">
                                    <h4 class="title">Responsive Design</h4>
                                    <p>30/45/55/118/135° Point Geometry.</p>
                                    <br/>
                                    <div class="separator-3"></div>
                                </div>
                            </div>
                            <div class="feature-box-2 right object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="2000">
                                <span class="icon"><img src="/images/icons/angle/SR.png" class="icon"></span>
                                <div class="body">
                                    <h4 class="title">Labore et dolore magna aliqua</h4>
                                    <p>Our design is with responsive in mind. Our themes are compatible with various desktop, tablet, and mobile devices.</p>
                                    <div class="separator-3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feature-box-2 object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="1000">
                                <span class="icon"><img src="/images/icons/surface/Amber.png" class="icon"></span>
                                <div class="body">
                                    <h4 class="title">Amber Surfaces</h4>
                                    <p>Perfect plating Amber surface treatment for enhancing hardness and wear resistance, the hardness increased by about 10 times at most.</p>
                                    <div class="separator-2"></div>
                                </div>
                            </div>
                            <div class="feature-box-2 object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="1000">
                                <span class="icon"><img src="/images/icons/surface/TiALN.png" class="icon"></span>
                                <div class="body">
                                    <h4 class="title">TiALN Surfaces</h4>
                                    <p>Perfect plating TiALN surface treatment for enhancing hardness and wear resistance, the hardness increased by about 15 times at most.</p>
                                    <div class="separator-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="section light-gray-bg pv-20 border-clear">
        <div class="container">
            <div class="row">
                <div class="main col-lg-12">
                    <h2 class="text-center mt-4">Latest Drill bits</h2>
                    <div class="separator"></div>
                    <div class="slick-carousel carousel-autoplay object-non-visible" data-animation-effect="fadeInUp" data-effect-delay="1000">
                        @if(isset($latestProducts))
                            @foreach($latestProducts as $product)
                                <div class="overlay-container">
                                    <img src="{!! $product->media_path . (count($product->thumbs) > 0 ? $product->thumbs[0] : '/images/image-not-found_thumb.png'); !!}" alt="">
                                    <div class="overlay-top">
                                        <div class="text">
                                            <small>{!! $product->title !!}</small>
                                        </div>
                                    </div>
                                    <div class="overlay-bottom">
                                        <div class="links">
                                            <a href="{!! $product->url !!}" class="btn-sm-link" tabindex="-1">View Details<i class="pl-1 fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div> {{--slick-carousel--}}

                </div> {{--/.main--}}
            </div>
        </div>
    </section>

    <section class="section default-bg clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="call-to-action text-center">
                        <div class="row">
                            <div class="col-md-8">
                                <h3 class="title">Download our product catalogue for more information </h3>
                                <div class="separator"></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem quasi explicabo consequatur consectetur, a atque voluptate officiis eligendi nostrum.</p>
                            </div>
                            <div class="col-md-4">
                                <br>
                                <p><a href="#" class="btn btn-lg btn-gray-transparent btn-animated">Download Now<i class="fa fa-arrow-right pl-20"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
