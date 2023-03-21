@extends('layouts.app')

@section('content')
@if (Auth::user()->profile == 'admin')
<div class="fixed-bottom">
    <a href="{{ route('todos.create') }}" class="btn btn-success m-3"><i class="fa-solid fa-plus"></i></a>
</div>
@endif
<div class="container">
    <!-- container 50% 50% -->
    <div class="d-flex justify-content-between align-items-center">
        @if (Auth::user()->profile == 'admin')
        <h2>Administración de Todos</h2>
        @else
        <h2>Mis Todos</h2>
        @endif
        <form class="d-flex w-25 flex-wrap" action="{{ route('todos.show') }}" method="post">
            @csrf
            <div class="form-group w-100">
                <label for="categorias">Categorías</label>
                <select class="form-control w-100" id="categorias" name="categorias">
                    <option value="all">Todas</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->name }}" {{ $categoria->name == $selected ? 'selected' : '' }}>{{ $categoria->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
        </form>
    </div>
    <div class="row justify-content-center">
        @if (count($todos) == 0)
        <tr>
            <td colspan="7" class="text-center">No hay todos</td>
        </tr>
        @else
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Correo de usuario</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Estado</th>
                    @if (Auth::user()->profile == 'admin')
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
                    <td>{{ $todo->categorias }}</td>
                    <td>{{ $todo->status ? 'completada' : 'pendiente'  }}</td>
                    @if (Auth::user()->profile == 'admin')
                    <td>
                        <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning"><i class="fa-solid fa-pencil" style="color: #ffffff;"></i></a>
                        <a href="{{ route('todos.destroy', $todo->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></a>
                    </td>
                    @endif
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection