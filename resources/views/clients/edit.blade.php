@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('message') }}</strong>
            @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Cliente</div>
                <div class="card-body">
                <form action="{{ url('clients/'.$client->id)}}" method="POST">
                   
                    <div class="form-group">
                        <label for="nameclient">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$client->nombre}}" required>
                    </div>

                    <div class="form-group">
                        <label for="dirclient">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{$client->direccion}}" required>
                    </div>

                    <div class="form-group">
                        <label for="telclient">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{$client->telefono}}" required>
                    </div>

                    <div class="form-group">
                        <label for="tipoclient">Tipo Cliente</label>
                            <select class="form-control" id="tipoCliente" name="tipoCliente" value="{{$client->tipoCliente}}" required>
                                <option value="Mayoritario">Mayoritario</option>
                                <option value="Minoritario">Minoritario</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="paisclient">País</label>
                        <input type="text" class="form-control" id="pais" name="pais" value="{{$client->pais}}" required>
                    </div>

                    <div class="form-group">
                        <label for="deptoclient">Departamento</label>
                        <input type="text" class="form-control" id="departamento" name="departamento" value="{{$client->departamento}}" required>
                    </div>

                    <div class="form-group">
                        <label for="ciudadclient">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{$client->ciudad}}" required>
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-success">Editar</button>
                        <a href="{{url('clients')}}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
