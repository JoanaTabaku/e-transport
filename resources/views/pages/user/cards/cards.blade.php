@extends('layouts.default')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">My Cards</h1>

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
                            <th>Subsription Name</th>
                            <th>Serial Number</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cards as $card)
                            <tr>
                                <td>
                                    <a href="{{route('user.subscriptions')}}" target="_blank">
                                        {{$card->subscriptionType->name}}
                                    </a>
                                </td>
                                <td>{{$card->serial_number}}</td>
                                <td>{{ date('d-m-Y', strtotime($card->start_date)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($card->end_date)) }}</td>
                                <td class="@if($card->status == 'active') text-success font-weight-bold @else text-danger font-weight-bold @endif">{{$card->status}}</td>
                                <td style="width: 200px">
                                    <div class="d-flex justify-content-center align-center" style="gap:10px">
                                        <a href="{{route('user.view.card', $card->id)}}" class="btn btn-info btn-icon-split">
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
