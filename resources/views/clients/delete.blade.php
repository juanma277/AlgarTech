@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">¿Seguro que desesar eliminar el Cliente?</div>
                <div class="card-body">
                <form action="{{ url('clients/'.$client->id)}}" method="POST">
                <div class="form-group">
                        <label for="nameclient">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$client->nombre}}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="dirclient">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{$client->direccion}}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="telclient">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{$client->telefono}}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="tipoclient">Tipo Cliente</label>
                        <input type="text" class="form-control" id="tipoCliente" name="tipoCliente" value="{{$client->tipoCliente}}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="paisclient">País</label>
                        <input type="text" class="form-control" id="pais" name="pais" value="{{$client->pais}}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="deptoclient">Departamento</label>
                        <input type="text" class="form-control" id="departamento" name="departamento" value="{{$client->departamento}}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="ciudadclient">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{$client->ciudad}}" disabled>
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        <a href="{{url('clients')}}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
