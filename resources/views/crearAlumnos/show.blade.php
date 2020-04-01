@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
  	<div class="col-auto">
      @if (session()->has('infoCreate'))
		    <div class="alert alert-primary mt-1 text-center" style="width: 900px" id="alerta" >
          <strong>Aviso: </strong>{{ session('infoCreate') }}
          <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
            <span arial-hidden="true"> &times; </span>
          </button>
	      </div>
		  @endif
		  @if (session()->has('infoDelete'))
		    <div class="alert alert-primary mt-1 text-center" style="width: 900px" id="alerta" >
          <strong>Aviso: </strong>{{ session('infoDelete') }}
          <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
            <span arial-hidden="true"> &times; </span>
          </button>
	      </div>
		  @endif
	  </div>	
  </div>
</div>
<div class="container-global">
<!-- <td>{{ $var = request()->path() }}</td> -->


  <div class="card  mr-3 ml-0 mt-3 text-center" >
    <div class="card-header ">
    <a><i class="icono fas fa-user-cog"></i> PreMatricula </a>
    </div>
    <div class="card-body text-center">
       
        <form method="POST" action="{{ route('matricula.store') }}" id="form" >
        {!!csrf_field() !!}
            
            <input type="hidden" name="id_alumno"
						value="{{ $crearAlumno->id_alumno  }}">
            {!!$errors->first('id_alumno','<span class=error>:message</span>')!!}

            <input type="hidden" name="id_responsable"
						value="{{ Auth::user()->id_responsable }}"> 

            <div class="row justify-content-center ">
                <div class="col-md-6 mt-4">
                    <label for="inputCity">Año al que se va a matricular </label>
                    <select id="inputParentesco" class="form-control" name="id_añoElectivo" required data-parsley-required data-parsley-trigger="keyup" >
                        <option value="" selected>Seleccionar...</option>
                          @foreach ($añoElectivoo as $año =>$AñoElectivoo)
                                <option value="{{ $año }}" {{ old('id_añoElectivo') }} > {{$AñoElectivoo }} </option>
                                {!!$errors->first('id_añoElectivo','<span class=error>:message</span>')!!}
                          @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
            </div>
            
            <button type="submit" class="btn btn-success btn-sm mt-4 btn-block">Matricular Estudiante</button> 
        </form> 
      </div>
      
    </div>
    <div class="card-footer text-muted text-center">
    <h6 class="card-title"><p class="card-text"><small class="text-muted">{{ $crearAlumno->nombres }} {{ $crearAlumno->apellidos }}</small></p></h6>
    </div>




</div>

@endsection