@extends('layouts.main')
@section('content')
@include('ADMIN_VIEW.news_adv_int.news.create')
<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">News</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item text-secondary">News</li>
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
                                <h4 class="card-title">News Information List</h4>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create" data-bs-toggle="tooltip" data-bs-placement="top" title="Create"><i class="fas fa-plus-circle"></i></a>
                                <a href="{{ route('recyclebin') }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Recycle"><i class="fas fa-recycle"></i></a>
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
                                    {{-- @if(count($news) > 0) --}}
                                    @foreach ($news as $new)
                                        <tr>
                                            <td>
                                                <div class="carousel-container">
                                                    @if ($new->image)
                                                        <div id="imageCarousel-{{ $new->id }}" class="carousel" data-ride="carousel">
                                                            @foreach (json_decode($new->image) as $key => $image)
                                                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                                                    <img src="{{ asset('uploads/news/' . $image) }}" alt="Image" style="width: 100px ;height: 50px">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        No image available
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{ $new->title }}</td>
                                            <td>{{ $new->article }}</td>
                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i A', $new->dateTime)->format('M. d, Y h:i A') }}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#edit{{$new->id}}">
                                                    <button class="btn btn-sm btn-success" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-pen"></i></button>
                                                </a>                                                
                                                <form id="delete-form-{{ $new->id }}" action="{{ route('news.destroy', $new->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="deleteData({{ $new->id }})" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @include('ADMIN_VIEW.news_adv_int.news.edit')
                                    @endforeach
                                    {{-- @else
                                        <div class="col-md-12 text-center">
                                            <td style="color: red; font-size: 1rem; text-transform:uppercase" colspan="12">No Data Available</td>                     
                                        </div>
                                    @endif --}}
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                {!! $news->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.carousel-container {
    overflow: hidden;
}
</style>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script>
    $(document).ready(function() {
        $('#imageCarousel').carousel({
            interval: 1500
        });
    });
    function deleteData(id) {
        Swal.fire({
            title: 'Are you sure you want to delete this?',
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
<script>
    $(document).ready( function () {
        $('#newsTable').DataTable({
            "lengthMenu" : [ [10, 25, 50, 100, 10000], [10, 25, 50, 100, "Max"] ],
            "pageLength" : 10,
        });
    });
</script>
@endsection
