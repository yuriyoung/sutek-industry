@extends('home.template')
@section('title', empty($title) ? 'Products' : $title)

@push('scripts')
    <script src="{!! asset('/vendor/pagination/jquery.pagination.js') !!}"></script>
    <script>
        $('ul.pagination').twbsPagination({
            totalPages: '{!! $products->lastPage() !!}',
            startPage: 1,
            visiblePages: 5,
            initiateStartPageClick: true,
            hideOnlyOnePage: false,
            href: true,
            pageVariable:'page',
            first: '<i class="fa fa-angle-double-left"></i>',
            prev: '<i class="fa fa-angle-left"></i>',
            next: '<i class="fa fa-angle-right"></i>',
            last: '<i class="fa fa-angle-double-right"></i>',
            loop: false,
        })
    </script>
@endpush

@section('content')
    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="{!! url('/') !!}">Home</a></li>
                @if(empty($title))
                    <li class="breadcrumb-item active">Products</li>
                @else
                    <li class="breadcrumb-item"><i class="fa fa-cubes pr-2"></i><a class="link-dark" href="{!! url('/products') !!}">Products</a></li>
                    <li class="breadcrumb-item active">{!! $title !!}</li>
                @endif
            </ol>
        </div>
    </div>

    <section class="main-container">
        <div class="container">
            <div class="row">
                <div class="main col-9">
                    <form class="" action="{!! url('products') !!}">
                        <div class="form-inline form-group">
                            <input class="form-control col-10" id="searchInput" name="search" type="text" placeholder="Search: title,category,specification" value="{!! isset($search) ? $search : '' !!}">
                            <button type="submit" class="btn btn-default col-auto"><i class="fa fa-search"> Search</i></button>
                        </div>
                    </form>
                    <h4 class="page-title">Product List @if(!empty($title)) - <small>{!! $title !!}</small> @endif</h4>
                    <div class="separator-2"></div>

                    @if(isset($products))
                        @foreach($products as $product)
                            <div class="image-box style-3-b style-2 mb-20 shadow-1 object-non-visible" data-animation-effect="fadeInUp" data-effect-delay="200">
                                <div class="row">
                                    <div class="col-md-6 col-lg-4 col-xl-4">
                                        <div id="carousel-portfolio{{$loop->index}}" class="carousel slide" data-ride="carousel">
                                            <!-- Indicators -->
                                            <ol class="carousel-indicators top">
                                                @if(count($product->thumbs) < 1)
                                                    @php
                                                        $product->thumbs = ['images/image-not-found_thumb.png'];
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
                                                                <p class="small margin-clear"><em>{!! $product->category ? $product->category->name :'' !!} <br>{!! $product->title !!}</em></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>{{-- /.carousel slide --}}
                                    </div>
                                    <div class="col-md-6 col-lg-8 col-xl-8">
                                        <div class="body mb-2">
                                            <h3 class="title"><a href="{!! $product->url !!}" target="_blank">{!! $product->title !!}</a></h3>
                                            <p class="small mb-10">
                                                <span><i class="fa fa-calendar-o pr-1"></i> {!! $product->created_at !!}</span>
                                                <span><i class="fa fa-tag pl-10 pr-1"></i><a href="{!! '/products?category='. ($product->category ? $product->category->slug : '') !!}">{!! $product->category ? $product->category->name : '' !!}</a></span>
                                                <span class="views"><i class="fa fa-eye pl-10 pr-1"></i> {!! $product->views !!} views</span>
                                                <span class="likes"><a href="#" data-slug="{!! $product->slug !!}"><i class="fa fa-thumbs-o-up pl-10 pr-1"></i></a> {!! $product->likes !!} likes</span>
                                            </p>
                                            <div class="separator-2"></div>
                                            <section>
                                                <p class="mb-10">{!! str_limit($product->description, 160) !!}</p>
                                            </section>
                                            <a href="{!! $product->url !!}" class="btn btn-default-transparent btn-animation btn-animation--slide-horizontal margin-clear" target="_blank">Read More<i class="fa fa-arrow-right pl-10"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

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

                </div>

                <aside class="col-lg-3 col-xl-3">
                    <div class="sidebar">
                        <div class="block clearfix">
                            <h3 class="title">Categories</h3>
                            <div class="separator-2"></div>
                            <div id="accordion" class="collapse-style-1" role="tablist" aria-multiselectable="true">
                                <nav id="accordion">
                                    <ul class="nav flex-column">
                                        @if(isset($sidebarMenu))
                                            {!! $sidebarMenu !!}
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection