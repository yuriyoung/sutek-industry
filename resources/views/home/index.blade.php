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
            <div class="slider-revolution-5-container" style="background:#09afdf;">
                <div id="slider-banner-fullwidth-big-height" class="slider-banner-fullwidth-big-height rev_slider" data-version="5.0">
                    <ul class="slides">
                        {{-- slider 1 --}}
                        @includeIf('home.widgets.slider-item-1', ['background' => '/images/sutek-caption-bg-1.jpg', 'title' => 'Slider 1'])
                        {{-- slider 2 --}}
                        @includeIf('home.widgets.slider-item-2', ['background' => '/images/sutek-caption-bg-2.jpg', 'title' => 'Slider 2'])
                        {{-- slider 3 --}}
                        {{--@includeIf('home.widgets.slider-item-3', ['background' => 'http://placehold.it/1920x650/'. mt_rand(0, 0xfff)])--}}
                        {{-- slider 4 --}}
                        {{--@includeIf('home.widgets.slider-item-4', ['background' => 'http://placehold.it/1920x650/'. mt_rand(0, 0xfff)])--}}
                        {{-- slider 5 --}}
                        @includeIf('home.widgets.slider-item-5', ['background' => '/images/sutek-caption-bg-3.jpg', 'title' => 'Slider 3'])
                    </ul>{{-- /.slides--}}
                    <div class="tp-bannertimer"></div>
                </div>
            </div>
        </div>{{-- /.slideshow --}}
    </div>

    <div id="page-start"></div>

    <section class="light-gray-bg pv-40 clearfix">
        <div class="container">
            <div class="row justify-content-lg-center">
                <div class="col-lg-8">
                    <h2 class="text-center">Our <strong>Features</strong></h2>
                    <div class="separator"></div>
                    <p class="large text-center"></p>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-4 col-sm-12">
                    <div class="image-box mb-20 bordered shadow-2 object-non-visible" data-animation-effect="fadeInUp" data-effect-delay="400">
                        <div class="overlay-container overlay-visible">
                            <img src="/images/Drill-bits-for-Stone.jpg" class="img-responsive" alt="Drill bits for Stone&Metal&Wood">
                            <a href="{!! url('services') !!}" class="overlay-link"><i class="fa fa-link"></i></a>
                            <div class="overlay-to-top">
                                <div class="text">
                                    <p class="margin-clear text-left mobile-visible">Drill bits for Stone/Metal/Wood</p>
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-20 text-center">Drill bits for Stone/Metal/Wood</h4>
                        <div class="separator clearfix"></div>
                        <div class="body padding-horizontal-clear object-non-visible " data-animation-effect="fadeInUpSmall">
                            <p>
                                Hammer Drill Bits; Concrete Core Drill Bits; Masonry Drill Bits; Glass & Hard Tile Drill Bits
                                SDS-plus Hammer Drill Bits with Professional ...
                            </p>
                            <a class="btn btn-default btn-sm margin-clear btn-animated" href="{!! url('services') !!}">Read More <i class="pl-1 fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12">
                    <div class="image-box style-2 mb-20 bordered shadow-2 object-non-visible " data-animation-effect="fadeInUp" data-effect-delay="400">
                        <div class="overlay-container overlay-visible">
                            <img src="/images/sutek-image-12.jpg"class="img-responsive"  alt="Sutek Industries Manufacture-Packaging-Delivery">
                            <a href="{!! url('services') !!}" class="overlay-link"><i class="fa fa-link"></i></a>
                            <div class="overlay-to-top">
                                <div class="text">
                                    <p class="margin-clear text-left mobile-visible">Manufacture & Packaging & Delivery</p>
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-20 text-center">Manufacture & Packaging & Delivery</h4>
                        <div class="separator clearfix"></div>
                        <div class="body padding-horizontal-clear object-non-visible " data-animation-effect="fadeInUpSmall">
                            <p>
                                As a export-oriented drill bit enterprise, we are always firmly to control every packing details for good delivery ...
                            </p>
                            <a class="btn btn-default btn-sm margin-clear btn-animated" href="{!! url('services') !!}">Read More <i class="pl-1 fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12">
                    <div class="image-box style-2 mb-20 bordered shadow-2 object-non-visible " data-animation-effect="fadeInUp" data-effect-delay="400">
                        <div class="overlay-container overlay-visible">
                            <img src="/images/sutek-image-13.jpg" class="img-responsive" alt="Drill bits for Wood">
                            <a href="{!! url('services') !!}" class="overlay-link"><i class="fa fa-link"></i></a>
                            <div class="overlay-to-top">
                                <div class="text">
                                    <p class="margin-clear text-left mobile-visible">Quality inspection & Technical indicator</p>
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-20 text-center">Quality inspection & Technical indicator</h4>
                        <div class="separator clearfix"></div>
                        <div class="body padding-horizontal-clear object-non-visible " data-animation-effect="fadeInUpSmall">
                            <p>
                                Quality inspection is a must before delivery based on Sutek Quality Control Documents or Customer Request Documents...
                            </p>
                            <a class="btn btn-default btn-sm margin-clear btn-animated" href="{!! url('services') !!}">Read More <i class="pl-1 fa fa-angle-double-right"></i></a>
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
                    <h2 class="text-center mt-4">Latest <strong>Drill bits</strong></h2>
                    <div class="separator"></div>
                    <div class="slick-carousel carousel-autoplay object-non-visible " data-animation-effect="fadeInUp">
                        @if(isset($latestProducts))
                            @foreach($latestProducts as $product)
                                <div class="overlay-container">
                                    <img src="{!! $product->media_path . (count($product->thumbs) > 0 ? $product->thumbs[0] : '/images/image-not-found_thumb.png'); !!}"
                                         alt="">
                                    <div class="overlay-top">
                                        <div class="text">
                                            <small>{!! $product->title !!}</small>
                                        </div>
                                    </div>
                                    <div class="overlay-bottom">
                                        <div class="links">
                                            <a href="{!! $product->url !!}" class="btn btn-gray-transparent btn-animated btn-sm" tabindex="-1">View
                                                Details<i class="pl-1 fa fa-long-arrow-right"></i></a>
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
                    <div class="call-to-action text-center object-non-visible " data-animation-effect="fadeInRight">
                        <div class="row">
                            <div class="col-md-8">
                                <h2 class="title">our product catalogue pdf document</h2>
                                <div class="separator"></div>
                                <p>Download our product catalogue for more information. go to downloads page now.</p>
                            </div>
                            <div class="col-md-4">
                                <br>
                                <p><a href="{!! url('downloads') !!}"
                                      class="btn btn-lg btn-gray-transparent btn-animated">Download Now<i
                                                class="fa fa-arrow-right pl-20"></i></a></p>
                            </div>
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

                    <h2 class="text-center mt-4">We Provide Multiple <strong>Standards</strong> & <strong>Specifications</strong></h2>
                    <div class="separator"></div>
                    <div class="row mt-20">
                        <div class="col-lg-6">
                            <div class="feature-box-2 right object-non-visible " data-animation-effect="fadeInDown" data-effect-delay="400">
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
                            <div class="feature-box-2 object-non-visible " data-animation-effect="fadeInDown" data-effect-delay="400">
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
                            <div class="feature-box-2 right object-non-visible " data-animation-effect="fadeInDown" data-effect-delay="400">
                                <span class="icon"><img src="/images/icons/angle/118de.png" class="icon"></span>
                                <div class="body">
                                    <h4 class="title">Responsive Design</h4>
                                    <p>30/45/55/118/135° Point Geometry.</p>
                                    <br/>
                                    <div class="separator-3"></div>
                                </div>
                            </div>
                            <div class="feature-box-2 right object-non-visible " data-animation-effect="fadeInDown" data-effect-delay="400">
                                <span class="icon"><img src="/images/icons/angle/SR.png" class="icon"></span>
                                <div class="body">
                                    <h4 class="title">Labore et dolore magna aliqua</h4>
                                    <p>Our design is with responsive in mind. Our themes are compatible with various
                                        desktop, tablet, and mobile devices.</p>
                                    <div class="separator-3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feature-box-2 object-non-visible " data-animation-effect="fadeInDown" data-effect-delay="400">
                                <span class="icon"><img src="/images/icons/surface/Amber.png" class="icon"></span>
                                <div class="body">
                                    <h4 class="title">Amber Surfaces</h4>
                                    <p>Perfect plating Amber surface treatment for enhancing hardness and wear
                                        resistance, the hardness increased by about 10 times at most.</p>
                                    <div class="separator-2"></div>
                                </div>
                            </div>
                            <div class="feature-box-2 object-non-visible " data-animation-effect="fadeInDown" data-effect-delay="400">
                                <span class="icon"><img src="/images/icons/surface/TiALN.png" class="icon"></span>
                                <div class="body">
                                    <h4 class="title">TiALN Surfaces</h4>
                                    <p>Perfect plating TiALN surface treatment for enhancing hardness and wear
                                        resistance, the hardness increased by about 15 times at most.</p>
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
                <div class="col-md-12">
                    <h2 class="text-center mt-4">Quality Inspection</h2>
                    <div class="separator"></div>
                    <div class="row splitter">
                        <div class="col-md-4 col-lg-4 left">
                            <ul class="list-icons object-non-visible " data-animation-effect="fadeInLeft" data-effect-delay="400">
                                <li class="icon"><i class="fa fa-eye"></i></li>
                                <li><h3>Visible Test</h3></li>
                                <li><p>Visual by eye or loupe, marking must be clear readable.</p></li>
                                <li><p>Control colour of surface.</p></li>
                                <li><p>Control if surface is free of scratches and burrs.</p></li>
                            </ul>
                            <ul class="list-icons object-non-visible " data-animation-effect="fadeInLeft" data-effect-delay="400">
                                <li class="icon"><i class="fa fa-diamond"></i></li>
                                <li><h3 class="nocaps">Hardness Test</h3></li>
                                <li><p>Contrary to popular a belief, Lorem Ipsum is not simply It has literature
                                        Richard.</p></li>
                                <li><p>Min ½ part of the flute must have a minimum hardness of HRC55, working parts
                                        should have to be based on the standard of each materials.</p></li>
                                <li><p>Take care that measuring point is in the middle of flute diameter (centrical
                                        position on the flute).</p></li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-lg-4 center">
                            <img src="/images/sutek-image-8.png" data-animation-effect="zoomIn" data-effect-delay="400">
                        </div>

                        <div class="col-md-4 col-lg-4 right">
                            <ul class="list-icons object-non-visible " data-animation-effect="fadeInRight" data-effect-delay="400">
                                <li class="icon"><i class="fa fa-cube"></i></li>
                                <li><h3 class="nocaps">Specification Control</h3></li>
                                <li><p>Measure the diameter at the furthest part of the major cutting edge.</p></li>
                                <li><p>Measure the thickness of the core of the drills.</p></li>
                                <li><p>measure the diameter of the reduced shaft.</p></li>
                            </ul>
                            <ul class="list-icons object-non-visible " data-animation-effect="fadeInRight" data-effect-delay="400">
                                <li class="icon"><i class="fa fa-flask"></i></li>
                                <li><h3>Chemical Element Test</h3></li>
                                <li><p>Measure the chemical elements on the flute or on the shank.</p></li>
                                <li><p>At least use spectrograph to test on both of tip and shank part.</p></li>
                                <li><p>Make sure before test, it can be grinded till be flat to have the available
                                        scanning area.</p></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
