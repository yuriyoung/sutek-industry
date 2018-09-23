@extends('home.template')
@section('title', '404 Page Not Found')


@section('content')
    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="{!! url('') !!}">Home</a></li>
                <li class="breadcrumb-item active">Page 404</li>
            </ol>
        </div>
    </div>

    <section class="main-container light-gray-bg text-center margin-clear">
        <div class="container">
            <div class="row justify-content-lg-center">

                <div class="main col-lg-6 pv-40">
                    <h1 class="page-title extra-large"><span class="text-default">404</span></h1>
                    <h2 class="mt-4">Ooops! Page Not Found</h2>
                    <p class="lead">The requested URL was not found on this server. Make sure that the Web site address displayed in the address bar of your browser is spelled and formatted correctly.</p>
                    <a href="javascript:history.back(-1)" class="btn btn-default-transparent btn-lg"><i class="fa fa-arrow-left"> Back</i></a>
                    <a href="{!! url('/') !!}" class="btn btn-default btn-animated btn-lg">Return Home <i class="fa fa-home"></i></a>
                </div>

            </div>
        </div>
    </section>
@endsection