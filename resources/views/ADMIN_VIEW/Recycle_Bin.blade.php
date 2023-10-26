@extends('layouts.main')
@section('content')
@include('ADMIN_VIEW.news_adv_int.advisory.create')
<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Recycle Bin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-secondary">Recycle Bin</li>
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
                                <h4 class="card-title">Recycle Bin</h4>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('news.index') }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="News"><i class="fas fa-newspaper"></i></a>
                                <a href="{{ route('interruptions.index') }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Interruptions"><i class="fas fa-exclamation"></i></a>
                                <a href="{{ route('advisories.index') }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Advisories"><i class="fas fa-lightbulb"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-reponsive">
                            <table class="table table-striped shadow table-hover text-center">
                                <thead class="bg-primary text-center">
                                    <tr>
                                        <th>Table</th>
                                        <th>Title</th>
                                        <th>Date Deleted</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if ($deleted->isEmpty())
                                    <tr>
                                        <td colspan="12" style="color: red; font-size: 1rem; text-transform: uppercase">Recycle bin is empty.</td>
                                    </tr>
                                @else
                                    @foreach ($deleted as $record)
                                        <tr>
                                            <td>{{ $record->getTable() }}</td>
                                            <td>
                                                @if ($record->getTable() === 'news' && isset($record->title))
                                                    {{ $record->title }}
                                                @elseif ($record->getTable() === 'interruptions' && isset($record->what))
                                                    {{ $record->what }}
                                                @elseif ($record->getTable() === 'advisories' && isset($record->place))
                                                    {{ $record->place }}
                                                @elseif ($record->getTable() === 'uploads' && isset($record->title))
                                                    {{ $record->title }}
                                                @elseif ($record->getTable() === 'links' && isset($record->title))
                                                    {{ $record->title }}
                                                @endif
                                            </td>
                                            <td>{{ $record->deleted_at }}</td>
                                            <td>
                                                <form id="restore-form-{{ $record->id }}" action="{{ route('restore-record', ['table' => $record->getTable(), 'id' => $record->id]) }}" method="post" style="display: inline;">
                                                    @csrf
                                                    @method('put')
                                                    <button onclick="restoreData({{ $record->id }})" type="button" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Restore"><i class="fas fa-recycle"></i></button>
                                                </form>
                                                <form id="delete-form-{{ $record->id }}" action="{{ route('permanent-delete-record', ['table' => $record->getTable(), 'id' => $record->id]) }}" method="post" style="display: inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button onclick="deleteData({{ $record->id }})" type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            {{-- <div class="d-flex justify-content-end">
                                {!! $deleted->links() !!}
                            </div> --}}
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
            title: 'Permanently Delete This?',
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
    function restoreData(id) {
        Swal.fire({
            title: 'Restore This Data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Proceed'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('restore-form-' + id).submit();
            }
        });
    }
</script>
@endsection
