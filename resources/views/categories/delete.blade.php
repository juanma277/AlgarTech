@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">¿Seguro que desesar eliminar la Categoría?</div>
                <div class="card-body">
                <form action="{{ url('categories/'.$categorie->id)}}" method="POST">
                    <div class="form-group">
                        <label for="nameCategorie">Nombre Categoría</label>
                        <input type="text" class="form-control" disabled id="name" name="name" value="{{$categorie->name}}" required>
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        <a href="{{url('categories')}}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
