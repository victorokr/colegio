@extends('layouts.app')
@section('content')



<div class="container-global">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header ">
    <a><i class="icono fas fa-user-cog"></i> Matricular Alumno</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('matricula.store') }}" id="form" >
        {!!csrf_field() !!}
            
        
            <div class="form-row">   
            </div>


            <div class="form-row">
            </div>
            
            <button type="submit" class="btn btn-success btn-sm btn-block">Crear Docente</button> 
        </form> 
      </div>
  </div>
</div>

@endsection