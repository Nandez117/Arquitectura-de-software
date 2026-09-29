@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="container mt-5">
    <h2>Registrar Humano</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('humans.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Cantidad de Aura:</label>
            <input type="number" name="aura" class="form-control" value="{{ old('aura') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jerarquía:</label>
            <select name="hierarchy" class="form-select" required>
                <option value="común">común</option>
                <option value="moderado">moderado</option>
                <option value="legendario">legendario</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="{{ route('humans.home') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection