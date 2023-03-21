@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Creación de Categoría</h2>
    <form method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input required type="text" class="form-control" id="name" name="name" />
        </div>
        <button type="submit" class="btn btn-success mt-2">Crear</button>
    </form>
</div>
@endsection