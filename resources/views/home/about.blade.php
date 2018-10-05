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

    <section class="padding-bottom-clear mb-5">
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
@endsection