@extends('layouts.app') 
@section('title', $title) 
@section('subtitle', $subtitle) 
@section('content') 
<div class="container"> 
  <div class="row"> 
    <div class="col-lg-4 ms-auto"> 
      <p class="lead"><strong>Author:</strong> {{ $author }}</p> 
      <p class="lead"><strong>Address:</strong> {{ $address }}</p> 
    </div> 
    <div class="col-lg-4 me-auto"> 
      <p class="lead"><strong>Phone:</strong> {{ $phone }}</p> 
    </div> 
  </div> 
</div> 
@endsection 
