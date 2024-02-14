@extends('layouts.default')
@section('content')
 <div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">View Role</h1>
    <div class="row justify-content-start">
        <div class="col-5">
            <div class="card shadow mb-4 pl-0" style="">
                <div class="card-body d-flex flex-column" style="gap: 20px; padding: 80px 50px">
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h4 class="mb-0">ID:</h4>
                        <p class="mb-0">{{$role->id}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-0">Name:</h4>
                        <p class="mb-0">{{$role->name}}</p>
                    </div>
                </div>
                <div class="card-footer" style="padding: 20px 50px">
                    <div class="actions">
                        <div class="d-flex justify-content-center align-center" style="gap:10px">
                            <a href="{{route('admin.roles')}}" class="btn btn-info btn-icon-split">
                                <span class="text">Go back</span>
                            </a>
                            <a href="{{route('admin.edit.role', $role->id)}}" class="btn btn-warning btn-icon-split">
                                <span class="text">Edit</span>
                            </a>
                            <a href="{{route('admin.delete.role', $role->id)}}" id="delete-role" class="btn btn-danger btn-icon-split">
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