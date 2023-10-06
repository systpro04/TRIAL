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
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fas fa-newspaper"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">News</span>
                            <span class="info-box-number">0</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 20%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">

                    <div class="info-box bg-warning">
                        <span class="info-box-icon"><i class="fas fa-lightbulb"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Advisories</span>
                            <span class="info-box-number">0</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 5%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="info-box bg-danger">
                        <span class="info-box-icon"><i class="fas fa-exclamation"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Interruptions</span>
                            <span class="info-box-number">0</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 35%"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-6">

                    <div class="info-box bg-primary">
                        <span class="info-box-icon"><i class="fas fa-user-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">User Account</span>
                            <span class="info-box-number">{{ $users->count() }}</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 2%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
