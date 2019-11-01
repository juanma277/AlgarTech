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
                <div class="card-header">Crear Cliente</div>
                <div class="card-body">
                <form action="{{ url('clients') }}" method="POST">
                    <div class="form-group">
                        <label for="nameCategorie">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="nameCategorie">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>

                    <div class="form-group">
                        <label for="nameCategorie">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>

                    <div class="form-group">
                        <label for="nameCategorie">Tipo Cliente</label>
                            <select class="form-control" id="tipoCliente" name="tipoCliente" required>
                                <option value="Mayoritario">Mayoritario</option>
                                <option value="Minoritario">Minoritario</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nameCategorie">País</label>
                        <input type="text" class="form-control" id="pais" name="pais" required>
                    </div>

                    <div class="form-group">
                        <label for="nameCategorie">Departamento</label>
                        <input type="text" class="form-control" id="departamento" name="departamento" required>
                    </div>

                    <div class="form-group">
                        <label for="nameCategorie">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                        {{ csrf_field() }}
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-success">Crear</button>
                        <a href="{{url('clients')}}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
