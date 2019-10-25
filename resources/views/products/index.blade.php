@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mantenimiento de Productos
                    <div class="text-right">
                        <a class="btn btn-primary" href="{{url('products/create')}}" role="button">Crear</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">CATEGORIA</th>
                                <th scope="col">NOMBRE</th>
                                <th scope="col">CANTIDAD</th>
                                <th scope="col">ACCIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->categoria }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <a href="{{url('products/'.$product->id.'/edit')}}">Editar</a>
                                    <a href="{{url('products/'.$product->id)}}">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
