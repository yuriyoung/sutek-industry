@extends('home.template')
@section('title', 'Contact Us')

@push('css')
    <link rel="stylesheet" href="{!! asset('/vendor/verify/css/verify.css') !!}">
@endpush

@push('scripts')
    {{--jquery.form 为了使用ajaxSubmit，防止表单提交时跳转 --}}
    <script src="{!! asset('/vendor/validate/jquery.form.min.js') !!}"></script>
    <script src="{!! asset('/vendor/validate/jquery.validate.min.js') !!}"></script>
    <script src="{!! asset('/vendor/verify/js/verify.min.js') !!}"></script>
    <script>
        $(function() {
            var verified = false;
            $(".contact-form").validate({
                rules: {
                    name: {required: true},
                    email: {required: true, email: true},
                    subject: {required: true, minlength: 4, maxlength:80},
                    message: {required: true, minlength: 15},
                    verifyBar: {required:true}
                },
                messages: {
                    name: "Please tell us what should we call you",
                    email: "Please enter a valid email address",
                    subject: {
                        required: "Please enter a subject",
                        minlength: "Subject must be at least 4 characters long",
                        maxlength: "Subject must be at most 80 characters long"
                    },
                    message: {
                        required: "Please leave a message",
                        minlength: "Message must be at least 15 characters long"
                    }
                },
                submitHandler: function(form) {
                    if (verified === false)
                    {
                        $('#verifyBar-error').fadeIn();
                        return;
                    }

                    var $sending = $('.icon-sending');
                    $sending.removeClass('fa-send-o');
                    $sending.addClass('fa-spinner fa-pulse');
                    $('.btn-send').attr('disabled', true);
                    $(form).ajaxSubmit({
                        success: function(message)
                        {
                            $(".contact-form").fadeOut('fast');
                            var $report = $('.form-report');
                            $report.addClass('alert-success');
                            $report.append("<p>" + message + "</p>");
                            $report.fadeIn('slow');
                        },
                        error: function () {
                            $(".contact-form").fadeOut('fast');
                            var $report = $('.form-report');
                            $report.addClass('alert-danger');
                            $report.append("<p>Your message was failure sent, try again later please.</p>");
                            $report.fadeIn('slow');
                        }
                    });
                },
                errorElement: "em",
                errorPlacement: function(error, element) {
                    if(verified === false)
                        $('#verifyBar-error').fadeIn();
                    error.addClass( "help-block invalid-feedback");
                    error.insertAfter(element);
                }
            });

            $('#verifyBar').slideVerify({
                type : 1,
                vOffset : 10,
                vSpace : 10,
                explain: 'Swipe right to complete validation',
                explaining: 'Release mouse',
                explainSuccess: 'Successfully',
                explainFailed: 'Failure',
                barSize : {
                    width : '100%',
                    height : '40px'
                },
                ready : function() {
                    verified = false;
                },
                success : function() {
                    verified = true;
                    $('#verifyBar-error').fadeOut();
                    $('.btn-send').attr('disabled', false);
                },
                error : function() {
                    verified = false;
                }
            });
        });
    </script>
@endpush

@section('content')
    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="{!! url('/') !!}">Home</a></li>
                <li class="breadcrumb-item active">Contact us</li>
            </ol>
        </div>
    </div>

    <section class="main-container">
        <div class="container">
            <div class="row">

                <div class="main col-lg-8 object-non-visible animated object-visible fadeInLeftSmall">
                    <h2 class="page-title">Contact Us</h2>
                    <div class="separator-2"></div>
                    <p>It would be great to hear from you! Just drop us a line and ask for anything with which you think we could be helpful. We are looking forward to hearing from you!</p>
                    <div class="forms">
                        <form class="contact-form margin-clear" id="contactForm" action="{!! url('mail/send') !!}" method="post">
                            <input name="_token" value="{{ csrf_token() }}" type="hidden">
                            <div class="form-row">
                                <div class="form-group has-feedback col-md-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    <i class="fa fa-user form-control-feedback"></i>
                                </div>
                                <div class="form-group has-feedback col-md-6">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                                    <i class="fa fa-envelope form-control-feedback"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                <i class="fa fa-navicon form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <textarea class="form-control" rows="4" id="message" name="message" placeholder="Message" required></textarea>
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div id="verifyBar"></div>
                                </div>
                                <div><span id="verifyBar-error" class="error help-block invalid-feedback" style="display: none;"><em>Please swipe right to complete validation</em></span></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-default btn-animated btn-send" disabled="disabled"><i class="icon-sending fa fa-send-o"></i> Send</button>
                            </div>
                        </form>
                        <div class="form-report alert alert-dismissible" role="alert" style="display: none;">
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 col-xl-3 ml-xl-auto object-non-visible animated object-visible fadeInRightSmall">
                    <div class="sidebar">
                        <div class="block clearfix">
                            <h3 class="title">Find Us</h3>
                            <div class="separator-2"></div>
                            <ul class="list">
                                <li><i class="fa fa-home pr-10"></i><span>{!! config('st_company_address') !!}</span></li>
                                <li><i class="fa fa-phone pr-10"></i><abbr title="Phone">P:</abbr> {!! config('st_company_phone') !!}</li>
                                <li><i class="fa fa-mobile pr-10 pl-1"></i><abbr title="Phone">M:</abbr> {!! config('st_company_mobile', '-') !!}</li>
                                <li><i class="fa fa-fax pr-10 pl-1"></i><abbr title="Fax">F:</abbr> {!! config('st_company_fax', '-') !!}</li>
                                <li><i class="fa fa-envelope pr-10"></i><a href="mailto:{!! config('st_company_email') !!}"> {!! config('st_company_email') !!}</a></li>
                            </ul>
                            <a class="btn btn-default collapsed map-show btn-animated" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">Show Map <i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="block clearfix">
                            <h3 class="title">Follow Us</h3>
                            <div class="separator-2"></div>
                            <ul class="social-links circle small margin-clear clearfix animated-effect-1">
                                <li class="wechat"><a href="{!! config('st_social_wechat', '#') !!}"><i class="fa fa-wechat"></i></a></li>
                                <li class="qq"><a href="{!! config('st_social_qq', '#') !!}"><i class="fa fa-qq"></i></a></li>
                                <li class="weibo"><a href="{!! config('st_social_weibo', '#') !!}"><i class="fa fa-weibo"></i></a></li>
                                {{--<li class="skype"><a href="{!! config('st_social_skype', '#') !!}"><i class="fa fa-skype"></i></a></li>--}}
                                <li class="linkedin"><a href="{!! config('st_social_linkedin', '#') !!}"><i class="fa fa-linkedin"></i></a></li>
                                <li class="facebook"><a href="{!! config('st_social_facebook', '#') !!}"><i class="fa fa-facebook"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </section>

@endsection