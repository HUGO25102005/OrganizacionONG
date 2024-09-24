@extends('Dashboard.master')

@section('titulo')
    @if (session()->has('nombre'))
        <h1>Bienvenido {{ session('nombre') }}</h1>
        <h2>Rol: {{ session('rol') }}</h2>
    @endif
@endsection