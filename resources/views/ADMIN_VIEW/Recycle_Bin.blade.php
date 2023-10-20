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
                                {{-- <tbody>
                                    @if ($deletednews->isEmpty() && $deletedint->isEmpty() && $deletedadv->isEmpty())
                                        <td colspan="12" style="color: red; font-size: 1rem; text-transform:uppercase">Recycle bin is empty.</td>
                                    @else
                                    @foreach ($deletednews as $news)
                                    <tr>
                                        <td>NEWS</td>
                                        <td>{{ $news->title }}</td>
                                        <td>{{ $news->deleted_at }}</td>
                                        <td>
                                            <form id="restore-form-{{ $news->id }}" action="{{ route('restore-record', ['table' => 'news', 'id' => $news->id]) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('put')
                                                <button onclick="restoreData({{ $news->id }})" type="button" data-placement="bottom" class="btn btn-sm btn-warning"><i class="fas fa-recycle"></i></button>
                                            </form>
                                            <form id="delete-form-{{ $news->id }}" action="{{ route('permanent-delete-record', ['table' => 'news', 'id' => $news->id]) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('delete')
                                                <button onclick="deleteData({{ $news->id }})" type="button" data-placement="bottom" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @foreach ($deletedint as $int)
                                    <tr>
                                        <td>INTERRUPTIONS</td>
                                        <td>{{ $int->what }}</td>
                                        <td>{{ $int->deleted_at }}</td>
                                        <td>
                                            <form id="restore-form-{{ $int->id }}" action="{{ route('restore-record', ['table' => 'int', 'id' => $int->id]) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('put')
                                                <button onclick="restoreData({{ $int->id }})" type="button" data-placement="bottom" class="btn btn-sm btn-warning"><i class="fas fa-recycle"></i></button>
                                            </form>
                                            <form id="delete-form-{{ $int->id }}" action="{{ route('permanent-delete-record', ['table' => 'int', 'id' => $int->id]) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('delete')
                                                <button onclick="deleteData({{ $int->id }})" type="button" data-placement="bottom" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @foreach ($deletedadv as $adv)
                                    <tr>
                                        <td>ADVISORY</td>
                                        <td>{{ $adv->place }}</td>
                                        <td>{{ $adv->deleted_at }}</td>
                                        <td>
                                            <form id="restore-form-{{ $adv->id }}" action="{{ route('restore-record', ['table' => 'adv', 'id' => $adv->id]) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('put')
                                                <button onclick="restoreData({{ $adv->id }})" type="button" data-placement="bottom" class="btn btn-sm btn-warning"><i class="fas fa-recycle"></i></button>
                                            </form>
                                            <form  id="delete-form-{{ $adv->id }}" action="{{ route('permanent-delete-record', ['table' => 'adv', 'id' => $adv->id]) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('delete')
                                                <button onclick="deleteData({{ $adv->id }})" type="button" data-placement="bottom" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @foreach ($deleteduploads as $upload)
                                    <tr>
                                        <td>UPLOADS</td>
                                        <td>{{ $upload->place }}</td>
                                        <td>{{ $upload->deleted_at }}</td>
                                        <td>
                                            <form id="restore-form-{{ $upload->id }}" action="{{ route('restore-record', ['table' => 'upload', 'id' => $upload->id]) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('put')
                                                <button onclick="restoreData({{ $upload->id }})" type="button" data-placement="bottom" class="btn btn-sm btn-warning"><i class="fas fa-recycle"></i></button>
                                            </form>
                                            <form  id="delete-form-{{ $upload->id }}" action="{{ route('permanent-delete-record', ['table' => 'upload', 'id' => $upload->id]) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('delete')
                                                <button onclick="deleteData({{ $upload->id }})" type="button" data-placement="bottom" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                    @foreach ($deletedadv as $adv)
                                    <tr>
                                        <td>ADVISORY</td>
                                        <td>{{ $adv->place }}</td>
                                        <td>{{ $adv->deleted_at }}</td>
                                        <td>
                                            <form id="restore-form-{{ $adv->id }}" action="{{ route('restore-record', ['table' => 'adv', 'id' => $adv->id]) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('put')
                                                <button onclick="restoreData({{ $adv->id }})" type="button" data-placement="bottom" class="btn btn-sm btn-warning"><i class="fas fa-recycle"></i></button>
                                            </form>
                                            <form  id="delete-form-{{ $adv->id }}" action="{{ route('permanent-delete-record', ['table' => 'adv', 'id' => $adv->id]) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('delete')
                                                <button onclick="deleteData({{ $adv->id }})" type="button" data-placement="bottom" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @foreach ($deletedlink as $link)
                                    <tr>
                                        <td>LINKS</td>
                                        <td>{{ $link->place }}</td>
                                        <td>{{ $link->deleted_at }}</td>
                                        <td>
                                            <form id="restore-form-{{ $link->id }}" action="{{ route('restore-record', ['table' => 'link', 'id' => $link->id]) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('put')
                                                <button onclick="restoreData({{ $link->id }})" type="button" data-placement="bottom" class="btn btn-sm btn-warning"><i class="fas fa-recycle"></i></button>
                                            </form>
                                            <form  id="delete-form-{{ $link->id }}" action="{{ route('permanent-delete-record', ['table' => 'link', 'id' => $link->id]) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('delete')
                                                <button onclick="deleteData({{ $link->id }})" type="button" data-placement="bottom" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody> --}}
                                <tbody>
                                    @if ($deletedData->isEmpty())
                                    <tr>
                                        <td colspan="12" style="color: red; font-size: 1rem; text-transform: uppercase">Recycle bin is empty.</td>
                                    </tr>
                                @else
                                    @foreach ($deletedData as $record)
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
                                                    <button onclick="restoreData({{ $record->id }})" type="button" data-placement="bottom" class="btn btn-sm btn-warning"><i class="fas fa-recycle"></i></button>
                                                </form>
                                                <form id="delete-form-{{ $record->id }}" action="{{ route('permanent-delete-record', ['table' => $record->getTable(), 'id' => $record->id]) }}" method="post" style="display: inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button onclick="deleteData({{ $record->id }})" type="button" data-placement="bottom" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            
                            {{-- <div class="d-flex justify-content-end">
                                {!! $advisories->links() !!}
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
