@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        	Administrar pizzas <a href="{{ url('pizza/create') }}" class="btn btn-primary float-right">Nueva pizza</a>
        </div>

        <div class="card-body">
            

            <table class="table table-bordered table-stripped mt-4">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>ingredientes</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($pizzas as $pizza)
                    <tr>
                        <td>{{ $pizza->id }}</td>
                        <td>{{ $pizza->name }}</td>
                        <td>{{ $pizza->description }}</td>
                        <td>{{ $pizza->value }}</td>
                        <td>
                            <a href="{{ route('pizza.edit', $product->id) }}" class="btn btn-success btn-sm">Editar</a> |
                            <form action="{{ route('pizza.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                            </form>

                    </tr>
                @endforeach
                </tbody>
            </table>

            
        </div>
    </div>
</div>

@endsection
