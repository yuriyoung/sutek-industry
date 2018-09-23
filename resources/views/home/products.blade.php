@extends('home.template')
@section('title', 'Products')

@push('scripts')
    <script src="{!! asset('/vendor/isotope/imagesloaded.pkgd.min.js') !!}"></script>
    <script src="{!! asset('/vendor/isotope/isotope.pkgd.min.js') !!}"></script>
    <script src="{!! asset('/vendor/pagination/jquery.pagination.js') !!}"></script>
@endpush

@section('content')
    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="{!! url('/') !!}">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </div>
    </div>

    <div class="dark-translucent-bg default-hovered animated-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="call-to-action text-center">
                        <div class="row">
                            <div class="col-md-8">
                                <h2 class="mt-4">Learn more information</h2>
                                <h2 class="mt-4">download our catalogue <small>(pdf 2.48MB)</small></h2>
                            </div>
                            <div class="col-md-4">
                                <p class="mt-3"><a href="#" class="btn btn-animated btn-lg btn-gray-transparent">Download Now<i class="fa fa-download pl-20"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="main-container">
        <div class="container">
            <div class="row">
                <div class="main col-12">

                    <h1 class="page-title">Product list</h1>
                    {{--@includeIf('home.widgets.product-navbar')--}}
                    <div class="separator-2"></div>
                    {{--<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit Illo quaerat <br> commodi excepturi dignissimos!</p>--}}

                    <form class="">
                        <div class="form-inline form-group">
                            <input class="form-control col-10" id="searchInput" type="text" placeholder="Search...">
                            <a href="#" class="btn btn-default col-auto"><i class="fa fa-search"> Search</i></a>
                        </div>
                    </form>

                    {{--isotope filters start--}}
                    <div class="filters">
                        <ul class="nav nav-pills" id="filters">
                            <li class="nav-item"><a class="nav-link active" href="#" data-filter="*">All</a></li>
                            @if(isset($products))
                                @php
                                    $filters = [];
                                @endphp
                                @foreach($products as $product)
                                    @if(!in_array($product->category->slug, $filters))
                                        <li class="nav-item"><a class="nav-link" href="#" data-filter=".{!! $product->category->slug !!}">{!! $product->category->name !!}</a></li>
                                        {!! array_push($filters, $product->category->slug) !!}
                                    @endif
                                @endforeach
                            @endif

                        </ul>
                    </div>
                    {{--isotope filters end--}}

                    <div class="isotope-container-fit-rows row grid-space-10" style="display:none;">
                        {{-- product item --}}
                        @if(isset($products))
                            @foreach($products as $product)
                            <div class="col-md-6 col-lg-3 isotope-item {!! $product->category->slug !!}">
                                <div class="image-box style-2 mb-20 shadow-2 bordered text-center">
                                    <div id="carousel-portfolio{{$loop->index}}" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators top">
                                            @if(count($product->thumbs) < 1)
                                                @php
                                                    $product->images = ['/images/image-not-found_thumb.png'];
                                                @endphp
                                            @endif
                                            @foreach($product->thumbs as $thumb)
                                                <li data-target="#carousel-portfolio{{$loop->parent->index}}"
                                                    data-slide-to="{!! $loop->index !!}" class="{!! $loop->index == 0 ? 'active' : '' !!}"></li>
                                            @endforeach
                                        </ol>

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            @foreach($product->thumbs as $thumb)
                                                <div class="carousel-item {!! $loop->index == 0 ? 'active' : '' !!}">
                                                    <div class="overlay-container">
                                                        <img src="{!! $product->media_path . $thumb !!}" alt="{!! $product->title !!}">
                                                        <div class="overlay-to-top">
                                                            <p class="small margin-clear"><em>{!! $product->category->name !!} <br>{!! $product->title !!}</em></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>{{-- /.carousel slide --}}
                                    <div class="body light-gray-bg">
                                        <h4>{!! $product->title !!}</h4>
                                        <div class="separator"></div>
                                        <a href="#" class="btn btn-default-transparent btn-animation btn-animation--slide-horizontal margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>
                                    </div>
                                </div>{{-- /.image-box --}}
                            </div>{{-- product item 1 --}}
                            @endforeach
                        @endif

                        {{-- product item 2--}}

                        {{-- product item 3--}}

                        {{-- product item 4--}}

                    </div>{{-- /.isotope container--}}

                    <div class="separator"></div>

                    {{-- pagination --}}
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center animated-effect-1">
                            @if(isset($products))
                            <li class="page-item page-item-prev {!! $products->currentPage() === 1 ? 'disabled' : '' !!}">
                                <a class="page-link" href="{!! $products->previousPageUrl() !!}"><i class="fa fa-angle-left"></i><span class="sr-only">Previous</span></a>
                            </li>
                            @for($i = 1; $i <= $products->lastPage(); ++$i)
                                <li class="page-item {!! $i === $products->currentPage() ? 'active' : '' !!}"><a class="page-link" href="{!! url('/products?page=' . $i) !!}">{!! $i !!}</a></li>
                            @endfor
                            <li class="page-item page-item-next {!! $products->currentPage() === $products->lastPage() ? 'disabled' : '' !!}">
                                <a class="page-link" href="{!! $products->nextPageUrl() !!}"><i class="fa fa-angle-right"></i><span class="sr-only">Next</span></a>
                            </li>
                            @endif
                        </ul>

                    </nav>

                </div>{{-- /.main row--}}
            </div>{{-- /.row --}}
        </div>{{-- /.container --}}

    </section>
@endsection