@extends('layouts.main')
@section('content')
@include('ADMIN_VIEW.news_adv_int.advisory.create')
<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Advisories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item text-secondary">Advisory</li>
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
                                <h4 class="card-title">Advisories Information List</h4>
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
                            <table class="table table-striped shadow table-hover text-center" id="advisory">
                                <thead class="bg-primary text-center">
                                    <tr>
                                        <th>Place</th>
                                        <th>Details</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @if(count($advisories) > 0) --}}
                                    @foreach ($advisories as $adv)
                                        <tr>
                                            <td>{{ $adv->place }}</td>
                                            <td>{{ $adv->info }}</td>
                                            @php
                                                $dateRange = explode(" to ", $adv->dateTime);
                                                $startDate = date("F, j, Y g:i A", strtotime($dateRange[0]));
                                                $endDate = date("F, j, Y g:i A", strtotime($dateRange[1]));
                                            @endphp
                                            <td>{{ $startDate }} to {{ $endDate }}</td>
                                            <td>

                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-danger">Action</button>
                                                    <button type="button" class="btn btn-sm btn-danger dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                      <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit{{ $adv->id }}">Edit</a>                                                
                                                        <form id="delete-form-{{ $adv->id }}" action="{{ route('advisories.destroy', $adv->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a type="button" onclick="deleteData({{ $adv->id }})" class="dropdown-item">Delete</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('ADMIN_VIEW.news_adv_int.advisory.edit')
                                    @endforeach
                                    {{-- @else
                                        <div class="col-md-12 text-center">
                                            <td style="color: red; font-size: 1rem; text-transform:uppercase" colspan="12">No Data Available</td>                     
                                        </div>
                                    @endif --}}
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                {!! $advisories->links() !!}
                            </div>
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
<script>
    $(document).ready( function () {
        $('#advisory').DataTable({
            "lengthMenu" : [ [10, 25, 50, 100, 10000], [10, 25, 50, 100, "Max"] ],
            "pageLength" : 10,
        });
    });
</script>
@endsection
