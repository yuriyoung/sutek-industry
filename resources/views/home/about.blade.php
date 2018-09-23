@extends('home.template')
@section('title', 'About')

@section('content')
    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="{!! url('/') !!}">Home</a></li>
                <li class="breadcrumb-item active">About</li>
            </ol>
        </div>
    </div>

    <section class="main-container padding-bottom-clear">
        <div class="container">

            <h1 class="page-title">Company Profile</h1>
            <div class="separator-2"></div>
            <div class="row">

                <div class="col-lg-6 object-non-visible animated object-visible fadeInLeftSmall">
                    <p>
                        <strong>{!! config('st_company', 'Shanghai Sutek Industries Co.,Ltd') !!}</strong> is an export-oriented industry and trade integration company in field of hardware products. 25 years of export experience laid it's foundation in the industry of tools, be professional on services of well-known enterprises at home and abroad and be widely acclaimed. Based on the adaptable raising of domestic industry level, the quality level of our products( Drill Bits, Saw blades, Aluminum, Curtain wall glass)has been greatly improved, and now we are competing the companies on quality level with those who come from Taiwan, South Korean, so as to provide a practical support for domestic production enterprises and users, and gradually get rid of the dependence of imported tools.
                    </p>
                    <ul class="list-icons">
                        <li><i class="fa fa-check-square-o"></i> Unt in culpa qui deserunt</li>
                        <li><i class="fa fa-check-square-o"></i> Elegant Design</li>
                        <li><i class="fa fa-check-square-o"></i> Labore et dolore magna aliqua</li>
                        <li><i class="fa fa-check-square-o"></i> ipsam asperiores fugiat quo</li>
                    </ul>
                </div>
                <div class="col-lg-6 object-non-visible animated object-visible fadeInLeftSmall">
                    <div class="slick-carousel content-slider-with-controls">

                        <div class="overlay-container overlay-visible">
                            <img src="http://placehold.it/750x460/09f/fff" alt="">
                            <div class="overlay-bottom hidden-sm-down">
                                <div class="text">
                                    <h3 class="title">We Can Do It</h3>
                                </div>
                            </div>
                            <a href="http://placehold.it/750x460/09f/fff" class="slick-carousel--popup-img overlay-link" title="image title"><i class="fa fa-plus"></i></a>
                        </div>

                        <div class="overlay-container overlay-visible">
                            <img src="http://placehold.it/750x460/09f/fff" alt="">
                            <div class="overlay-bottom hidden-sm-down">
                                <div class="text">
                                    <h3 class="title">You Can Trust Us</h3>
                                </div>
                            </div>
                            <a href="http://placehold.it/750x460/09f/fff" class="slick-carousel--popup-img overlay-link" title="image title"><i class="fa fa-plus"></i></a>
                        </div>

                        <div class="overlay-container overlay-visible">
                            <img src="http://placehold.it/750x460/09f/fff" alt="">
                            <div class="overlay-bottom hidden-sm-down">
                                <div class="text">
                                    <h3 class="title">We Love What We Do</h3>
                                </div>
                            </div>
                            <a href="http://placehold.it/750x460/09f/fff" class="slick-carousel--popup-img overlay-link" title="image title"><i class="fa fa-plus"></i></a>
                        </div>

                    </div>
                </div>

            </div>{{-- /.row --}}
        </div>{{-- /.container --}}
    </section>

    <section>
        <div class="container">
            <h3 class="title">Who <strong>We Are</strong></h3>
            <div class="separator-2 mb-20"></div>
            <div class="row">

                <div class="col-lg-6 object-non-visible animated object-visible fadeInDownSmall">
                    <div class="block clearfix">
                        <div class="overlay-container">
                            <img src="/images/sutek-image-2.jpg" alt="">
                            <div class="overlay-to-top">
                                <p class="small margin-clear"><em>Sutek drill bits</em></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 object-non-visible animated object-visible fadeInDownSmall">
                    <p>
                        Make national first tool and set a tool's model. As a tool maker, Sutek are now continuously working and tailor made for the high-end customers and special customer! Once Sutek drill bits and milling cutter are listed, we get a favorable comment from the majority of users (plant, Arsenal and other production companies). The twist drill is as our traditional strong, then we will continuously enter the more professional market, because only when being professional, can we will win customers, only when the market can make us more professional.
                    </p>
                    <p>
                        Sutek will gradually open platform, to allow customers to do interactive communication for our listed products, only when there is a humanization interaction will we view problems of customer as is our problems! For the customer's special problem, we will provide a basket of services, so as to realize the transformation from traditional manufacturing to manufacturing services.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <div class="section">
        <div class="container">
            <h3 class="mt-4">Why <strong>Choose Us</strong></h3>
            <div class="separator-2"></div>
            <div class="row">
                <!-- accordion start -->
                <!-- ================ -->
                <div class="col-lg-6">
                    <div id="accordion" class="collapse-style-2" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa fa-rocket pr-10"></i>We Have Strong Background
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-block">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="true" aria-controls="collapseTwo">
                                        <i class="fa fa-leaf pr-10"></i>Unt loremcu doloriem sit lormeyci
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="card-block">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="true" aria-controls="collapseThree">
                                        <i class="fa fa-heart pr-10"></i>We Love What We Do
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="card-block">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- accordion end -->
                <!-- progress bars start -->
                <!-- ================ -->
                <div class="col-lg-6">
                    <div class="progress mt-20 style-1">
                        <span class="text"></span>
                        <div class="progress-bar progress-bar-default" data-animate-width="90%">
                            <span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000">CSS</span>
                        </div>
                    </div>
                    <div class="progress style-1">
                        <span class="text"></span>
                        <div class="progress-bar progress-bar-default" data-animate-width="95%">
                            <span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000">HTML5</span>
                        </div>
                    </div>
                    <div class="progress style-1">
                        <span class="text"></span>
                        <div class="progress-bar progress-bar-default" data-animate-width="80%">
                            <span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000">JQUERY</span>
                        </div>
                    </div>
                    <div class="progress style-1">
                        <span class="text"></span>
                        <div class="progress-bar progress-bar-default" data-animate-width="85%">
                            <span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000">PHP</span>
                        </div>
                    </div>
                    <div class="progress style-1">
                        <span class="text"></span>
                        <div class="progress-bar progress-bar-default" data-animate-width="75%">
                            <span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000">PHOTOSHOP</span>
                        </div>
                    </div>
                    <div class="progress style-1">
                        <span class="text"></span>
                        <div class="progress-bar progress-bar-default" data-animate-width="90%">
                            <span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000">DRUPAL</span>
                        </div>
                    </div>
                </div>
                <!-- progress bars end -->
            </div>
            <!-- clients start -->
            <!-- ================ -->
            <div class="separator"></div>
            <div class="clients-container">
                <div class="clients">
                    <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">
                        <a href="#"><img src="images/client-1.png" alt=""></a>
                    </div>
                    <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="200">
                        <a href="#"><img src="images/client-2.png" alt=""></a>
                    </div>
                    <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
                        <a href="#"><img src="images/client-3.png" alt=""></a>
                    </div>
                    <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="400">
                        <a href="#"><img src="images/client-4.png" alt=""></a>
                    </div>
                    <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="500">
                        <a href="#"><img src="images/client-5.png" alt=""></a>
                    </div>
                    <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="600">
                        <a href="#"><img src="images/client-6.png" alt=""></a>
                    </div>
                    <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="700">
                        <a href="#"><img src="images/client-7.png" alt=""></a>
                    </div>
                    <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="800">
                        <a href="#"><img src="images/client-8.png" alt=""></a>
                    </div>
                </div>
            </div>
            <!-- clients end -->
        </div>
    </div>
@endsection