@extends('layouts.default')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Manage Users</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <div class="d-flex align-items-center justify-content-end">
                <a href="{{route('admin.new.user')}}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Add new user</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->firstname}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->name}}</td>
                            <td style="width: 200px">
                                <div class="d-flex justify-content-center align-center" style="gap:10px">
                                    <a href="{{route('admin.view.user', $user->id)}}"
                                        class="btn btn-info btn-icon-split">
                                        <span class="text">View</span>
                                    </a>
                                    <a href="{{route('admin.edit.user', $user->id)}}"
                                        class="btn btn-warning btn-icon-split">
                                        <span class="text">Edit</span>
                                    </a>
                                    <a href="{{ route('admin.delete.user', $user->id) }}" id="delete-user"
                                        class="btn btn-danger btn-icon-split"
                                        onclick="return confirm('Are you sure you want to delete this user?');">
                                        <span class="text">Delete</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Pagination links -->
                <div class="d-flex justify-content-center" style="height: 100px;">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop