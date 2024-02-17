@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">Edit Card</h1>
        <div class="row justify-content-start">
            <div class="col-5">
                <form method="POST" action="{{ route('admin.edit.card', $card->id) }}">
                    @csrf
                    <div class="card shadow mb-4 pl-0" style="">
                        <div class="card-body d-flex flex-column" style="gap: 10px; padding: 50px 50px">
                            <div class="form-group">
                                <label for="status">Card Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                                    <option value="">Select a status</option>
                                    @foreach($cardStatuses as $cardStatus)
                                        <option value="{{ $cardStatus }}" {{ old('status', $card->status) == $cardStatus ? 'selected' : '' }}>{{ $cardStatus }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer" style="padding: 20px 50px">
                            <div class="actions">
                                <div class="d-flex justify-content-center align-center" style="gap:10px">
                                    <a href="{{ route('admin.cards') }}" class="btn btn-info btn-icon-split">
                                        <span class="text">Go back</span>
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-icon-split">
                                        <span class="text">Save</span>
                                    </button>
                                    <a href="{{ route('admin.delete.card', $card->id) }}" id="delete-card" class="btn btn-danger btn-icon-split"
                                        onclick="return confirm('Are you sure you want to delete this card?');">
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
