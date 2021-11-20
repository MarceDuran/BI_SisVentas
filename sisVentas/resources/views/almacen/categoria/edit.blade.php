@extends('layouts.admin')
@section('contenido')

<div class="row">
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar categoría {{$categoria->Nombre}}</h3>
      @if(count($errors)>0)

        <div class="alert alert-danger">
<ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
        </div>
    @endif


    

{!! Form::model($categoria,['method'=>'PATCH','route'=>['categoria.update',$categoria->IdCategoria]]) !!}
{!! Form::token() !!}

<label> Esta es una etiqueta</label>

<div class="form-group">
    <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" class="form-control" value="{{$categoria->Nombre}}" placeholder="Nombre">
      
</div>

<div class="form-group">
<label for="Descripcion">Descripción</label>
<input type="text" name="Descripcion" class="form-control" value="{{$categoria->Descripcion}}" placeholder="Descripcion">
</div>

<div class="form-group">
<button class="btn btn-primary" type="submit">Guardar</button>  
<button class="btn btn-danger" type="reset">Cancelar</button>  
</div>

{!! Form::close() !!}


    </div>
</div>


@endsection
