@extends('home.template')
@section('title', 'News')

@section('content')
    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="{!! url('/') !!}">Home</a></li>
                <li class="breadcrumb-item active">News</li>
            </ol>
        </div>
    </div>

    <section class="main-container">
        <div class="container">
            <div class="row">

                <div class="main col-lg-9 order-lg-1 ml-xl-auto">
                    <h1 class="page-title">Recent News</h1>
                    <div class="separator-2"></div>

                    @if(isset($news))
                        @foreach($news as $post)
                            <article class="article-post">
                                <div class="row grid-space-10">
                                    @if($post->image)
                                    <div class="col-lg-4">
                                        <div class="overlay-container">
                                            <img src="{!! $post->image !!}" alt="{!! $post->title !!}">
                                            <a class="overlay-link" href="{!! url('news/' . $post->slug) !!}"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="{!! $post->image ? 'col-lg-8' : 'col-lg-12' !!}">
                                        <header>
                                            <h2><a href="{!! url('news/'.$post->slug) !!}">{!! $post->title !!}</a></h2>
                                            <div class="post-info">
                                                <span class="post-date">
                                                    <i class="fa fa-calendar-o pr-1"></i>
                                                    <span class="date">{!! $post->created_at !!}</span>
                                                </span>
                                                <span class="submitted"><i class="fa fa-user pr-1 pl-1"></i> by {!! $post->author->name !!}</span>
                                                <span class="comments"><i class="fa fa-comments-o pl-1 pr-1"></i> <a href="#">0 comments</a></span>
                                            </div>
                                        </header>
                                        <div class="article-post-content">
                                            <p>{!! $post->summary !!}</p>
                                        </div>
                                    </div>

                                </div>
                                <footer class="clearfix">
                                    {{--<div class="tags pull-left"><i class="fa fa-tags pr-1"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>--}}
                                    <div class="link pull-right"><i class="fa fa-link pr-1"></i><a href="{!! url('news/'.$post->slug) !!}">Read More</a></div>
                                </footer>
                            </article>
                        @endforeach
                    @endif

                    <div class="separator pv-20"></div>

                    {{-- pagination --}}
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center animated-effect-1">
                            @if(isset($news))
                                <li class="page-item page-item-prev {!! $news->currentPage() === 1 ? 'disabled' : '' !!}">
                                    <a class="page-link" href="{!! $news->previousPageUrl() !!}"><i class="fa fa-angle-left"></i><span class="sr-only">Previous</span></a>
                                </li>
                                @for($i = 1; $i <= $news->lastPage(); ++$i)
                                    <li class="page-item {!! $i === $news->currentPage() ? 'active' : '' !!}"><a class="page-link" href="{!! url('news?page=' . $i) !!}">{!! $i !!}</a></li>
                                @endfor
                                <li class="page-item page-item-next {!! $news->currentPage() === $news->lastPage() ? 'disabled' : '' !!}">
                                    <a class="page-link" href="{!! $news->nextPageUrl() !!}"><i class="fa fa-angle-right"></i><span class="sr-only">Next</span></a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>

                <aside class="col-lg-3 col-xl-3 order-lg-2">
                    @include('home.widgets.news-sidebar')
                </aside>

            </div>
        </div>
    </section>
@endsection