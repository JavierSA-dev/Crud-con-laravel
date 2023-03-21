@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Creación de Todo</h2>
    <form method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input required type="text" class="form-control" id="title" name="title" />
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea required class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="categorias">Categorías</label>
            <select class="form-control" id="categorias" name="categorias">
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->name }}">{{ $categoria->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Correo de usuario</label>
            <select class="form-control" id="user_email" name="user_email">
                @foreach ($users as $user)
                <option value="{{ $user->email }}">{{ $user->email }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-2">Crear</button>
    </form>
</div>

@endsection