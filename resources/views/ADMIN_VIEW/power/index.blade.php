@extends('layouts.main')
@section('content')
@include('ADMIN_VIEW.power.create')
<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Powersupply</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-secondary">Powersupply</li>
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
                                <h4 class="card-title">Powersupply List</h4>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#create" data-bs-toggle="tooltip" data-bs-placement="top" title="Create"><i class="fas fa-plus-circle"></i></a>
                                <a href="{{ route('recyclebin') }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Recycle"><i class="fas fa-recycle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-reponsive">
                            <table class="table table-striped shadow table-hover text-center">
                                <thead class="bg-primary text-center">
                                    <tr>
                                        <th width="200">Capacity (kW)</th>
                                        <th width="100">Morning<br>(1:00AM-12:00NN)</th>
                                        <th width="100">Afternoon<br>(12:01PM-6:00PM)</th>
                                        <th width="100">Evening<br>(6:01PM-12:59PM)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($powers) > 0)
                                    @foreach ($powers as $pow)
                                        <tr>
                                            <td>{{ $pow->capacity }}</td>
                                            <td>{{ $pow->morning }}</td>
                                            <td>{{ $pow->afternoon }}</td>
                                            <td>{{ $pow->morning }}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#edit{{ $pow->id }}">
                                                    <button class="btn btn-success btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-pen"></i></button>
                                                </a>  
                                                <form id="delete-form-{{ $pow->id }}"
                                                    action="{{ route('power.destroy', $pow->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        onclick="deleteData({{ $pow->id }})"
                                                        type="button"
                                                        onclick="deleteAdvisory()" class="btn btn-danger btn-sm"><i
                                                            class="fas fa-trash" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('ADMIN_VIEW.power.edit')
                                    @endforeach
                                    @else
                                        <div class="col-md-12 text-center">
                                            <td style="color: red; font-size: 1rem; text-transform:uppercase" colspan="12">No Data Available</td>                     
                                        </div>
                                    @endif
                                </tbody>
                            </table>
                            {{-- <div class="d-flex justify-content-end">
                                {!! $powers->links() !!}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
@endsection
