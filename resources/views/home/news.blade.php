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

                <div class="main col-lg-8 order-lg-2 ml-xl-auto">
                    <h1 class="page-title">Recent News</h1>
                    <div class="separator-2"></div>

                    {{-- article post 1--}}
                    <article class="article-post">
                        <div class="row grid-space-10">
                            <div class="col-lg-6">
                                <div id="carousel-article-post" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators bottom margin-clear">
                                        <li data-target="#carousel-article-post" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-article-post" data-slide-to="1"></li>
                                        <li data-target="#carousel-article-post" data-slide-to="2"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <div class="image-box shadow bordered text-center">
                                                <div class="overlay-container">
                                                    <img src="http://placehold.it/750x460/09f/fff" alt="">
                                                    <a href="http://placehold.it/750x460/09f/fff" class="overlay-link"><i class="fa fa-link"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="image-box shadow bordered text-cente">
                                                <div class="overlay-container">
                                                    <img src="http://placehold.it/750x460/8e3/fff" alt="">
                                                    <a href="http://placehold.it/750x460/8e3/fff" class="overlay-link"><i class="fa fa-link"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="image-box shadow bordered text-center">
                                                <div class="overlay-container">
                                                    <img src="http://placehold.it/750x460/bb4/fff" alt="">
                                                    <a href="http://placehold.it/750x460/bb4/fff" class="overlay-link"><i class="fa fa-link"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>{{-- /.carousel-item --}}

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <header>
                                    <h2><a href="#">New article with slider</a></h2>
                                    <div class="post-info">
                                        <span class="post-date">
                                          <i class="fa fa-calendar-o pr-1"></i>
                                          <span class="day">12</span>
                                          <span class="month">May 2017</span>
                                        </span>
                                        <span class="submitted"><i class="fa fa-user pr-1 pl-1"></i> by <a href="#">John Doe</a></span>
                                        <span class="comments"><i class="fa fa-comments-o pl-1 pr-1"></i> <a href="#">22 comments</a></span>
                                    </div>
                                </header>
                                <div class="article-post-content">
                                    <p>Mauris dolor sapien, malesuada at interdum ut, hendrerit eget lorem. Nunc interdum mi neque, et  sollicitudin purus fermentum ut. Suspendisse faucibus nibh odio, a vehicula eros pharetra in. Maecenas  ullamcorper commodo rutrum...</p>
                                </div>
                            </div>
                        </div>{{-- /.row --}}
                        <footer class="clearfix">
                            <div class="tags pull-left"><i class="fa fa-tags pr-1"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
                            <div class="link pull-right"><i class="fa fa-link pr-1"></i><a href="#">Read More</a></div>
                        </footer>
                    </article>

                    {{-- article post 2--}}
                    <article class="article-post">
                        <header>
                            <h2><a href="#">Lorem upsoum dolor is</a></h2>
                            <div class="post-info">
                                <span class="post-date">
                                    <i class="fa fa-calendar-o pr-1"></i>
                                    <span class="day">10</span>
                                    <span class="month">May 2017</span>
                                </span>
                                <span class="submitted"><i class="fa fa-user pr-1 pl-1"></i> by <a href="#">John Doe</a></span>
                                <span class="comments"><i class="fa fa-comments-o pl-1 pr-1"></i> <a href="#">22 comments</a></span>
                            </div>
                        </header>
                        <div class="article-post-content">
                            <p>Mauris dolor sapien, malesuada at interdum ut, hendrerit eget lorem. Nunc interdum mi neque, et  sollicitudin purus fermentum ut. Suspendisse faucibus nibh odio, a vehicula eros pharetra in.</p>
                        </div>
                        <footer class="clearfix">
                            <div class="tags pull-left"><i class="fa fa-tags pr-1"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
                            <div class="link pull-right"><i class="fa fa-link pr-1"></i><a href="#">Read More</a></div>
                        </footer>
                    </article>

                    {{-- article post 3--}}
                    <article class="article-post">
                        <div class="row grid-space-10">
                            <div class="col-lg-6">
                                <div class="overlay-container">
                                    <img src="http://placehold.it/750x460/ee4/fff" alt="">
                                    <a class="overlay-link" href="#"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <header>
                                    <h2><a href="#">Cute Robot</a></h2>
                                    <div class="post-info">
                                        <span class="post-date">
                                            <i class="fa fa-calendar-o pr-1"></i>
                                            <span class="day">09</span>
                                            <span class="month">May 2017</span>
                                        </span>
                                        <span class="submitted"><i class="fa fa-user pr-1 pl-1"></i> by <a href="#">John Doe</a></span>
                                        <span class="comments"><i class="fa fa-comments-o pl-1 pr-1"></i> <a href="#">22 comments</a></span>
                                    </div>
                                </header>
                                <div class="article-post-content">
                                    <p>Mauris dolor sapien, malesuada at interdum ut, hendrerit eget lorem. Nunc interdum mi neque, et  sollicitudin purus fermentum ut. Suspendisse faucibus nibh odio, a vehicula eros pharetra in. Maecenas  ullamcorper commodo rutrum. In iaculis lectus vel augue eleifend dignissim.</p>
                                </div>
                            </div>
                        </div>{{-- /.row --}}
                        <footer class="clearfix">
                            <div class="tags pull-left"><i class="fa fa-tags pr-1"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
                            <div class="link pull-right"><i class="fa fa-link pr-1"></i><a href="#">Read More</a></div>
                        </footer>
                    </article>

                    {{-- article post .... --}}
                </div>
                <aside class="col-lg-4 col-xl-3 order-lg-1">
                    <div class="sidebar">
                        <div class="block clearfix">
                            <h3 class="title">Categories</h3>
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