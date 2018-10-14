@extends('home.template')
@section('title', isset($product) ? $product->title : 'Product profile')

@push('css')
    <link rel="stylesheet" href="{!! asset('/vendor/social-share/css/share.min.css') !!}">
@endpush

@push('scripts')
    {{--<script src="{!! asset('/vendor/social-share/js/social-share.min.js') !!}"></script>--}}
    <script src="{!! asset('/vendor/social-share/js/jquery.share.min.js') !!}"></script>
    <script>

        $('.social-share').share({
            sites: ['google', 'facebook', 'twitter', 'linkedin', 'wechat', 'weibo', 'qq', 'qzone'],
            wechatQrcodeTitle: 'Scan QRCode: share this',
            wechatQrcodeHelper: '<p>Scan QRCode to share this page</p><p>with your friends by WeChat app</p>',
            description: $('.article-post').text(),
            imageSelector: $('.product-img')
        });

    </script>
@endpush

@section('content')
    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="{!! url('/') !!}">Home</a></li>
                <li class="breadcrumb-item"><i class="fa fa-cubes pr-2"></i><a class="link-dark" href="{!! url('/products') !!}">Products</a></li>
                @if(isset($product))
                    <li class="breadcrumb-item active">{!! $product->title !!}</li>
                @endif
            </ol>
        </div>
    </div>

    <section class="main-container">
        <div class="container">
            <div class="row">
                <div class="main col-lg-8">

                    {{-- nav tabs --}}
                    <ul class="nav nav-tabs style-2" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" href="#pill-1" role="tab" data-toggle="tab" title="image"><i class="fa fa-camera pr-1"></i> Image Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pill-2" role="tab" data-toggle="tab" title="table"><i class="fa fa-table pr-1"></i>Size Table</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pill-3" role="tab" data-toggle="tab" title="video"><i class="fa fa-video-camera pr-1"></i> Video</a></li>
                    </ul>
                    {{-- Tab panes --}}
                    <div class="tab-content space-bottom  object-non-visible animated object-visible fadeInLeft">
                        <div class="tab-pane active" id="pill-1">
                            <div class="slick-carousel content-slider-with-controls-autoplay object-non-visible animated object-visible fadeIn">

                                @if(isset($product))
                                    @if(count($product->images) < 1 )
                                        @php
                                            $product->images = ['images/image-not-found.png']
                                        @endphp
                                    @endif
                                    @foreach($product->images as $image)
                                        <div class="overlay-container overlay-visible">
                                            <img src="{!! $product->media_path.$image !!}" class="product-img" alt="{!! $product->title !!}">
                                            <div class="overlay-bottom hidden-sm-down">
                                                <div class="text">
                                                    <h3 class="title">{!! $product->title !!}</h3>
                                                </div>
                                            </div>
                                            <a href="{!! $product->media_path.$image !!}" class="slick-carousel--popup-img overlay-link" title="{!! $product->title !!}"><i class="fa fa-plus"></i></a>
                                        </div>
                                    @endforeach
                                @endif

                            </div> {{-- carousel-profile --}}
                        </div> {{--tab-pane 1--}}

                        <div class="tab-pane" id="pill-2">
                            <table class="table text-center table-striped table-colored object-non-visible animated object-visible fadeIn">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Dia</th>
                                    <th>Dec.Equ.</th>
                                    <th>Flute Length</th>
                                    <th>Shank DIA</th>
                                    <th>OAL</th>
                                    <th>Number of Flutes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($product->sizes) > 0)
                                    @foreach($product->sizes as $idx => $size)
                                        <tr>
                                            <td>{!! $idx+1 !!}</td>
                                            <td>{!! $size->diameter ?: 'N/A' !!}</td>
                                            <td>{!! $size->equivalence ?: 'N/A' !!}</td>
                                            <td>{!! $size->flute_length ?: 'N/A' !!}</td>
                                            <td>{!! $size->shank_diameter ?: 'N/A' !!}</td>
                                            <td>{!! $size->overall_length ?: 'N/A' !!}</td>
                                            <td>{!! $size->flutes ?: 'N/A' !!}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane embed-responsive embed-responsive-16by9" id="pill-3">
                            <video class="embed-responsive-item" src="#" poster="/images/poster.png" controls="controls">
                                This browser does not support the video tag.
                            </video>
                        </div>
                    </div> {{--tab-content--}}

                    <div class="post-info">
                        <span class="views"><i class="fa fa-eye pl-10 pr-1"></i> {!! $product->views !!} views</span>
                        <span class="likes"><a href="#" data-slug="{!! $product->slug !!}"><i class="fa fa-thumbs-o-up text-default pl-10 pr-1"></i></a> {!! $product->likes !!} likes</span>
                    </div>

                    <div class="row">
                        <article class="col-lg-12 object-non-visible" data-animation-effect="fadeInUp" data-effect-delay="600">
                            <header>
                                <h3>Product Description</h3>
                                <div class="separator-2"></div>
                            </header>
                            <div class="article-post">
                                {!! $product->description !!}
                            </div>
                        </article>
                    </div>

                </div> {{--/.main --}}

                {{-- sidebar start --}}
                <aside class="col-lg-4 col-xl-4 ml-xl-auto">
                    <div class="sidebar object-non-visible animated object-visible fadeInRight">
                        <h3 class="mt-4">Product Info</h3>
                        <div class="separator-2"></div>
                        <ul class="list mb-20">
                            <li><strong>Name: </strong> <span class="text-right">{!! $product->title !!}</span></li>
                            <li><strong>Date: </strong> <span class="text-right">{!! $product->created_at !!}</span></li>
                            <li><strong>Category: </strong> <span class="text-right">
                                @if(isset($product->category))
                                <a href="{!! url('categories/'.$product->category->name) !!}">{!! $product->category->name !!}</a></span>
                                @endif
                            </li>
                            <li><strong>Place: </strong> <span class="text-right">China DanYang</span></li>
                            <li><strong>URL: </strong> <span class="text-right"><i class="fa fa-link pr-1"></i><a href="{!! $product->url !!}">{!! $product->url !!}</a></span></li>
                        </ul>

                        <h3 class="mt-4">Specification</h3>
                        <div class="separator-2"></div>
                        <dl class="row mb-20">
                            @php
                                $names = array_column(json_decode($product->specs,true), 'name');
                                $unique_names = array_unique($names);
                            @endphp
                            @foreach ($unique_names as $name)
                                <dt class="col-sm-4 text-sm-right">{!! ucfirst($name) !!}<div class="separator-3"></div></dt>
                                <dd class="col-sm-8">
                                    @while(($key = array_search($name, $names, true)) !== FALSE)
                                        <a href="{!! url('/products?spec='.$product->specs[$key]->slug) !!}" class="badge text-dark">
                                            {!! $product->specs[$key]->value !!}
                                        </a>
                                        @unset($names[$key])
                                    @endwhile
                                </dd>
                            @endforeach
                        </dl>

                        <h3 class="mt-4">Share This</h3>
                        <div class="separator-2"></div>
                        <div class="social-share social-links colored circle small" id="share-this">
                            {{--<li class="wechat"><a href="{!! config('st_social_wechat', '#') !!}" class="icon-wechat"></a></li>--}}
                            {{--<li class="qq"><a href="{!! config('st_social_qq', '#') !!}" class="icon-qq"></a></li>--}}
                            {{--<li class="weibo"><a href="{!! config('st_social_weibo', '#') !!}" class="icon-weibo"><i class="fa fa-weibo"></i></a></li>--}}
                            {{--<li class="googleplus"><a href="{!! config('st_social_googleplus', '#') !!}" class="icon-google"><i class="fa fa-google-plus"></i></a></li>--}}
                            {{--<li class="linkedin"><a href="{!! config('st_social_linkedin', '#') !!}" class="icon-linkedin"><i class="fa fa-linkedin"></i></a></li>--}}
                            {{--<li class="facebook"><a href="{!! config('st_social_facebook', '#') !!}" class="icon-facebook"><i class="fa fa-facebook"></i></a></li>--}}
                        </div>
                    </div>
                </aside>

            </div>{{--/.row --}}
        </div>
    </section>
@endsection