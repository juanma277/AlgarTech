@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">¿Seguro que desesar eliminar el producto?</div>
                <div class="card-body">
                <form action="{{ url('products/'.$product->id)}}" method="POST">
                    <div class="form-group">
                        <label for="nameCategorie">Nombre Producto</label>
                        <input type="text" class="form-control" disabled id="name" name="name" value="{{$product->name}}" required>
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        <a href="{{url('products')}}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
