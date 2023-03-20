@extends('layouts.app')
<!-- edit view -->
@section('content')
<div class="container">
    <h2>Editar {{$todo->title}}</h2>
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $todo->title }}">
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $todo->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Estado</label>
            <select class="form-control" id="status" name="status">
                <option value="0" {{ $todo->status == 0 ? 'selected' : '' }}>Pendiente</option>
                <option value="1" {{ $todo->status == 1 ? 'selected' : '' }}>Completada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning mt-2">Guardar</button>
    </form>
</div>
@endsection