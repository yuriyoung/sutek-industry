<div class="sidebar">

    <div class="block clearfix">
        <h3 class="title">Recent</h3>
        <div class="separator-2"></div>
        <nav>
            <ul class="nav flex-column">
                @foreach($recent_news as $news)
                    <li class="nav-item">
                        <a class="nav-link" href="{!! url('news/'.$news->slug) !!}">{!! str_limit($news->title, 32) !!}</a>
                    </li>
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
                    <li class="nav-item">
                        <a class="nav-link" href="{!! url('news/'.$news->slug) !!}">{!! str_limit($news->title, 32) !!}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>

    <div class="block clearfix">
        <h3 class="title">Latest Graphics</h3>
        <div class="separator-2"></div>
        <div id="carousel-portfolio-sidebar" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach($latest_images as $image)
                    <li data-target="#carousel-portfolio-sidebar" data-slide-to="{!! $loop->index !!}"
                        class="{!! $loop->index == 0 ? 'active' : '' !!}"></li>
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
    <div class="block clearfix">
        <h3 class="title">Comments</h3>
        <div class="separator-2"></div>
        <nav>
            <ul class="nav flex-column">
            </ul>
        </nav>
    </div>
</div>{{-- /.sidebar --}}
