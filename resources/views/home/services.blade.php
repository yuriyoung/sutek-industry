@extends('home.template')
@section('title', 'Services')

@push('scripts')
    <script>
        function floating(ele){
            $(ele).animate({
                top:"-6px"
            }, 1000).animate({
                top:"+0px"
            }, 1000, function () {
                floating($(ele));
            });
        }
        $("#map-image").hover(function() {
                floating($('#poly-image'));
            }, function () {
                $('#poly-image').stop(true);
            }
        );
    </script>
@endpush

@section('content')
    <div class="banner">
        <div class="container poly-banner">
            <div class="breadcrumb-container">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="{!! url('/') !!}">Home</a></li>
                        <li class="breadcrumb-item active">Services</li>
                    </ol>
                </div>
            </div>
            <div class="container poly-container">
                <img id="poly-image" src="/images/services.png" usemap="#map-image" class="animated zoomIn">
                <map name="map-image" id="map-image">
                    <area shape="poly" coords="570,0, 30,280, 30,348, 570,630, 1135,348, 1135,280">
                </map>
            </div>
        </div>
    </div>

    <section class="main-container padding-bottom-clear">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="ph-20 feature-box text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="400">
                        <span class="icon large default-bg circle"><i class="fa fa-diamond"></i></span>
                        <h3>High Quality</h3>
                        <div class="separator clearfix"></div>
                        <p class="text-muted">The best Raw Materials of Made in China. The best machine we updated. Under the best quality system of Sutek.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-empty">

                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="ph-20 feature-box text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="400">
                        <span class="icon large default-bg circle"><i class="fa fa-dropbox"></i></span>
                        <h3>Free Packing</h3>
                        <div class="separator clearfix"></div>
                        <p class="text-muted">Free design packing for our customer based on their own market. Give you a choice from our manner of packing.</p>
                    </div>
                </div>
                <div class="clearfix visible-md"></div>
                <div class="col-lg-4 col-md-6">
                    <div class="ph-20 feature-box text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="600">
                        <span class="icon large default-bg circle"><i class="fa fa-balance-scale"></i></span>
                        <h3>Best Price</h3>
                        <div class="separator clearfix"></div>
                        <p class="text-muted">The best solution for standard products and tailor-made. Give you a sample quotation immediately.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="ph-20 feature-box text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="600">
                        <span class="icon large default-bg circle"><i class="fa fa-ship"></i></span>
                        <h3>Shipping</h3>
                        <div class="separator clearfix"></div>
                        <p class="text-muted">International transport agency business of export goods in whole container and assembled container from Shanghai Port.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="ph-20 feature-box text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="600">
                        <span class="icon large default-bg circle"><i class="fa fa-scissors"></i></span>
                        <h3>Tailor Made</h3>
                        <div class="separator clearfix"></div>
                        <p class="text-muted">Tailor made tools in special field. Custom specialist on aluminum. Give you a sample designing</p>
                    </div>
                </div>

            </div> {{-- /.row --}}
        </div>
    </section>

    <section class="pv-40 border-clear padding-bottom-clear">
        <div class="container">
            <div class="row">

                <h1 class="page-title text-center">Our Manufacturing Process</h1>

                <div class="image-box space-top style-4">
                    <div class="row grid-space-0">
                        <div class="col-lg-6">
                            <div class="overlay-container object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="400">
                                <img src="/images/sutek-image-3.jpg" alt="">
                                <div class="overlay-to-top">
                                    <p class="small margin-clear"><em>Sutek <br> carbonsteel material</em></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="body object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="400">
                                <div class="hidden-lg-down"></div>
                                <h3>Carbonsteel Material</h3>
                                <div class="separator-2"></div>
                                <p class="margin-clear">
                                    It is often used in power-saw blades and drill bits. It is superior to the older high-carbon steel tools used extensively through the 1940s in that it can withstand higher temperatures without losing its temper (hardness). This property allows HSS to cut faster than high carbon steel, hence the name high-speed steel. At room temperature, in their generally recommended heat treatment, HSS grades generally display high hardness (above Rockwell hardness 60) and abrasion resistance (generally linked to tungsten and vanadium content often used in HSS) compared with common carbon and tool steels.
                                </p>
                                <br/>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="image-box style-4">
                    <div class="row grid-space-0">
                        <div class="col-lg-6 order-lg-2">
                            <div class="overlay-container object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="500">
                                <img src="/images/sutek-image-4.jpg" alt="">
                                <div class="overlay-to-top">
                                    <p class="small margin-clear"><em>Sutek factory<br> pipeline for drill bits</em></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-1">
                            <div class="body text-right object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="500">
                                <div class="pv-10 hidden-lg-down"></div>
                                <h3>Factory Pipeline</h3>
                                <div class="separator-3"></div>
                                <ul class="list-icons">
                                    <li class="object-non-visible animated fadeInUp"><i class="fa fa-check"></i> 200 machines works as shift system.</li>
                                    <li class="object-non-visible animated fadeInUp"><i class="fa fa-check"></i> Independent Heat treatment centers.</li>
                                    <li class="object-non-visible animated fadeInUp"><i class="fa fa-check"></i> annual value of production from USD15,800,000 since 2012 to nowadays USD24,450,000.</li>
                                    <li class="object-non-visible animated fadeInUp"><i class="fa fa-check"></i> Made from tungsten steel and being hot-treated, the blade is characterized by high accuracy, smooth cutting operation, good resistance to shock and good toughness.</li>
                                    <li class="object-non-visible animated fadeInUp"><i class="fa fa-check"></i> The drilling efficiency is higher with the three teeth cutter head. In design with curve, the head is good at removing the debris and working efficiently. Sharp and durable.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="image-box style-4">
                    <div class="row grid-space-0">
                        <div class="col-lg-6">
                            <div class="overlay-container object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="600">
                                <img src="/images/sutek-image-5.jpg" alt="">
                                <div class="overlay-to-top">
                                    <p class="small margin-clear"><em>Sutek packing<br> drill bit sets</em></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="body object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="600">
                                <div class="pv-30 hidden-lg-down"></div>
                                <h3>Product Packing</h3>
                                <div class="separator-2"></div>
                                <p class="margin-clear">
                                    GB 40CR alloy Steel is a high quality Quenched and Tempered Alloy Structural steel, It belong to the high quality low carbon, Low alloy chromium, molybdenum, nickel case hardening steel. Oil Quenched & Tempered Hardness is 28-34 HRc. GB 40CR steel Annealing delivery hardenss less than 250HB.40CR wiith a lower carbon content range, So GB 40CR alloy steel have good weldability.
                                </p>
                                <br>
                                {{--<a href="#" class="btn btn-lg btn-default-transparent btn-sm btn-animated margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>--}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>{{-- /.row --}}
        </div>{{-- /.container --}}
    </section>

    <section class="pv-40">
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