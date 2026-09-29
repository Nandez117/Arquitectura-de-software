@extends('layouts.app')
@section('title', __('Cart - Online Store'))
@section('subtitle', __('Shopping Cart'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>{{ __('Available products') }}</h1>
            <ul>
                @foreach($viewData['products'] as $product)
                <li>
                    {{ __('Id') }}: {{ $product->getId() }} -
                    {{ __('Name') }}: {{ $product->getName() }} -
                    {{ __('Price') }}: {{ $product->getPrice() }} -
                    <a href="{{ route('cart.add', ['id'=> $product->getId()]) }}">{{ __('Add to cart') }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <h1>{{ __('Products in cart') }}</h1>
            <ul>
                @foreach($viewData['cartProducts'] as $product)
                <li>
                    {{ __('Id') }}: {{ $product->getId() }} -
                    {{ __('Name') }}: {{ $product->getName() }} -
                    {{ __('Price') }}: {{ $product->getPrice() }}
                </li>
                @endforeach
            </ul>
            <a href="{{ route('cart.removeAll') }}" class="btn btn-danger mt-2">{{ __('Remove all products from cart') }}</a>
        </div>
    </div>
</div>
@endsection

