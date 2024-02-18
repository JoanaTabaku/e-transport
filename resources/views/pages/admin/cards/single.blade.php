@extends('layouts.default')
@section('content')
 <div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">View Card</h1>
    <div class="row justify-content-start">
        <div class="col-5">
            <div class="card shadow mb-4 pl-0" style="">
                <div class="card-body d-flex flex-column" style="gap: 20px; padding: 80px 50px">
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h4 class="mb-0">User:</h4>
                        <p class="mb-0">
                            <a href="{{route('admin.view.user', $card->user->id)}}" target="_blank">
                                {{$card->user->firstname}} {{$card->user->lastname}}
                            </a>
                        </p>
                    </div>
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h4 class="mb-0">Subsription Name:</h4>
                        <p class="mb-0">
                            <a href="{{route('admin.view.subscription', $card->subscriptionType->id)}}" target="_blank">
                                {{$card->subscriptionType->name}}
                            </a>
                        </p>
                    </div>
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h4 class="mb-0">Serial Number:</h4>
                        <p class="mb-0">{{$card->serial_number}}</p>
                    </div>
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h4 class="mb-0">Start Date:</h4>
                        <p class="mb-0">{{ date('d-m-Y', strtotime($card->start_date)) }}</p>
                    </div>
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h4 class="mb-0">End Date:</h4>
                        <p class="mb-0">{{ date('d-m-Y', strtotime($card->end_date)) }}</p>
                    </div>
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h4 class="mb-0">Status:</h4>
                        <p class="mb-0">{{$card->status}}</p>
                    </div>
                </div>
                <div class="card-footer" style="padding: 20px 50px">
                    <div class="actions">
                        <div class="d-flex justify-content-center align-center" style="gap:10px">
                            <a href="{{route('admin.cards')}}" class="btn btn-info btn-icon-split">
                                <span class="text">Go back</span>
                            </a>
                            {{-- <a href="{{route('admin.edit.card', $card->id)}}" class="btn btn-warning btn-icon-split">
                                <span class="text">Edit</span>
                            </a> --}}
                            <a href="{{ route('admin.delete.card', $card->id) }}" id="delete-card" class="btn btn-danger btn-icon-split"
                                onclick="return confirm('Are you sure you want to delete this card?');">
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
