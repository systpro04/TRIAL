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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
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
                       <div class="table-responsive">
                            <table class="table table-striped shadow table-hover text-center" id="power">
                                <thead class="bg-primary text-center">
                                    <tr>
                                        <th>Capacity ( kW )</th>
                                        <th>Morning ( 1:00AM-12:00NN )</th>
                                        <th>Afternoon ( 12:01PM-6:00PM )</th>
                                        <th>Evening ( 6:01PM-12:59PM )</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @if(count($powers) > 0) --}}
                                    @foreach ($powers as $pow)
                                        <tr>
                                            <td>{{ $pow->capacity }}</td>
                                            <td>{{ $pow->morning }}</td>
                                            <td>{{ $pow->afternoon }}</td>
                                            <td>{{ $pow->evening }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-danger">Action</button>
                                                    <button type="button" class="btn btn-sm btn-danger dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                      <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#edit{{$pow->id}}">Edit</a>                                                
                                                        <form id="delete-form-{{ $pow->id }}" action="{{ route('power.destroy', $pow->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a type="button" onclick="deleteData({{ $pow->id }})" class="dropdown-item">Delete</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('ADMIN_VIEW.power.edit')
                                    @endforeach
                                    {{-- @else
                                        <div class="col-md-12 text-center">
                                            <td style="color: red; font-size: 1rem; text-transform:uppercase" colspan="12">No Data Available</td>                     
                                        </div>
                                    @endif --}}
                                </tbody>
                            </table>
                       </div>
                        {{-- <div class="d-flex justify-content-end">
                            {!! $powers->links() !!}
                        </div> --}}
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
<script>
    $(document).ready( function () {
        $('#power').DataTable({
            "lengthMenu" : [ [10, 25, 50, 100, 10000], [10, 25, 50, 100, "Max"] ],
            "pageLength" : 10,
        });
    });
</script>
@endsection
