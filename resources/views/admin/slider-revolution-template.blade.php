<div class="banner clearfix">
    {{-- slideshow revolution start --}}
    <div class="slideshow">
        <div class="slider-revolution-template-container">
            <div id="slider-banner-fullwidth-big-height" class="slider-banner-boxedwidth rev_slider" data-version="5.0">
                <ul class="slides">

                    <li data-transition="random-premium" data-slotamount="default" data-masterspeed="default" data-title="We Can Build Anything 1">
                        <img src="http://placehold.it/1920x650/f86/fff" alt="slidebg1" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover"  class="rev-slidebg">
                        {{-- LAYER NR. 1 --}}
                        <div class="tp-caption tp-resizeme dark-translucent-bg caption-box text-left hidden-sm-down"
                             style="background-color: rgba(0, 0, 0, 0.7);"
                             data-frames='[{"delay":500,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-x="left"
                             data-y="center"
                             data-whitespace="normal">
                            <h2 class="title">We Can Build Anything</h2>
                            <div class="separator-2 clearfix"></div>
                            <p>Voluptatem ad provident non repudiandae beatae cupiditate amet reiciendis lorem ipsum dolor sit amet, consectetur.</p>
                            <div class="text-right"><a class="btn btn-small btn-gray-transparent margin-clear" href="#">Read More</a></div>
                        </div>
                        {{-- Other LAYER NR. 2 --}}
                    </li>

                    <li data-transition="random-premium" data-slotamount="default" data-masterspeed="default" data-title="We Can Build Anything 1">
                        <img src="http://placehold.it/1920x650/f86/fff" alt="slidebg1" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover"  class="rev-slidebg">
                        {{-- LAYER NR. 1 --}}
                        <div class="tp-caption tp-resizeme dark-translucent-bg caption-box text-left hidden-sm-down"
                             style="background-color: rgba(0, 0, 0, 0.7);"
                             data-frames='[{"delay":500,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-x="left"
                             data-y="center"
                             data-whitespace="normal">
                            <h2 class="title">We Can Build Anything</h2>
                            <div class="separator-2 clearfix"></div>
                            <p>Voluptatem ad provident non repudiandae beatae cupiditate amet reiciendis lorem ipsum dolor sit amet, consectetur.</p>
                            <div class="text-right"><a class="btn btn-small btn-gray-transparent margin-clear" href="#">Read More</a></div>
                        </div>
                    </li>

                </ul>{{-- /.slides--}}
                <div class="tp-bannertimer"></div>
            </div>
        </div>
    </div>{{-- /.slideshow --}}
</div>

<div class="section">
    <form>
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="layerSelect">Layers: </label>
                    <select class="form-control" id="layerSelect">
                    </select>
                    <label for="layerContent">Layer content: </label>
                    <textarea class="form-control" id="layerContent" rows="3"></textarea>
                    <label for="newLayer">New Layer:</label>
                    <textarea id="newLayer" class="form-control" rows="3"></textarea>
                    <button id="addLayerButton" type="button" class="btn btn-default pull-right">Add</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="framesSelect">Animation Frames: </label>
                    <select multiple="" class="form-control" id="framesSelect">
                    </select>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="layerDelay">Layer Delay:</label>
                        <input id="layerDelay" type="text" class="form-control" value="500">
                    </div>
                    <div class="col-sm-6">
                        <label for="layerSpeed">Layer Speed:</label>
                        <input id="layerSpeed" type="text" class="form-control" value="300">
                    </div>
                </div>
            </div>

        </div>
        <a href="#" class="btn btn-animated btn-default btn-sm pull-right">Save <i class="fa fa-download"></i></a>
    </form>
</div>
