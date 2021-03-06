@extends('layouts.dashboard')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        	Administrar pizzas <a href="{{ url('pizza/create') }}" class="btn btn-primary float-right">Nueva pizza</a>
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
                        <td>{{ $pizza->ingredients }}</td>
                        <td><img src="{{ asset($pizza->picture) }}" alt="" width="90px"></td>
                        <td >
                            <a href="{{ route('pizza.edit', $pizza->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> |
                            <form action="{{ route('pizza.destroy', $pizza->id) }}" method="POST" class="float-right">
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
