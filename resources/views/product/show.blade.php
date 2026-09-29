@extends('layouts.app')
@section('title', $viewData['product']->getName() . ' - ' . __('Online Store'))
@section('subtitle', $viewData['product']->getName() . ' - ' . __('Product information'))
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    @if ($viewData['product']->getPrice() > 80)
                        <span style="color: red;">{{ $viewData['product']->getName() }}</span>
                    @else
                        {{ $viewData['product']->getName() }}
                    @endif
                </h5>
                <p class="card-text"><strong>{{ __('Price') }}:</strong> ${{ $viewData['product']->getPrice() }}</p>
                <p class="card-text">
                    <strong>{{ __('Comments') }}:</strong><br/>
                    @foreach($viewData['product']->getComments() as $comment)
                        - {{ $comment->getDescription() }}<br />
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

