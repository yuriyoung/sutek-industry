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
                        {{--<li><i class="fa fa-check-square-o"></i></li>--}}
                    </ul>
                </div>
                <div class="col-lg-6 object-non-visible animated fadeInLeftSmall">
                    <div class="slick-carousel content-slider-with-controls-autoplay">

                        <div class="overlay-container overlay-visible">
                            <img src="/images/company.jpg" alt="Sutek industry company building">
                            <div class="overlay-to-top hidden-sm-down">
                                <div class="text">
                                    <h3 class="title">Company building</h3>
                                </div>
                            </div>
                            <a href="/images/company.jpg" class="slick-carousel--popup-img overlay-link" title="Company building"><i class="fa fa-plus"></i></a>
                        </div>

                        <div class="overlay-container overlay-visible">
                            <img src="/images/sutek-image-10.jpg" alt="Drill bits production equipment">
                            <div class="overlay-to-top hidden-sm-down">
                                <div class="text">
                                    <h3 class="title">Drill bits production equipment</h3>
                                </div>
                            </div>
                            <a href="/images/sutek-image-10.jpg" class="slick-carousel--popup-img overlay-link" title="Drill bits production equipment"><i class="fa fa-plus"></i></a>
                        </div>

                        <div class="overlay-container overlay-visible">
                            <img src="/images/sutek-image-11.jpg" alt="Drill bits products">
                            <div class="overlay-to-top hidden-sm-down">
                                <div class="text">
                                    <h3 class="title">Drill bits products</h3>
                                </div>
                            </div>
                            <a href="/images/sutek-image-11.jpg" class="slick-carousel--popup-img overlay-link" title="Drill bits products"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>

            </div>{{-- /.row --}}
        </div>{{-- /.container --}}
    </section>

    <section class="padding-bottom-clear">
        <div class="container">
            <h3 class="title">Who <strong>We Are</strong></h3>
            <div class="separator-2 mb-20"></div>
            <div class="row">

                <div class="col-lg-6 object-non-visible animated object-visible fadeInDownSmall">
                    <div class="block clearfix">
                        <div class="overlay-container">
                            <img src="/images/sutek-image-2-1.jpg" alt="Who We Are">
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

    <section class="pv-20">
        <div class="container text-left">
            <h3 class="mt-4">Frequently <strong>Asked Question</strong></h3>
            <div class="separator-2"></div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="accordion" class="collapse-style-2 mb-4 object-non-visible" role="tablist" aria-multiselectable="true" data-animation-effect="fadeInUpSmall" data-effect-delay="700">

                        <div class="card">
                            <div class="card-header" role="tab" id="heading-0">
                                <h4 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-0" aria-expanded="true" aria-controls="collapse-0">
                                        <i class="fa fa-question-circle pr-10"></i>Who we are?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-0" class="collapse show" role="tabpanel" aria-labelledby="heading-0">
                                <div class="card-block">
                                    Shanghai Sutek Industries Co.,Ltd is a manufacturer of Hardware Tools, Aluminum profiles. All of our products are Chinese and German engineered and manufactured in The People's Republic of China.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="heading-1">
                                <h4 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-1" class="collapsed" aria-expanded="true" aria-controls="collapse-1">
                                        <i class="fa fa-question-circle pr-10"></i>Can I get technical help?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-1" class="collapse" role="tabpanel" aria-labelledby="heading-1">
                                <div class="card-block">
                                    Absolutely yes! Our cutting tool experts are available to answer any of your questions.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="heading-2">
                                <h4 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-2" class="collapsed" aria-expanded="true" aria-controls="collapse-2">
                                        <i class="fa fa-question-circle pr-10"></i>How Can I Get Your Best Price?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-2" class="collapse" role="tabpanel" aria-labelledby="heading-2">
                                <div class="card-block">
                                    Download our catalogue for more information, and send email directly to email <strong>{{ config('st_company_email', 'sutek@sutek-industry.com') }}</strong>.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="heading-2">
                                <h4 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-3" class="collapsed" aria-expanded="true" aria-controls="collapse-2">
                                        <i class="fa fa-question-circle pr-10"></i>Can I check stock online?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-3" class="collapse" role="tabpanel" aria-labelledby="heading-2">
                                <div class="card-block">
                                    Please check with our customer service online. You can follow our Skype or WeChat(see the site QR-Code).
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="heading-2">
                                <h4 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-4" class="collapsed" aria-expanded="true" aria-controls="collapse-2">
                                        <i class="fa fa-question-circle pr-10"></i>How can I become a distributor?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-4" class="collapse" role="tabpanel" aria-labelledby="heading-2">
                                <div class="card-block">
                                    Contact <strong>{{ config('app.email') }}</strong> and one of our sales representatives will assist you with the application process.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="heading-2">
                                <h4 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-5" class="collapsed" aria-expanded="true" aria-controls="collapse-2">
                                        <i class="fa fa-question-circle pr-10"></i>How do Back-Orders work?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-5" class="collapse" role="tabpanel" aria-labelledby="heading-2">
                                <div class="card-block">
                                    If the merchandise ordered is not in stock, it will be placed on back-order. The back-order is not to exceed a sixty (60) day period. Unless we have customer authorization to hold merchandise longer than 60 days, it will automatically be cancelled.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="heading-2">
                                <h4 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-6" class="collapsed" aria-expanded="true" aria-controls="collapse-2">
                                        <i class="fa fa-question-circle pr-10"></i>Damaged, Lost or Short Shipments?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-6" class="collapse" role="tabpanel" aria-labelledby="heading-2">
                                <div class="card-block">
                                    ou must notify your local carrier's office no later than five (5) days after receipt of the merchandise.
                                    Please advise us of the incidents, so that we can reship your merchandise and place a claim. Keep all goods and containers for inspection until advised to dispose.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection