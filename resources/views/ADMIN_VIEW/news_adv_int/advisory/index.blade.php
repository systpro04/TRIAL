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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                    data-target="#create"><i class="fas fa-plus-circle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-reponsive">
                            <table class="table table-striped shadow table-hover text-center">
                                <thead class="bg-primary text-center">
                                    <tr>
                                        <th>Place</th>
                                        <th>Details</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($advisories) > 0)
                                    @foreach ($advisories as $adv)
                                        <tr>
                                            <td>{{ $adv->place }}</td>
                                            <td>{{ $adv->info }}</td>
                                            <td>{{ \Carbon\Carbon::parse($adv->startDateTime)->format('M. d h:i A') }} to {{ \Carbon\Carbon::parse($adv->endDateTime)->addDay()->format('M. d, Y h:i A') }}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#edit{{ $adv->id }}">
                                                    <button class="btn btn-success btn-sm" type="button"><i class="fas fa-pen"></i></button>
                                                </a>  
                                                <form id="delete-form-{{ $adv->id }}"
                                                    action="{{ route('advisories.destroy', $adv->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        onclick="deleteData({{ $adv->id }})"
                                                        type="button" data-placement="bottom"
                                                        onclick="deleteAdvisory()" class="btn btn-danger btn-sm"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('ADMIN_VIEW.news_adv_int.advisory.edit')
                                    @endforeach
                                    @else
                                        <div class="col-md-12 text-center">
                                            <td style="color: red; font-size: 1rem; text-transform:uppercase" colspan="12">No Data Available</td>                     
                                        </div>
                                    @endif
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
@endsection
