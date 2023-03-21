@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Editar Usuario {{$user->name}}</h2>
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">Correo</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="profile">Perfil</label>
            <select class="form-control" id="profile" name="profile">
                <option value="admin" {{ $user->profile == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $user->profile == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning mt-2">Guardar</button>
    </form>
</div>

@endsection