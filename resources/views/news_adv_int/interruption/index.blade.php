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
                                            <a href="#" data-toggle="modal" data-target="#edit{{$int->id}}">
                                                <button class="btn btn-success btn-sm" type="button"><i class="fas fa-pen"></i></button>
                                            </a>   
                                            <form id="delete-form-{{ $int->id }}" action="{{ route('interruptions.destroy', $int->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="deleteData({{ $int->id }}, '{{ $int->what }}', '{{ $int->where }}')" type="button" data-placement="bottom" onclick="deleteInterruptions()" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @include('news_adv_int.interruption.edit')
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                {{ $interruptions->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function deleteData(id, what, where) {
        Swal.fire({
            title: 'Are you sure you want to delete this?',
            text: `"What:"${what}".`,
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

    function deleteInterruptions() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Proceed'
        }).then((result) => {
            if (result.isConfirmed) {
                document.forms[0].submit();
            }
        });
    }
</script>

@endsection