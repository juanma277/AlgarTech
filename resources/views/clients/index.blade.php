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

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mantenimiento de Clientes
                    <div class="text-right">
                        <a class="btn btn-primary" href="{{url('clients/create')}}" role="button">Crear</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">NOMBRE</th>
                                <th scope="col">DIRECCION</th>
                                <th scope="col">TELEFONO</th>
                                <th scope="col">TIPO</th>
                                <th scope="col">PAÍS</th>
                                <th scope="col">DEPARTAMENTO</th>
                                <th scope="col">CIUDAD</th>
                                <th scope="col">ACCIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <th scope="row">{{ $client->id }}</th>
                                    <td>{{ $client->nombre }}</td>
                                    <td>{{ $client->direccion }}</td>
                                    <td>{{ $client->telefono }}</td>
                                    <td>{{ $client->tipoCliente }}</td>
                                    <td>{{ $client->pais }}</td>
                                    <td>{{ $client->departamento }}</td>
                                    <td>{{ $client->ciudad }}</td>
                                <td>
                                    <a href="{{url('clients/'.$client->id. '/edit')}}">Editar</a>
                                    <a href="{{url('clients/'.$client->id)}}">Eliminar</a>
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
