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
    <div class="banner ph-20">
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
                <img id="poly-image" src="/images/services.png" usemap="#map-image" class="delay-800ms animated zoomIn">
                <map name="map-image" id="map-image">
                    <area shape="poly" coords="570,0, 30,280, 30,348, 570,630, 1135,348, 1135,280">
                </map>
            </div>
        </div>
    </div>

    <section class="pv-60 padding-bottom-clear clearfix">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="pv-20 ph-20 feature-box-2 light-gray-bg boxed shadow object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="100">
                        <span class="icon without-bg"><i class="fa fa-diamond text-default"></i></span>
                        <div class="body">
                            <h4 class="title text-default">High Quality</h4>
                            <div class="separator-2 clearfix"></div>
                            <p>The best Raw Materials of Made in China. The best machine we updated. Under the best quality system of Sutek Industries.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-empty">
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="pv-20 ph-20 feature-box-2 light-gray-bg boxed shadow object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="100">
                        <span class="icon without-bg"><i class="fa fa-ship text-default"></i></span>
                        <div class="body">
                            <h4 class="title text-default">Shipping</h4>
                            <div class="separator-2 clearfix"></div>
                            <p class="text-muted">International transport agency business of export goods in whole container and assembled container from Shanghai Port.</p>
                        </div>
                    </div>
                </div>

                <div class="clearfix visible-md"></div>

                <div class="col-lg-4 col-md-6">
                    <div class="pv-20 ph-20 feature-box-2 light-gray-bg boxed shadow object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="100">
                        <span class="icon without-bg"><i class="fa fa-balance-scale text-default"></i></span>
                        <div class="body">
                            <h4 class="title text-default">Best Price</h4>
                            <div class="separator-2 clearfix"></div>
                            <p class="text-muted">The best solution for standard products and tailor-made. Give you a sample quotation immediately.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pv-20 ph-20 feature-box-2 light-gray-bg boxed shadow object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="100">
                        <span class="icon without-bg"><i class="fa fa-scissors text-default"></i></span>
                        <div class="body">
                            <h4 class="title text-default">Tailor Made</h4>
                            <div class="separator-2 clearfix"></div>
                            <p class="text-muted">Tailor made tools in special field. Custom specialist on aluminum. Give you a sample designing.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pv-20 ph-20 feature-box-2 light-gray-bg boxed shadow object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="100">
                        <span class="icon without-bg"><i class="fa fa-dropbox text-default"></i></span>
                        <div class="body">
                            <h4 class="title text-default">Free Packing</h4>
                            <div class="separator-2 clearfix"></div>
                            <p class="text-muted">Free design packing for our customer based on their own market. Give you a choice from our manner of packing.</p>
                        </div>
                    </div>
                </div>

            </div> {{-- /.row --}}
        </div>
    </section>

    <section class="pv-40 border-clear padding-bottom-clear mb-5">
        <div class="container">
            <div class="row justify-content-lg-center">

                {{--<h1 class="page-title text-center">Our Manufacturing Process</h1>--}}
                <h2 class="mt-4 text-center">Drill bits applications <sup class="text-default">scotic</sup></h2>
                <div class="separator with-icon mt-3"><img class="img-responsive" src="/images/icons/flute/3cutter.png"></div>

                <div class="image-box style-4 dark-bg">
                    <div class="row grid-space-0">
                        <div class="col-lg-6">
                            <div class="overlay-container object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="400">
                                <img src="/images/Drill-bits-for-Stone.jpg" alt="Drill Bits For Stone">
                                <div class="overlay-to-top">
                                    <p class="small margin-clear"><em><strong>Sutek Industry</strong><br>Drill Bits For Stone</em></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="body object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="400">
                                <div class="pv-20 hidden-lg-down"></div>
                                <h3>Drill Bits For Stone</h3>
                                <div class="separator-2"></div>
                                <p class="margin-clear">
                                    Products Range: Hammer Drill Bits; Concrete Core Drill Bits; Masonry Drill Bits; Glass & Hard Tile Drill Bits
                                    SDS-plus Hammer Drill Bits with Professional qualities under DIN/ANSI standard
                                    SDS-plus or max are available.
                                    SDS-plus Hammer Drill Bit are made for professional quality only to drill various concrete, bricks, masonry materials, etc.
                                    Super quality carbide is taken for most durable drilling performance. Auto-copper soldering is under German tech. guaranteeing the best advantages in drilling.
                                    Automatic-copper-soldering guarantees best welding strength and copper wrapping carbide for prolonged drilling life. Over 1200 centidegree soldering temperature guarantee the drill bit fitting different working environments
                                </p>
                                <br/>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="image-box style-4 dark-bg">
                    <div class="row grid-space-0">
                        <div class="col-lg-6 order-lg-2">
                            <div class="overlay-container object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="500">
                                <img src="/images/Drill-bits-for-Metal.jpg" alt="Drill Bits For Metal">
                                <div class="overlay-to-top">
                                    <p class="small margin-clear"><em><strong>Sutek Industry</strong><br>Drill Bits For Metal</em></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-1">
                            <div class="body text-left object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="500">
                                <div class="hidden-lg-down"></div>
                                <h3 class="text-right">Drill Bits For Metal</h3>
                                <div class="separator-3"></div>
                                <p class="margin-clear">
                                    Manufactured from M42/M35/M2/W3 steel, with molybdenum and cobalt added to creates a hardened alloy, measuring Rockwell hardness up to 67 with 5% Cobalt, for much faster cutting and extra longer life span, with up to twelve times when compared with an average HSS drill bit.
                                    No center punch is needed—the 135° Quick-Cut points are self-centering and penetrate quickly with less pressure. Will not "walk" or "wander"
                                    Extremely heat resistant; must be used and operated at 1500 RPM or greater for maximum efficiency. Straight shank allows for firmly holding and accurate centering, fit for standard drill chucks and regular round collet chucks
                                    Manufactured with all kinds of drill bit for metal, such as HSS Twist Drill, HSS Center Drill Bit, HSS Step Drill Bits, Reduced Shank Drill Bit, Taper Shank Drill Bits, and etc.
                                    Made into HSS Twist Drill Bits; HSS Step Drill Bit; Taper Shank Drill Bits; Reduced Shank Drill Bits; Bi-metal Hole Saw
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="image-box style-4 dark-bg">
                    <div class="row grid-space-0">
                        <div class="col-lg-6">
                            <div class="overlay-container object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="400">
                                <img src="/images/Drill-bits-for-Wood.jpg" alt="Drill BitS For Wood">
                                <div class="overlay-to-top">
                                    <p class="small margin-clear"><em><strong>Sutek Industry</strong><br>Drill BitS For Wood</em></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="body object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="400">
                                <div class="pv-30 hidden-lg-down"></div>
                                <h3>Drill BitS For Wood</h3>
                                <div class="separator-2"></div>
                                <p class="margin-clear">
                                    Manufacture from Flat wood drill bit to Brad Point Wood Drill Bits; Wood Auger Bits; Extension for Spade Drills; Wood Forstener Bit; Wood Router Bits; HSS Saw Drills; Plug Cutter; Hollow Mortising Chisel Bit; Self feed wood working bit.
                                    Spade bits use double-cutting spurs that scribe the outside of the hole, reducing breakout
                                    Flat drill bit design features a large shank for added durability
                                    Blue-Groove point and cutting edge for faster chip removal - 4x faster than standard spade bits
                                </p>
                                <br/>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="mt-4 pt-5 text-center">Exportation standards <sup class="text-default">scotic</sup></h2>
                <div class="separator with-icon mt-3"><img class="large-width" src="/images/brand-scotic.png"></div>

                <div class="image-box style-4">
                    <div class="row grid-space-0">
                        <div class="col-lg-6 order-lg-2">
                            <div class="overlay-container object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="500">
                                <img src="/images/sutek-image-3.jpg" alt="">
                                <div class="overlay-to-top">
                                    <p class="small margin-clear"><em> <strong>Sutek Industry</strong><br>carbonsteel material</em></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-1">
                            <div class="body text-left object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="500">
                                <div class="mt-20 hidden-lg-down"></div>
                                <h3 class="text-right">Carbonsteel Material</h3>
                                <div class="separator-3"></div>
                                <p class="margin-clear">
                                    It is often used in power-saw blades and drill bits. It is superior to the older high-carbon steel tools used extensively
                                    through the 1940s in that it can withstand higher temperatures without losing its temper (hardness).
                                    This property allows HSS to cut faster than high carbon steel, hence the name high-speed steel.
                                    At room temperature, in their generally recommended heat treatment, HSS grades generally display
                                    high hardness (above Rockwell hardness 60) and abrasion resistance (generally linked to tungsten
                                    and vanadium content often used in HSS) compared with common carbon and tool steels.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="image-box style-4">
                    <div class="row grid-space-0">
                        <div class="col-lg-6">
                            <div class="overlay-container object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="400">
                                <img src="/images/sutek-image-12.jpg" alt="Sutek Industries Delivery">
                                <div class="overlay-to-top">
                                    <p class="small margin-clear"><em><strong>Sutek Industries</strong><br>Manufacture & Packing & Delivery</em></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="body object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="400">
                                <div class="pv-20 hidden-lg-down"></div>
                                <h3>Delivery</h3>
                                <div class="separator-2"></div>
                                <p class="margin-clear">
                                    As a export-oriented drill bit enterprise, we are always firmly to control every packing details for good delivery.
                                </p>
                                <ul class="list-icons">
                                    <li class="object-non-visible animated fadeInUp"><i class="fa fa-check-square-o"></i> Good packing materials of ABS for plastic tube/case and etc.</li>
                                    <li class="object-non-visible animated fadeInUp"><i class="fa fa-check-square-o"></i> Approved carton with at least four packing belt.</li>
                                    <li class="object-non-visible animated fadeInUp"><i class="fa fa-√"></i> Acceptance of the pallets should be marked with EUR and/or EPAL marks.</li>
                                    <li class="object-non-visible animated fadeInUp"><i class="fa √"></i> Goods on the pallets must be very good wrap film.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="image-box style-4">
                    <div class="row grid-space-0">
                        <div class="col-lg-6 order-lg-2">
                            <div class="overlay-container object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="500">
                                <img src="/images/sutek-image-13.jpg" alt="Sutek Industries Quality Inspection">
                                <div class="overlay-to-top">
                                    <p class="small margin-clear"><em><strong>Sutek Industries</strong><br> Quality Inspection</em></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-1">
                            <div class="body text-left object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="500">
                                <div class="pt-3 hidden-lg-down"></div>
                                <h3>Quality Inspection</h3>
                                <div class="separator-3"></div>
                                <p class="margin-clear">
                                    Quality inspection is a must before delivery based on Sutek Quality Control Documents or Customer Request Documents.
                                </p>
                                <ul class="list-icons">
                                    <li class="object-non-visible animated fadeInUp"><i class="fa fa-check-square-o"></i> Hardness test to make sure drill bit with a good heat treatment.</li>
                                    <li class="object-non-visible animated fadeInUp"><i class="fa fa-check-square-o"></i> Drilling test to approve our drill bit practicability.</li>
                                    <li class="object-non-visible animated fadeInUp"><i class="fa fa-check-square-o"></i> Chemical Analysis for raw materials choice is guaranteed.</li>
                                    <li class="object-non-visible animated fadeInUp"><i class="fa fa-check-square-o"></i> Visible Test for how to distinguish the raw materials by experiences.</li>
                                    <li class="object-non-visible animated fadeInUp"><i class="fa fa-check-square-o"></i> Drill Bit specification should accord with DIN , ANSI/ASME standard or Tailor-made based on Technical Reference.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>{{-- /.row --}}
        </div>{{-- /.container --}}
    </section>
@endsection