@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Editar categoria</h2>
        <form method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input required type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" />
            </div>
            <button type="submit" class="btn btn-warning mt-2">Guardar</button>
        </form>
    </div>
@endsection
