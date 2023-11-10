@extends('layouts.main')
@section('content')

<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title">Users List</h4>
                </div>
                <div class="col-4 text-right">
                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create" data-bs-toggle="tooltip" data-bs-placement="top" title="Create"><i class="fas fa-plus-circle"></i></a>
                    <a href="{{ route('recyclebin') }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Recycle"><i class="fas fa-recycle"></i></a>
                </div>
            </div>
        </div>
    
       <div class="card-body">
        <div class="table-reponsive">
            <table class="table text-center table-striped table-hover shadow" id="usersTable">
                <thead class="bg-primary">
                    <tr>
                        <th>Profile Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @foreach ($users as $user)
                        <tr>
                            <td><img src="{{ asset('user_profile_images/' . $user->profile_image) }}" style="border-radius: 50%; height: 50px; width: 50px;"></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->position }}</td>
                            <td>
                                @foreach ($user->roles as $user_role) 
                                {{ $user_role->name }}
                                @endforeach
                            </td>
                            <td>
                                {{-- <a href="#" data-toggle="modal" id="user_edit_link" class="btn" data-target="#user_id{{ $user->id }}"><span class="text-warning fas fa-pen"></span></a>
                                <a href="#" data-toggle="modal" id="user_delete_link" class="btn" data-target="#delete_user_id{{ $user->id }}"><span class="text-danger fas fa-trash-alt"></span></a> --}}
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger">Action</button>
                                    <button type="button" class="btn btn-sm btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                      <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                      <li><a href="#" data-toggle="modal" id="user_edit_link" class="btn" data-target="#user_id{{ $user->id }}"><span class="text-warning fas fa-pen"></span> Edit</a></li>
                                      <li><a href="#" data-toggle="modal" id="user_delete_link" class="btn" data-target="#delete_user_id{{ $user->id }}"><span class="text-danger fas fa-trash-alt"></span> Delete</a></li>
                                    </ul>
                                </div>
                            </td>
    
                            <div class="modal fade" id="user_id{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('update-user/' . $user->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="container mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="" style="color:dimgray">Name:</label>
                                                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="" style="color:dimgray">Position</label>
                                                                <input type="text" class="form-control" name="position" value="{{ $user->position }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="" style="color:dimgray">Email</label>
                                                                <input type="text" class="form-control" name="email" value="{{ $user->email }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" style="color:dimgray">Password:</label>
                                                                <input type="password" class="form-control" name="password">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="role" style="color:dimgray">User Role</label>
                                                                <select name="role" id="role" class="form-select">
                                                                    @foreach ($user->roles as $user_role)
                                                                        <option value="{{ $user_role->id }}"selected>
                                                                            {{ $user_role->name }}</option>
                                                                    @endforeach
                                                                    @foreach ($roles as $role)
                                                                        <option value="{{ $role->id }}">
                                                                            {{ $role->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                           
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success"><span class="fas fa-save"></span> Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="modal fade" id="delete_user_id{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><span class="fas fa-exclamation-circle text-danger" style="font-size: 30px;"></span> </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{ url('delete_user/' . $user->id) }}" method="GET" enctype="multipart/form-data">
                                            @csrf
                                            @method('GET')
                                            <div class="container mx-auto">
                                                Are you sure you want to delete this permanently?
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">Delete Permanently</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       </div>
    </div>

    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Adding New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/add-user') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="container mx-auto">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" style="color:dimgray">Name:</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" style="color:dimgray">Position</label>
                                    <input type="text" class="form-control" name="position" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" style="color:dimgray">Email:</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" style="color:dimgray">Password:</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">

                                    <label for="role" style="color:dimgray">User Role</label>
                                    <select name="role" id="role" class="form-select">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><span class="fas fa-save"></span> Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script>
        setTimeout(function() {
            $(' .alert-dismissible').fadeOut('slow');
        }, 1000);
    </script>
    <script>
        $(document).ready( function () {
            $('#usersTable').DataTable({
                "lengthMenu" : [ [10, 25, 50, 100, 10000], [10, 25, 50, 100, "Max"] ],
                "pageLength" : 10,
            });
        });
    </script>
@endsection