@extends('layouts.main')
@section('content')
@include('news_adv_int.interruption.create')
<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Interruptions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Interruption</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary mt-2 card-outline shadow" style="background-color: rgba(245, 245, 245, 0.57)"  >
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">Interruptions Information List</h4>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create"><i class="fas fa-plus-circle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-reponsive">
                            <table class="table table-striped shadow table-hover text-center">
                                <thead class="bg-primary text-center">
                                    <tr>
                                        <th>What</th>
                                        <th>Date</th>
                                        <th>Where</th>
                                        <th>Why</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($interruptions as $int)
                                    <tr>
                                        <td>{{ $int->what }}</td>
                                        <td>{{ $int->where }}</td>
                                        <td>{{ $int->why }}</td>
                                        <td>{{ $int->dateTime }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection