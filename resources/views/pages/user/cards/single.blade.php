@extends('layouts.default')
@section('content')
 <div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">View Card</h1>
    <div class="row justify-content-start">
        <div class="col-5">
            <div class="card shadow mb-4 pl-0" style="">
                <div class="card-body d-flex flex-column" style="gap: 20px">
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h5 class="mb-0">Subsription Name:</h5>
                        <p class="mb-0">
                            <a href="{{route('user.subscriptions', $card->subscriptionType->id)}}" target="_blank">
                                {{$card->subscriptionType->name}}
                            </a>
                        </p>
                    </div>
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h5 class="mb-0">Serial Number:</h5>
                        <h5 class="mb-0">{{$card->serial_number}}</h5>
                    </div>
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h5 class="mb-0">Start Date:</h5>
                        <h5 class="mb-0">{{ date('d-m-Y', strtotime($card->start_date)) }}</h5>
                    </div>
                    <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
                        <h5 class="mb-0">End Date:</h5>
                        <h5 class="mb-0">{{ date('d-m-Y', strtotime($card->end_date)) }}</h5>
                    </div>
                    <div class="d-flex justify-content-between pb-4 @if($card->status == 'active') text-success font-weight-bold @else text-danger font-weight-bold @endif" style="border-bottom: 1px solid lightgray">
                        <h5 class="mb-0">Status:</h5>
                        <h5 class="mb-0">{{$card->status}}</h5>
                    </div>
                </div>
                <div class="card-footer" style="padding: 20px 50px">
                    <div class="actions">
                        <div class="d-flex justify-content-center align-center" style="gap:10px">
                            <a href="{{route('user.cards')}}" class="btn btn-info btn-icon-split">
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
