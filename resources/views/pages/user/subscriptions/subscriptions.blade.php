@extends('layouts.default')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Buy Subscriptions</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                @foreach ($subscriptions as $subscription)
                    <div class="col-md-6">
                        @include('pages.user.subscriptions.partials.single', ['subscription' => $subscription])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop
