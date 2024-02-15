@extends('layouts.default')
@section('content')
 <div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">View User</h1>
    <div class="row justify-content-start">
        <div class="col-5">
            <div class="card shadow mb-4 pl-0" style="">
                <div class="card-body d-flex flex-column" style="gap: 20px; padding: 80px 50px">
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h4 class="mb-0">ID:</h4>
                        <p class="mb-0">{{$user->id}}</p>
                    </div>
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h4 class="mb-0">First Name:</h4>
                        <p class="mb-0">{{$user->firstname}}</p>
                    </div>
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h4 class="mb-0">Last Name:</h4>
                        <p class="mb-0">{{$user->lastname}}</p>
                    </div>
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h4 class="mb-0">Email:</h4>
                        <p class="mb-0">{{$user->email}}</p>
                    </div>
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h4 class="mb-0">Role:</h4>
                        <p class="mb-0">{{$user->role->name}}</p>
                    </div>
                </div>
                <div class="card-footer" style="padding: 20px 50px">
                    <div class="actions">
                        <div class="d-flex justify-content-center align-center" style="gap:10px">
                            <a href="{{route('admin.users')}}" class="btn btn-info btn-icon-split">
                                <span class="text">Go back</span>
                            </a>
                            <a href="{{route('admin.edit.user', $user->id)}}" class="btn btn-warning btn-icon-split">
                                <span class="text">Edit</span>
                            </a>
                            <a href="{{ route('admin.delete.user', $user->id) }}" id="delete-user" class="btn btn-danger btn-icon-split"
                                onclick="return confirm('Are you sure you want to delete this user?');">
                                <span class="text">Delete</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
@stop
