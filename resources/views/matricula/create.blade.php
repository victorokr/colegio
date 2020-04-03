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
<div class="container-angosto">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header ">
    <a><i class="icono  fas fa-folder-open"></i>  Renovar matricula de estudiantes antiguos</a>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('matricula.index') }}">
          
              <div class="row mt-1">
                  <div class="col-sm">
                      <input type="text" class="form-control mb-2" value="{{ request('nombres')}}" id="prueba" name="nombres" placeholder="Ingrese documento del estudiante">
                  </div>
                  <div class="col-sm">
                      <button type="submit" class="btn btn-primary mt-0 ml-0 mr-0 " title="Buscar"><i class="fas fa-search"></i></button>
                      <a href="{{ url('matricula') }}"   class="btn btn-light mt-0 ml-0 "title="restablecer"><i class="fas fa-reply"></i></a>
                  </div>
                  <div class="col-sm">
                  <a href="{{ url('crear/alumnosmatricula/create') }}" class="btn btn-primary mt-0 ml-0 mr-0 btn-sm"style="float:right;"><i class="fas fa-plus-circle"></i> PreMatricular estudiante</a>
                  </div>
              </div>
          
        </form>
          <div class="table-responsive">  
            <table class="table table-sm table-hover  mt-2">
            <caption> Matriculas</caption>
            <thead class="thead-light">
                <tr>
                <th scope="col">Acciones</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Estado de la Matricula</th>
                <th scope="col">Año Electivo</th>
                <th scope="col">Tipo de aspirante</th>
                
                </tr>
            </thead>
              <tbody>
                @forelse ($listaMatriculas as $listaMatricula)
                <tr>
                  <td>
                  <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                    </div>
                    

                        <a class="editar btn btn-info btn-sm" title="Editar" href="{{ route('matricula.edit', $listaMatricula->id_matricula) }} "><i class="fas fa-edit"></i></a>
                    </div>
                  </div>
                  </td>
                  
                  
                  <td>{{ optional($listaMatricula->alumno)->nombres }}</td>
                  <td>{{ optional($listaMatricula->estado)->estado }}</td>
                  <td>{{ optional($listaMatricula->añoElectivo)->añoElectivo }}</td>
                  <td>{{ optional($listaMatricula-> tipoDeAspirante)->tipoDeAspirante }}</td>
                  
                  @empty
					          <div class="alert alert-info">No se encontraron resultados en nuestros registros, por favor realiza la pre matricula del estudiante</div>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{ $listaMatriculas->links() }} {{-- paginacion --}}
          </div>
           
      </div>
  </div>
</div>

@endsection