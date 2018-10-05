@extends('home.template')
@section('title', 'Downloads')

@section('content')
    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="{!! url('/') !!}">Home</a></li>
                <li class="breadcrumb-item active">Downloads</li>
            </ol>
        </div>
    </div>

    <section class="main-container">
        <div class="container">
            <div class="row">
                <table class="table table-colored table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>File</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($files))
                        @if(empty($files))
                        @endif
                        @foreach($files as $file)
                            @if(!$file['isDir'])
                                <tr class="animated fadeInUp delay-{!! ($loop->index+1) * 200 !!}ms">
                                    <td>{!! $loop->index+1 !!}</td>
                                    <td>
                                        {!! $file['preview'] !!}
                                        <a href="{!! url('download?file='.basename($file['name'])) !!}" class="file-name" title="{!! basename($file['name']) !!}">
                                            {!! $file['icon'] !!} {!! basename($file['name']) !!}</a>
                                    </td>
                                    <td>{!! $file['size'] !!}</td>
                                    <td><a href="{!! url('download?file='.basename($file['name'])) !!}" target="_blank" class="btn btn-default-transparent btn-animated">
                                            Download <i class="fa fa-download"></i></a></td>
                                </tr>
                            @endif

                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection