@extends('empleados.layout')
@section('content')
 
<div class="card" style="margin: 40px auto; width: 700px">
  <div class="card-header"><h4>Editar Empleado</h4></div>
    <div class="card-body">
        <form action="{{ url('empleados/' .$empleados->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$empleados->id}}" id="id" />

            <label>Nombre</label></br>
            <input type="text" name="nombre" id="nombre" value="{{$empleados->nombre}}" class="form-control @error('nombre') is-invalid @enderror"></br>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>Apellido</label></br>
            <input type="text" name="apellido" id="apellido" value="{{$empleados->apellido}}" class="form-control @error('apellido') is-invalid @enderror"></br>
            @error('apellido')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <label>Cargo</label></br>
            <input type="text" name="cargo" id="cargo" value="{{$empleados->cargo}}" class="form-control @error('cargo') is-invalid @enderror"></br>
            @error('cargo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <label>Departamento</label></br>
            <input type="text" name="departamento" id="departamento" value="{{$empleados->departamento}}" class="form-control @error('departamento') is-invalid @enderror"></br>
            @error('departamento')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="d-flex justify-content-center"> 
                <input type="submit" value="Aceptar" class="btn btn-outline-success" style="margin-right: 10px">
                <button type="button" onclick="window.location.href='{{ url('/empleados') }}'" class="btn btn-outline-danger ml-7">Cancelar</button></br>
            </div>
        </form>
  </div>
</div>
@stop