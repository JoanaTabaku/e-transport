@extends('layouts.default')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Manage Subscriptions</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <div class="d-flex align-items-center justify-content-end">
                <a href="{{route('admin.new.subscription')}}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Add new subscription</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Duration in days</th>
                            <th>For role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscriptions as $subscription)
                            <tr>
                                <td>{{$subscription->id}}</td>
                                <td>{{$subscription->name}}</td>
                                <td>{{$subscription->price}}</td>
                                <td>{{$subscription->description}}</td>
                                <td>{{$subscription->duration_in_days}}</td>
                                <td>{{$subscription->role->name}}</td>
                                <td style="width: 200px">
                                    <div class="d-flex justify-content-center align-center" style="gap:10px">
                                        <a href="{{route('admin.view.subscription', $subscription->id)}}" class="btn btn-info btn-icon-split">
                                            <span class="text">View</span>
                                        </a>
                                        <a href="{{route('admin.edit.subscription', $subscription->id)}}" class="btn btn-warning btn-icon-split">
                                            <span class="text">Edit</span>
                                        </a>
                                        <a href="{{ route('admin.delete.subscription', $subscription->id) }}" id="delete-subscription" class="btn btn-danger btn-icon-split"
                                            onclick="return confirm('Are you sure you want to delete this subscription? This action will delete all associated records in the following tables: cards. This operation is irreversible.');">
                                            <span class="text">Delete</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
