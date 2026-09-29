@extends('layouts.app')
@section('title', __('Success - Online Store'))
@section('subtitle', __('Product status'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-success text-center">
                {{ __('Product created successfully!') }}
            </div>
        </div>
    </div>
</div>
@endsection

