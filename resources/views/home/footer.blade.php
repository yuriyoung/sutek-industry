<footer class="clearfix dark" id="footer">
    <div class="footer">
        <div class="container">
            <div class="footer-inner">
                <div class="row">

                    <div class="col-lg-3">
                        <div class="footer-content">
                            <div class="logo-footer"><img id="logo-footer" src="/images/logo-light.png" alt=""></div>
                            <p>Shanghai Sutek Industries Co., Ltd is an export-oriented industry and trade integration company
                                in field of hardware products. 25 years of export experience laid it's foundation
                                in the industry of tools, be professional on ...
                                <a href="{!! url('about') !!}">Learn More<i class="fa fa-long-arrow-right pl-1"></i></a>
                            </p>
                            <div class="separator-2"></div>
                            <nav>
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="nav-link" href="{!! url('services') !!}">Services</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{!! url('news') !!}">News</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{!! url('products') !!}">Products</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{!! url('downloads') !!}">Downloads</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{!! url('about') !!}">About</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{!! url('contact') !!}">Contact Us</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{!! url('sitemap') !!}">Sitemap</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="footer-content">
                            <h2 class="title">Subscribe</h2>
                            <div class="separator-2"></div>
                            <p>Subscribe us for latest drill bits and news.</p>
                            <form class="form-inline margin-clear d-flex justify-content-center" onsubmit="return false;">
                                <div class="form-group has-feedback mb-sm-3 mb-md-0">
                                    <label class="sr-only" for="subscribeInput">Email address</label>
                                    <input type="email" class="form-control form-control-lg" id="subscribeInput" name="email" placeholder="Enter email" required="">
                                    <i class="fa fa-envelope form-control-feedback"></i>
                                </div>
                                <button type="button" id="subscribe" class="btn btn-lg btn-gray-transparent btn-animated margin-clear ml-4">Submit <i class="fa fa-send"></i></button>
                            </form>
                            <div class="separator"></div>

                            <h2 class="title">Popular Tags</h2>
                            <div class="separator-2"></div>
                            <div class="tags-cloud">
                                @if(isset($hotCategories))
                                    @foreach($hotCategories as $category)
                                        <div class="tag">
                                            <a href="{!! url('products/category/'.$category->slug) !!}">{!! $category->name !!}</a>
                                        </div>
                                        @if($loop->index >= 24)
                                            @break;
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="footer-content">
                            <h2 class="title">Follow Us</h2>
                            <div class="separator-2"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>WeChat:</p>
                                    <img src="/images/qrcode-wechat.png" style="width: 6.8rem;">
                                </div>
                                <div class="col-md-6">
                                    <p>LinkedIn:</p>
                                    <img src="/images/qrcode-linkedin.png" style="width: 6.8rem;">
                                </div>
                            </div>
                            <ul class="social-links small circle animated-effect-1">
                                <li class="wechat"><a href="{!! config('st_social_wechat', '#') !!}"><i class="fa fa-wechat"></i></a></li>
                                <li class="qq"><a href="{!! config('st_social_qq', '#') !!}"><i class="fa fa-qq"></i></a></li>
                                <li class="weibo"><a href="{!! config('st_social_weibo', '#') !!}"><i class="fa fa-weibo"></i></a></li>
                                {{--<li class="skype"><a href="{!! config('st_social_skype', '#') !!}"><i class="fa fa-skype"></i></a></li>--}}
                                <li class="facebook"><a href="{!! config('st_social_facebook', '#') !!}"><i class="fa fa-facebook"></i></a></li>
                                <li class="linkedin"><a href="{!! config('st_social_linkedin', '#') !!}"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            <ul class="list-icons">
                                <li><i class="fa fa-map-marker pr-2 text-default"></i> {!! config('st_company_address', 'Shanghai') !!}</li>
                                <li><i class="fa fa-phone pr-2 text-default"></i> {!! config('st_company_phone', 'Shanghai') !!}</li>
                                <li><i class="fa fa-fax pr-2 text-default"></i> {!! config('st_company_fax', 'Shanghai') !!}</li>
                                <li><a href="mailto:{!! config('st_company_email', 'sutek@sutek-industry.com') !!}"><i class="fa fa-envelope-o pr-2"></i> {!! config('st_company_email', 'sutek@sutek-industry.com') !!}</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="copyright blue">
        <div class="container">
            <div class="footer-inner">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">{!! config('st_copyright', 'Copyright© 2018 Sutek-Industry, All rights reserved.') !!} Designed by Yuri</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>