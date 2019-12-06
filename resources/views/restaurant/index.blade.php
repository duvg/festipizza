@extends('layouts.dashboard')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        	Administrar restaurantes <a href="{{ url('restaurant/create') }}" class="btn btn-primary float-right">Nuevo restaurantes</a>
        </div>

        <div class="card-body">

            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success')}}
                </div>
            @endif
            <table class="table table-bordered table-stripped mt-4">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($restaurants as $restaurant)
                    <tr>
                        <td>{{ $restaurant->id }}</td>
                        <td>{{ $restaurant->name }}</td>
                        <td>{{ $restaurant->address }}</td>
                        <td>{{ $restaurant->telephone }}</td>
                        <td><img src="{{ asset($restaurant->picture) }}" alt="" width="90px"></td>
                        <td >
                            <a href="{{ route('restaurant.edit', $restaurant->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> |
                            <form action="{{ route('restaurant.destroy', $restaurant->id) }}" method="POST" class="float-right">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>

                            </form>

                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>

@endsection
