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

                <div class="main col-lg-9 order-lg-1 ml-xl-auto">
                    <article class="article-post">
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
                            <div class="article-summary">
                                <p>{!! $news->summary !!}</p>
                            </div>
                            <div class="separator"></div>
                            <div class="article-body">
                                <p>{!! $news->body !!}</p>
                            </div>
                        </div>

                        <footer class="clearfix"></footer>
                    </article>

                    <div class="pv-30 clearfix"></div>

                    <h3 class="mt-2">Comments</h3>
                    <div class="separator-2"></div>



                    <div class="forms pv-45">
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

                <aside class="col-lg-3 col-xl-3 order-lg-2">
                    <div class="sidebar">
                        <div class="block clearfix">
                            <h3 class="title">Recent</h3>
                            <div class="separator-2"></div>
                            <nav>
                                <ul class="nav flex-column">
                                    @foreach($recent_news as $news)
                                        <li class="nav-item"><a class="nav-link" href="{!! url('news/'.$news->slug) !!}">{!! str_limit($news->title, 32) !!}</a></li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                        <div class="block clearfix">
                            <h3 class="title">Hot</h3>
                            <div class="separator-2"></div>
                            <nav>
                                <ul class="nav flex-column">
                                    @foreach($recent_news as $news)
                                        <li class="nav-item"><a class="nav-link" href="{!! url('news/'.$news->slug) !!}">{!! str_limit($news->title, 32) !!}</a></li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                        <div class="block clearfix">
                            <h3 class="title">Comments</h3>
                            <div class="separator-2"></div>
                            <nav>
                                <ul class="nav flex-column">
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
                                @foreach($latest_images as $image)
                                    <li data-target="#carousel-portfolio-sidebar" data-slide-to="{!! $loop->index !!}" class="{!! $loop->index == 0 ? 'active' : '' !!}"></li>
                                @endforeach
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                @foreach($latest_images as $image)
                                    <div class="carousel-item {!! $loop->index == 0 ? 'active' : '' !!}">
                                        <div class="image-box shadow bordered text-center mb-20">
                                            <div class="overlay-container">
                                                <img src="{!! $image !!}" alt="">
                                                <a href="{!! $image !!}" class="overlay-link">
                                                    <i class="fa fa-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>{{-- /.carousel-item --}}
                        </div>
                    </div>{{-- /.block--}}
                </aside>

            </div>
        </div>
    </section>

@endsection