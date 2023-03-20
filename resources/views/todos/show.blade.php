@extends('layouts.app')

@section('content')
@if (Auth::user()->role == 'admin')
<div class="fixed-bottom">
    <a href="{{ route('todos.create') }}" class="btn btn-success m-3">Crear</a>
</div>
@endif
<div class="container">
    <h2>Administración de Todos</h2>


    <div class="row justify-content-center">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Correo de usuario</th>
                    <th scope="col">Estado</th>
                    @if (Auth::user()->role == 'admin')
                    <th scope="col">Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                <tr>
                    <th scope="row">{{ $todo->id }}</th>
                    <td>{{ $todo->title }}</td>
                    <td>{{ $todo->description }}</td>
                    <td>{{ $todo->user_email }}</td>
                    <td>{{ $todo->status ? 'completada' : 'pendiente'  }}</td>
                    @if (Auth::user()->role == 'admin')
                    <td>
                        <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
    </div>
</div>
</div>
@endsection