@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">Edit Role</h1>
        <div class="row justify-content-start">
            <div class="col-5">
                <form method="POST" action="{{ route('admin.edit.role', $role->id) }}">
                    @csrf
                    <div class="card shadow mb-4 pl-0" style="">
                        <div class="card-body d-flex flex-column" style="gap: 10px; padding: 50px 50px">
                            <div class="form-group">
                                <label for="role-name">Role Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="role-name" value="{{ old('name', $role->name) }}" aria-describedby="roleNameHelp">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer" style="padding: 20px 50px">
                            <div class="actions">
                                <div class="d-flex justify-content-center align-center" style="gap:10px">
                                    <a href="{{ route('admin.roles') }}" class="btn btn-info btn-icon-split">
                                        <span class="text">Go back</span>
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-icon-split">
                                        <span class="text">Save</span>
                                    </button>
                                    <a href="{{ route('admin.delete.role', $role->id) }}" id="delete-role" class="btn btn-danger btn-icon-split"
                                        onclick="return confirm('Are you sure you want to delete this role?');">
                                        <span class="text">Delete</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
