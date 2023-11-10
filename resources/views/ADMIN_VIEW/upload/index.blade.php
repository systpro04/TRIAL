@extends('layouts.main')
@section('content')
@include('ADMIN_VIEW.upload.create')
<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Uploads</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Uploads</li>
                    </ol>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary mt-2 card-outline shadow" style="background-color: rgba(245, 245, 245, 0.57)">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">Uploaded List</h4>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create" data-bs-toggle="tooltip" data-bs-placement="top" title="Create"><i class="fas fa-plus-circle"></i></a>
                                <a href="{{ route('recyclebin') }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Recycle"><i class="fas fa-recycle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-reponsive">
                            <table class="table table-striped shadow table-hover text-center" id="uploadTables">
                                <thead class="bg-primary text-center">
                                    <tr>
                                        <th>File</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @if(count($uploads) > 0) --}}
                                    @foreach ($uploads as $upload )
                                    <tr>
                                        <td><video style=" height: 60px; width: 100px;" class="text-center" controls> <source src="{{ URL::asset('uploads/videos/' . $upload->file) }}" style=" height: 60px; width: 100px;" type="video/mp4"></td>
                                        <td>{{ $upload->title }}</td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#edit{{$upload->id}}">
                                                <button class="btn btn-sm btn-success" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-pen"></i></button>
                                            </a>                                                
                                            <form id="delete-form-{{ $upload->id }}" action="{{ route('upload.destroy', $upload->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="deleteData({{ $upload->id }})" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @include('ADMIN_VIEW.upload.edit')
                                    @endforeach
                                    {{-- @else
                                        <div class="col-md-12 text-center">
                                            <td style="color: red; font-size: 1rem; text-transform:uppercase" colspan="12">No Data Available</td>                     
                                        </div>
                                    @endif --}}
                                   
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                {{ $uploads->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
        $('#uploadTables').DataTable({
            "lengthMenu" : [ [10, 25, 50, 100, 10000], [10, 25, 50, 100, "Max"] ],
            "pageLength" : 10,
        });
    });
</script>
@endsection
