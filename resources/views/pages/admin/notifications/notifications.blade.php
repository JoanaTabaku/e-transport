@extends('layouts.default')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Manage Notifications</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <div class="d-flex align-items-center justify-content-end">
                <a href="{{route('admin.new.notification')}}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Add new notification</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>From</th>
                            <th>To User</th>
                            <th>Message</th>
                            <th>Sent Date</th>
                            <th>Is Read</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notifications as $notification)
                            <tr>
                                <td>{{$notification->id}}</td>
                                <td>{{$notification->sender->firstname}} {{$notification->sender->lastname}}</td>
                                <td>{{$notification->receiver->firstname}} {{$notification->receiver->lastname}}</td>
                                <td>{{$notification->message}}</td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($notification->sent_date)) }}</td>
                                <td>{{$notification->is_read ? 'Yes' : 'No'}}</td>
                                <td style="width: 200px">
                                    <div class="d-flex justify-content-center align-center" style="gap:10px">
                                        <a href="{{route('admin.view.notification', $notification->id)}}" class="btn btn-info btn-icon-split">
                                            <span class="text">View</span>
                                        </a>
                                        <a href="{{route('admin.edit.notification', $notification->id)}}" class="btn btn-warning btn-icon-split">
                                            <span class="text">Edit</span>
                                        </a>
                                        <a href="{{ route('admin.delete.notification', $notification->id) }}" id="delete-notification" class="btn btn-danger btn-icon-split"
                                            onclick="return confirm('Are you sure you want to delete this notification?');">
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
