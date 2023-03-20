@extends('layouts.app')

@section('content')

<div class="container">
    <form method="POST">
        @csrf
        <form method="post">
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
            <label for="status">Correo de usuario</label>
            <select class="form-control" id="user_email" name="user_email">
                @foreach ($users as $user)
                <option value="{{ $user->email }}">{{ $user->email }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-2">Crear</button>
    </form>
    </form>
</div>

@endsection