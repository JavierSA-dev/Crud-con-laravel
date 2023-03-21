@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Administración de Usuarios</h2>
    <div class="row justify-content-center">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->profile }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="fa-solid fa-pencil" style="color: #ffffff;"></i></a>
                        <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></a>
                    </td>
                </tr>
                @endforeach

    </div>
    @endsection