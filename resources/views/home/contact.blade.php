@extends('layouts.app')
@section('title', __('Contact - Online Store'))
@section('subtitle', __('Contact us'))
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <p class="lead"><strong>{{ __('Name') }}:</strong> {{ $viewData['name'] }}</p>
            <p class="lead"><strong>{{ __('Address') }}:</strong> {{ $viewData['address'] }}</p>
            <p class="lead"><strong>{{ __('Phone') }}:</strong> {{ $viewData['phone'] }}</p>
        </div>
    </div>
</div>
@endsection

