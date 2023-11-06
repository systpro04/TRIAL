@extends('layouts.main')
@section('content')
@include('home.create')
<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item text-secondary">Dashboard</li>
                        <li class="breadcrumb-item"><a href="#" data-toggle="modal" data-target="#create"><i class="fas fa-plus-circle"></i></a></li>
                    </ol>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="info-box" style="background-color: teal">
                        <span class="info-box-icon text-warning" ><i class="fas fa-newspaper"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text text-light">News</span>
                            <span class="info-box-number text-warning">{{ $news }}</span>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: {{ ($news / 100) * 100 }}%"></div>                              
                            </div>
                            <a href="{{ route('news.index') }}" class="small-box-footer text-light"><small>More info <i class="fas fa-arrow-circle-right"></i></small></a>
                        </div>                        
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="info-box" style="background-color: teal">
                        <span class="info-box-icon text-warning"><i class="fas fa-lightbulb"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text text-light">Advisories</span>
                            <span class="info-box-number text-warning">{{ $advisories }}</span>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: {{ ($advisories / 100) * 100 }}%"></div>
                            </div>
                            <a href="{{ route('advisories.index') }}" class="small-box-footer text-light"><small>More info <i class="fas fa-arrow-circle-right"></i></small></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="info-box" style="background-color: teal">
                        <span class="info-box-icon text-warning"><i class="fas fa-exclamation"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text text-light">Interruptions</span>
                            <span class="info-box-number text-warning">{{ $interruptions }}</span>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: {{ ($interruptions / 100) * 100 }}%"></div>
                            </div>
                            <a href="{{ route('interruptions.index') }}" class="small-box-footer text-light"><small>More info <i class="fas fa-arrow-circle-right"></i></small></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="info-box" style="background-color: teal">
                        <span class="info-box-icon text-warning"><i class="fas fa-upload"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text text-light">Uploaded Videos</span>
                            <span class="info-box-number text-warning">{{ $uploads }}</span>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: {{ ($uploads / 100) * 100 }}%"></div>
                            </div>
                            <a href="{{ route('upload.index') }}" class="small-box-footer text-light"><small>More info <i class="fas fa-arrow-circle-right"></i></small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
