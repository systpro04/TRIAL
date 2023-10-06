@extends('layouts.main')
@section('content')
@include('news_adv_int.news.create')
<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">News</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">News</li>
                    </ol>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary mt-2 card-outline shadow" style="background-color: rgba(245, 245, 245, 0.57)"  >
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">News Information List</h4>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create"><i class="fas fa-plus-circle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-reponsive">
                            <table class="table table-striped shadow table-hover text-center" id="newsTable">
                                <thead class="bg-primary text-center">
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Article</th>
                                        <th>Date Posted</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $new)
                                    <tr>
                                        <td>
                                            @if ($new->image)
                                                @foreach (json_decode($new->image) as $image)
                                                    <img src="{{ asset('uploads/news/' . $image) }}" alt="Image" width="100">
                                                @endforeach
                                            @else
                                                No image available
                                            @endif
                                        </td>
                                        <td>{{ $new->title }}</td>
                                        <td>{{ $new->article }}</td>
                                        <td>{{ $new->dateTime }}</td>
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