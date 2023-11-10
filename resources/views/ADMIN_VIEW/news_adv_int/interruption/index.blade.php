@extends('layouts.main')
@section('content')
@include('ADMIN_VIEW.news_adv_int.interruption.create')
<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Interruptions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item text-secondary">Interruption</li>
                    </ol>
                </div>
            </div>
        </div>
    <hr>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline shadow">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">Interruptions Information List</h4>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create" data-bs-toggle="tooltip" data-bs-placement="top" title="Create"><i class="fas fa-plus-circle"></i></a>
                                <a href="{{ route('recyclebin') }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Recycle"><i class="fas fa-recycle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-reponsive">
                            <table class="table table-striped shadow table-hover text-center" id="interruptionTable">
                                <thead class="bg-primary text-center">
                                    <tr>
                                        <th>What</th>
                                        <th>Where</th>
                                        <th>Why</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @if(count($interruptions) > 0) --}}
                                        @foreach ($interruptions as $int)
                                        <tr>
                                            <td>{{ $int->what }}</td>
                                            <td>{{ $int->where }}</td>
                                            <td>{{ $int->why }}</td>
                                            @php
                                                $dateRange = explode(" to ", $int->dateTime);
                                                $startDate = date("F, j, Y g:i A", strtotime($dateRange[0]));
                                                $endDate = date("F, j, Y g:i A", strtotime($dateRange[1]));
                                            @endphp
                                            <td>{{ $startDate }} to {{ $endDate }}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#edit{{$int->id}}">
                                                    <button class="btn btn-success btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-pen"></i></button>
                                                </a>   
                                                <form id="delete-form-{{ $int->id }}" action="{{ route('interruptions.destroy', $int->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="deleteData({{ $int->id }})" type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('ADMIN_VIEW.news_adv_int.interruption.edit')
                                        @endforeach
                                        {{-- @else
                                        <div class="col-md-12 text-center">
                                            <td style="color: red; font-size: 1rem; text-transform:uppercase" colspan="12">No Data Available</td>                     
                                        </div> --}}
                                    @endif
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                {!! $interruptions->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
        });
    }
</script>
<script>
    $(document).ready( function () {
        $('#interruptionTable').DataTable({
            "lengthMenu" : [ [10, 25, 50, 100, 10000], [10, 25, 50, 100, "Max"] ],
            "pageLength" : 10,
        });
    });
</script>
@endsection