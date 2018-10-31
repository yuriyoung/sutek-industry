@extends('home.template')
@section('title', 'Services')

@section('content')
    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="{!! url('/') !!}">Home</a></li>
                <li class="breadcrumb-item active">Sitemap</li>
            </ol>
        </div>
    </div>

    <section class="main-container">
        <div class="container">
            <div class="row">

                <!-- main start -->
                <!-- ================ -->
                <div class="main col-12">
                    <h1 class="page-title">Sitemap</h1>
                    <div class="separator-2"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <h3 class="mt-4">Home</h3>
                            <ul class="list">
                                <li><a href="{!! url('') !!}"><i class="fa fa-angle-right pr-2"></i>Home</a></li>
                            </ul>
                            <h3 class="mt-4">Services</h3>
                            <ul class="list">
                                <li><a href="{!! url('services') !!}"><i class="fa fa-angle-right pr-2"></i>Services</a></li>
                            </ul>
                            <h3 class="mt-4">News</h3>
                            <ul class="list">
                                <li><a href="{!! url('news') !!}"><i class="fa fa-angle-right pr-2"></i>News</a></li>
                            </ul>
                            <h3 class="mt-4">Downloads</h3>
                            <ul class="list">
                                <li><a href="{!! url('downloads') !!}"><i class="fa fa-angle-right pr-2"></i>Downloads</a></li>
                            </ul>
                            <h3 class="mt-4">About</h3>
                            <ul class="list">
                                <li><a href="{!! url('about') !!}"><i class="fa fa-angle-right pr-2"></i>About</a></li>
                            </ul>
                            <h3 class="mt-4">Contact Us</h3>
                            <ul class="list">
                                <li><a href="{!! url('contact') !!}"><i class="fa fa-angle-right pr-2"></i>Contact Us</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-8">
                            <h3 class="mt-3">Products</h3>
                            <div class="row">
                                <div class="col-lg-4">
                                    <h6 class="mt-3">Categories</h6>
                                    <ul class="list">
                                        @foreach($categories as $category)
                                            @if($category->parent_id == '0' )
                                                @continue
                                            @endif
                                            <li>
                                                <a href="{!! url('products/category/' . $category->slug) !!}">
                                                    <i class="fa fa-angle-right pr-2"></i>{!! $category->name !!}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="mt-3">Specification</h6>
                                    <ul class="list">
                                        @foreach($specs as $spec)
                                            @if($loop->index >= count($specs)/2)
                                                @break
                                            @endif
                                            <li>
                                                <a href="{!! url('products/spec/' . $spec->slug) !!}">
                                                    <i class="fa fa-angle-right pr-2"></i>{!! $spec->value !!}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="mt-3">Specification</h6>
                                    <ul class="list">
                                        @foreach($specs as $spec)
                                            @if($loop->index >= count($specs)/2)
                                            <li>
                                                <a href="{!! url('products/spec/' . $spec->slug) !!}">
                                                    <i class="fa fa-angle-right pr-2"></i>{!! $spec->value !!}
                                                </a>
                                            </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection