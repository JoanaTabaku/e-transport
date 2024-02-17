@extends('layouts.default')
@section('content')
 <div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">View Notification</h1>
    <div class="row justify-content-start">
        <div class="col-5">
            <div class="card shadow mb-4 pl-0" style="">
                <div class="card-body d-flex flex-column" style="gap: 20px; padding: 80px 50px">
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h4 class="mb-0">Sender:</h4>
                        <p class="mb-0">{{$notification->sender->firstname}} {{$notification->sender->lastname}}</p>
                    </div>
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h4 class="mb-0">Message:</h4>
                        <p class="mb-0">{{$notification->message}}</p>
                    </div>
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h4 class="mb-0">Sent Date:</h4>
                        <p class="mb-0">{{ date('d-m-Y H:i:s', strtotime($notification->sent_date)) }}</p>
                    </div>
                </div>
                <div class="card-footer" style="padding: 20px 50px">
                    <div class="actions">
                        <div class="d-flex justify-content-center align-center" style="gap:10px">
                            @if($notification->is_read == null)
                                <a href="{{ route('user.read.notification', $notification->id) }}" id="read-notification" class="btn btn-primary btn-icon-split">
                                    <span class="text">Mark as read</span>
                                </a>
                            @endif
                            <a href="{{route('user.notifications')}}" class="btn btn-info btn-icon-split">
                                <span class="text">Go back</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
@stop
