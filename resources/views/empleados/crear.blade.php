@extends('empleados.layout')
@section('content')

<div class="card" style="margin:40px">
  <div class="card-header"><h4>Añadir Empleado</h4></div>
    <div class="card-body">
        <form action="{{ url('empleados') }}" method="post">
            {!! csrf_field() !!}

            <label>Nombre</label></br>
            <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror"></br>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>Apellido</label></br>
             <input type="text" name="apellido" id="apellido" class="form-control @error('apellido') is-invalid @enderror"></br>
            @error('apellido')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>Cargo</label></br>
             <input type="text" name="cargo" id="cargo" class="form-control @error('cargo') is-invalid @enderror"></br>
            @error('cargo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>Departamento</label></br>
             <input type="text" name="departamento" id="departamento" class="form-control @error('departamento') is-invalid @enderror"></br>
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