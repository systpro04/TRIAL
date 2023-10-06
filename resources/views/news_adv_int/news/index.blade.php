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
                <div class="card card-primary mt-2 card-outline shadow"
                    style="background-color: rgba(245, 245, 245, 0.57)">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">News Information List</h4>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#create"><i class="fas fa-plus-circle"></i></a>
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
                                                    <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                                                        <div class="carousel-inner">
                                                            @foreach (json_decode($new->image) as $key => $image)
                                                                <div
                                                                    class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                                                    <img src="{{ asset('uploads/news/' . $image) }}"
                                                                        class="d-block w-100" alt="Image"
                                                                        style="width: 50px; height: 40px">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @else
                                                    No image available
                                                @endif
                                            </td>
                                            <td>{{ $new->title }}</td>
                                            <td>{{ $new->article }}</td>
                                            <td>{{ $new->dateTime }}</td>
                                            <td>
                                                <a href="{{ route('news.edit', $new) }}">
                                                    <button class="btn btn-success mx-1" type="submit"><i class="fas fa-edit"></i></i></button>
                                                </a>
                                                <form id="delete-form-{{ $new->id }}" action="{{ route('news.destroy', $new->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" data-placement="bottom" onclick="deleteData({{ $new->id }},'{{ $new->title }}')" class="btn btn-danger btndelete"><i class="fas fa-trash"></i></button>
                                                </form>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

<script>
    $(document).ready(function() {
        $('#imageCarousel').carousel({
            interval: 1500
        });
    });
    function deleteData(id, title) {
        Swal.fire({
            title: 'Are you sure you want to delete this?',
            text: `Title:" ${title}".`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Proceed'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>
@endsection
