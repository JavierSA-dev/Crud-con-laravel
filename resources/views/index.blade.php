@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="container text-center">
        <h1>Bienvenido a mi CRUD con Laravel</h1>
        @guest
        <h4>Para poder crear, editar y eliminar categorías, debes iniciar sesión.</h4>
        @else
        <h4>Estas logueado como {{ Auth::user()->name }}</h4>
        @endguest
    </div>
</div>
@endsection