@extends('layouts.default')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">My Notifications</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <div class="d-flex align-items-center justify-content-end">
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>Message</th>
                            <th>Sent Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notifications as $notification)
                            <tr>
                                <td>{{$notification->sender->firstname}} {{$notification->sender->lastname}}</td>
                                <td>{{$notification->message}}</td>
                                <td>{{date('d-m-Y', strtotime($notification->sent_date))}}</td>
                                <td style="width: 300px">
                                    <div class="d-flex justify-content-center align-center" style="gap:10px">
                                        @if($notification->is_read == null)
                                            <a href="{{ route('user.read.notification', $notification->id) }}" id="read-notification" class="btn btn-primary btn-icon-split">
                                                <span class="text">Mark as read</span>
                                            </a>
                                        @endif
                                        <a href="{{route('user.view.notification', $notification->id)}}" class="btn btn-info btn-icon-split">
                                            <span class="text">View</span>
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
