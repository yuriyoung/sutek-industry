
if ($(".slider-revolution-template-container").length>0) {

    var revapi = $('.slider-revolution-template-container .slider-banner-boxedwidth').revolution({
        spinner: 'spinner3',
        lazyType: "smart",
        sliderType: "standard",
        sliderLayout: "auto",
        navigationType: "none",
        navigationArrows:"none",
        delay: 8000,
        gridwidth: 1140,
        gridheight: 450,
        responsiveLevels: [1199, 991, 767, 480],
        stopLoop: 'on',
        stopAfterLoops: 0,
        stopAtSlide: 1,
        outof: 'wait'
    });

    var delay = 0;

    var frames = [
        {'Fade In':'[{"delay":500,"speed":800,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Short From Top':'[{"delay":500,"speed":800,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Short From Bottom':'[{"delay":500,"speed":800,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'},
        {'Short From Left':'[{"delay":500,"speed":800,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Short From Right':'[{"delay":500,"speed":800,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'},
        {'Long From Right':'[{"delay":500,"speed":800,"frame":"0","from":"x:right;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Long From Left':'[{"delay":500,"speed":800,"frame":"0","from":"x:left;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Long From Top':'[{"delay":500,"speed":800,"frame":"0","from":"y:top;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Long From Bottom':'[{"delay":500,"speed":800,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Skew From Long Left':'[{"delay":500,"speed":800,"frame":"0","from":"x:left;skX:45px;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Skew From Long Right':'[{"delay":500,"speed":800,"frame":"0","from":"x:right;skX:-85px;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Skew From Short Left':'[{"delay":500,"speed":800,"frame":"0","from":"x:-200px;skX:85px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Skew From Short Right':'[{"delay":500,"speed":800,"frame":"0","from":"x:200px;skX:-85px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Random Rotate & Scale':'[{"delay":500,"speed":800,"frame":"0","from":"x:{-250,250};y:{-150,150};rX:{-90,90};rY:{-90,90};rZ:{-360,360};sX:0;sY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Letters Fly In From Bottom':'[{"delay":500,"split":"chars","splitdelay":0.05,"speed":2000,"frame":"0","from":"y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Letters Fly In From Left':'[{"delay":500,"split":"chars","splitdelay":0.1,"speed":2000,"frame":"0","from":"x:[-105%];z:0;rX:0deg;rY:0deg;rZ:-90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Letters Fly In From Right':'[{"delay":500,"split":"chars","splitdelay":0.05,"speed":2000,"frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Letters Fly In From Top':'[{"delay":500,"split":"chars","splitdelay":0.05,"speed":2000,"frame":"0","from":"y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Masked Zoom Out':'[{"delay":500,"speed":1000,"frame":"0","from":"z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Popup Smooth':'[{"delay":500,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Rotate In From Bottom':'[{"delay":500,"speed":1500,"frame":"0","from":"y:bottom;rZ:90deg;sX:2;sY:2;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Rotate In From Zero':'[{"delay":500,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Slide Mask From Bottom':'[{"delay":500,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Slide Mask From Left':'[{"delay":500,"speed":1500,"frame":"0","from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Slide Mask From Right':'[{"delay":500,"speed":1500,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Slide Mask From Top':'[{"delay":500,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Smooth Popup One':'[{"delay":500,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Smooth Popup Tow':'[{"delay":500,"speed":1000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Smooth Mask From Right':'[{"delay":500,"speed":1500,"frame":"0","from":"x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Smooth Mask From Left':'[{"delay":500,"speed":1500,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'Smooth Mask From Bottom':'[{"delay":500,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'},
        {'No Animation':'[{"delay":500,"speed":800,"frame":"0","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'}
    ];


    function getNextSlide() {
        return $($('.slides > li')[1]);
    }

    function getSlideLayers() {
        return $($('.slides > li')[1]).children('.tp-caption');
    }

    var $layers = getSlideLayers();// $('.slides > li > .tp-caption');
    var $currentLayer = undefined;

    var $layerContent = $('#layerContent');
    var $framesSelect = $('#framesSelect');
    var $layerSelect = $('#layerSelect');



    $layers.each(function (i) {
        var idx = i + 1;
        $('#layerSelect').append("<option value='" + idx + "'>" + idx + "</option>>");
    });

    if ($layers.length > 0)
    {
        $currentLayer = $(getSlideLayers()[0]);
        var html = $currentLayer.html();
        $layerContent.val(html);
    }

    $layerSelect.on('change', function () {
        var sel =  $(this).get(0).selectedIndex;
        $currentLayer = $(getSlideLayers()[sel]);
        var html = $($layers[sel]).html();
        $layerContent.val(html);
    });

    $.each(frames,function (index, value){
        $.each(value, function (key, val) {
            $framesSelect.append("<option value='" + val + "'>" + key+ "</option>")
        })
    });

    $framesSelect.on('change', function () {
        var $options = $('option:selected', this);
        delay = $('#layerDelay').val();
        var frame = $($options.get(0)).val();
        var obj =eval("("+frame+")");
        $currentLayer.data('frames', obj);

        revapi.revnext();
    });

    $('#addLayerButton').click(function () {
        var layer = "<div class='tp-caption tp-resizeme dark-translucent-bg caption-box text-left hidden-sm-down' data-frames='' data-x='right' data-y='center'>" + $('#newLayer').val() + "</div>";
        getNextSlide().append(layer);
        var layer_total = getSlideLayers().length;
        $('#layerSelect').append("<option value='" + (layer_total+1) + "'>" + (layer_total+1) + "</option>>");
    });
}