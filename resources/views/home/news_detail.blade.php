@extends('home.template')
@section('title', 'News')

@section('content')
    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="{!! url('/') !!}">Home</a></li>
                <li class="breadcrumb-item"><i class="fa fa-newspaper-o pr-2"></i><a class="link-dark" href="{!! url('news') !!}">News</a></li>
                @if(isset($news))
                    <li class="breadcrumb-item active">{!! $news->title !!}</li>
                @endif
            </ol>
        </div>
    </div>

    <section class="main-container padding-ver-clear">
        <div class="container pv-40">
            <div class="row">

                <div class="main col-lg-8 order-lg-2 ml-xl-auto">
                    <header>
                        <h1 class="title">{!! $news->title !!}</h1>
                        <div class="post-info">
                            <span class="post-date">
                                <i class="fa fa-calendar-o pr-1"></i>
                                <span class="date">{!! $news->created_at !!}</span>
                            </span>
                            <span class="submitted"><i class="fa fa-user pr-1 pl-1"></i> by {!! $news->author->name !!}</span>
                            <span class="comments"><i class="fa fa-eye pl-1 pr-1"></i> {!! $news->views !!} views</span>
                            <span class="comments"><i class="fa fa-comments-o pl-1 pr-1"></i> <a href="#">0 comments</a></span>
                        </div>
                    </header>
                    <div class="separator-2"></div>
                    <div class="article-post-content">
                        <p>{!! $news->body !!}</p>
                    </div>

                    <div class="pv-30 clearfix"></div>

                    <h3 class="mt-3">Comments</h3>
                    <div class="separator-2"></div>

                    <div class="forms">
                        <form class="contact-form margin-clear" id="commentForm">
                            <div class="form-row">
                                <div class="form-group has-feedback col-md-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    <i class="fa fa-user form-control-feedback"></i>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group has-feedback col-md-6">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                                    <i class="fa fa-envelope form-control-feedback"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <textarea class="form-control" rows="4" id="comment" name="comment" placeholder="Your comment" required></textarea>
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-md btn-default btn-animated pull-right" disabled="disabled"><i class="icon-sending fa fa-comment-o"></i>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <aside class="col-lg-4 col-xl-3 order-lg-1">
                    <div class="sidebar">
                        <div class="block clearfix">
                            <h3 class="title">News</h3>
                            <div class="separator-2"></div>
                            <nav>
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                                    <li class="nav-item"><a class="nav-link active" href="#">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Portfolio</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>{{-- /.sidebar --}}
                    <div class="block clearfix">
                        <h3 class="title">Latest Graphics</h3>
                        <div class="separator-2"></div>
                        <div id="carousel-portfolio-sidebar" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-portfolio-sidebar" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-portfolio-sidebar" data-slide-to="1"></li>
                                <li data-target="#carousel-portfolio-sidebar" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <div class="image-box shadow bordered text-center mb-20">
                                        <div class="overlay-container">
                                            <img src="http://placehold.it/750x460/09f/fff" alt="">
                                            <a href="http://placehold.it/750x460/09f/fff" class="overlay-link">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="image-box shadow bordered text-center mb-20">
                                        <div class="overlay-container">
                                            <img src="http://placehold.it/750x460/8e3/fff" alt="">
                                            <a href="http://placehold.it/750x460/8e3/fff" class="overlay-link">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="image-box shadow bordered text-center mb-20">
                                        <div class="overlay-container">
                                            <img src="http://placehold.it/750x460/bb4/fff" alt="">
                                            <a href="http://placehold.it/750x460/bb4/fff" class="overlay-link">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>{{-- /.carousel-item --}}
                        </div>
                    </div>{{-- /.block--}}
                </aside>

            </div>
        </div>
    </section>

@endsection