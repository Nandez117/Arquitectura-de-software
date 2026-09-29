@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="container text-center mt-5">
    <h1>Zona de Inicio de Humanos</h1>
    <p>Año 2050. Solo quedan humanos farmeadores de aura en la tierra.</p>
    <div class="mt-4">
        <a href="{{ route('humans.create') }}" class="btn btn-primary m-2">Registrar Humanos</a>
        <a href="{{ route('humans.index') }}" class="btn btn-secondary m-2">Listar Humanos</a>
        <a href="{{ route('humans.battle') }}" class="btn btn-danger m-2">Batalla de Humanos</a>
    </div>
</div>
@endsection