@extends('layouts.app')

@section('content')

<div class="fixed-bottom">
    <a href="{{route('categories.create')}}" class="btn btn-success m-3"><i class="fa-solid fa-plus" style="color: #ffffff;"></i></a>
</div>

<div class="container">
    <h2>Administración de Categorías</h2>
    <div class="row justify-content-center">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                @if($category->name !== 'Sin Categoría')
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-warning"><i class="fa-solid fa-pencil" style="color: #fff;"></i></a>
                        <a href="{{route('categories.destroy', $category->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></a>
                    </td>
                </tr>
                    @endif

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection