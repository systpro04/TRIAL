@extends('layouts.main')
@section('content')
@include('ADMIN_VIEW.news_adv_int.advisory.create')
<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Recycle Bin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-secondary">Recycle Bin</li>
                    </ol>
                </div>
            </div>
        </div>
    <hr>
    </div>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline shadow">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">Recycle Bin</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-reponsive">
                            <table class="table table-striped shadow table-hover text-center">
                                <thead class="bg-primary text-center">
                                    <tr>
                                        <th>Table</th>
                                        <th>Title</th>
                                        <th>Date Deleted</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deletednews as $news)
                                    <tr>
                                        <td>NEWS</td>
                                        <td>{{ $news->title }}</td>
                                        <td>{{ $news->deleted_at }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-warning"><i class="fas fa-recycle"></i></a>
                                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @foreach ($deletedint as $int)
                                    <tr>
                                        <td>INTERRUPTIONS</td>
                                        <td>{{ $int->what }}</td>
                                        <td>{{ $int->deleted_at }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-warning"><i class="fas fa-recycle"></i></a>
                                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @foreach ($deletedadv as $adv)
                                    <tr>
                                        <td>ADVISORY</td>
                                        <td>{{ $adv->place }}</td>
                                        <td>{{ $adv->deleted_at }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-warning"><i class="fas fa-recycle"></i></a>
                                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <div class="d-flex justify-content-end">
                                {!! $advisories->links() !!}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
