@extends('layouts.app')
@section('title', __('Image Storage - DI'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload image') }}</div>
                <div class="card-body">
                    <form action="{{ route('image.save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>{{ __('Image') }}:</label>
                            <input type="file" name="profile_image" class="form-control" />
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">{{ __('Submit') }}</button>
                    </form>
                    <img src="{{ URL::asset('storage/test.png') }}" class="img-fluid mt-3" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

