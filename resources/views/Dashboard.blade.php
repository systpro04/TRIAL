@extends('layouts.main')
@section('content')

<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                            <span class="info-box-number text-warning">{{ $news->count() }}</span>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: {{ ($news->count() / 100) * 100 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="info-box" style="background-color: teal">
                        <span class="info-box-icon text-warning"><i class="fas fa-lightbulb"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text text-light">Advisories</span>
                            <span class="info-box-number text-warning">{{ $advisories->count() }}</span>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: {{ ($advisories->count() / 100) * 100 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box" style="background-color: teal">
                        <span class="info-box-icon text-warning"><i class="fas fa-exclamation"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text text-light">Interruptions</span>
                            <span class="info-box-number text-warning">{{ $interruptions->count() }}</span>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: {{ ($interruptions->count() / 100) * 100 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box" style="background-color: teal">
                        <span class="info-box-icon text-warning"><i class="fas fa-user-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text text-light">User Account</span>
                            <span class="info-box-number text-warning">{{ $users->count() }}</span>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: {{ ($users->count() / 100) * 100 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
