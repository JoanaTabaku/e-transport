@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">Edit Notification</h1>
        <div class="row justify-content-start">
            <div class="col-5">
                <form method="POST" action="{{ route('admin.edit.notification', $notification->id) }}">
                    @csrf
                    <div class="card shadow mb-4 pl-0" style="">
                        <div class="card-body d-flex flex-column" style="gap: 10px; padding: 50px 50px">
                            <div class="form-group">
                                <label for="to_user_id">Send to</label>
                                <select class="form-control @error('to_user_id') is-invalid @enderror" name="to_user_id" id="to_user_id">
                                    <option value="">Select a user</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ old('to_user_id', $notification->to_user_id) == $user->id ? 'selected' : '' }}>{{ $user->firstname }} {{ $user->lastname }}</option>
                                    @endforeach
                                </select>
                                @error('to_user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <input type="text" class="form-control @error('message') is-invalid @enderror" name="message" id="message" value="{{ old('message', $notification->message) }}" aria-describedby="message">
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer" style="padding: 20px 50px">
                            <div class="actions">
                                <div class="d-flex justify-content-center align-center" style="gap:10px">
                                    <a href="{{ route('admin.notifications') }}" class="btn btn-info btn-icon-split">
                                        <span class="text">Go back</span>
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-icon-split">
                                        <span class="text">Save</span>
                                    </button>
                                    <a href="{{ route('admin.delete.notification', $notification->id) }}" id="delete-notification" class="btn btn-danger btn-icon-split"
                                        onclick="return confirm('Are you sure you want to delete this notification?');">
                                        <span class="text">Delete</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
