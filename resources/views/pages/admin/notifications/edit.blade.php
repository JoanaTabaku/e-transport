@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">Edit Notification</h1>
        <div class="row justify-content-start">
            <div class="col-5">
                <form method="POST" action="{{ route('admin.edit.notification', $notification->id) }}">
                    @csrf
                    <div class="card shadow mb-4 pl-0" style="">
                        <div class="card-body d-flex flex-column" style="gap: 10px; padding: 50px 50px">
                            <div class="form-group">
                                <label for="name">Notification Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $notification->name) }}" aria-describedby="name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ old('price', $notification->price) }}" aria-describedby="price">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ old('description', $notification->description) }}" aria-describedby="description">
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="duration_in_days">Expires in (days)</label>
                                <input type="text" class="form-control @error('duration_in_days') is-invalid @enderror" name="duration_in_days" id="duration_in_days" value="{{ old('duration_in_days', $notification->duration_in_days) }}" aria-describedby="duration_in_days">
                                @error('duration_in_days')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" id="role">
                                    <option value="">Select a role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role_id', $notification->role_id) == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer" style="padding: 20px 50px">
                            <div class="actions">
                                <div class="d-flex justify-content-center align-center" style="gap:10px">
                                    <a href="{{ route('admin.notifications') }}" class="btn btn-info btn-icon-split">
                                        <span class="text">Go back</span>
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-icon-split">
                                        <span class="text">Save</span>
                                    </button>
                                    <a href="{{ route('admin.delete.notification', $notification->id) }}" id="delete-notification" class="btn btn-danger btn-icon-split"
                                        onclick="return confirm('Are you sure you want to delete this notification?');">
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
