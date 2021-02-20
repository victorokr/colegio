@extends('layouts.app')
@section('content')

<div class="container-angosto">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header ">
      <a><i class="icono  fas fa-folder-open"></i> Asignaturas a Evaluar</a>
    </div>
    <div class="card-body">
          
          <form method="GET" action="{{ route('asignaturas.index') }}">
          
              <div class="row mt-1">
                  <div class="col-sm">
                      <input type="text" class="form-control mb-2" value="{{ request('asignatura')}}" id="prueba" name="asignatura" placeholder="Filtrar por asignatura">
                  </div>
                  <div class="col-sm">
                      <button type="submit" class="btn btn-primary mt-0 ml-0 mr-0 " data-tippy-content="Buscar"><i class="fas fa-search"></i></button>
                      <a href="{{ url('lista/asignaturas') }}"   class="btn btn-light mt-0 ml-0 "data-tippy-content="restablecer"><i class="fas fa-reply"></i></a>
                  </div>
                  <div class="col-sm">
                  <a href="{{ url('lista/asignaturas/create') }}" class="btn btn-primary mt-0 ml-0 mr-0 btn-sm"style="float:right;"><i class="fas fa-plus-circle"></i> Crear Asignatura</a>
                  </div>
              </div>
          
          </form>
              
          
          <div class="table-responsive">  
            <table class="table table-sm table-hover table-striped  mt-2">
            <caption> Asignaturas</caption>
            <thead >
                <tr>
                <th scope="col">Acciones</th>
                <th scope="col">Asignatura</th>
                <th scope="col">Docente</th>
                <th scope="col">Salon</th>
                
                </tr>
            </thead>
              <tbody>
                @forelse ($listaCursos as $listaCurso)
                <tr>
                    <td>
                      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-3" role="group" aria-label="First group">
                            
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                            <a class="editar btn btn-info btn-sm" data-tippy-content="editar" href="{{ route('listado.edit', $listaCurso->id_listado) }} "><i class="fas fa-edit"></i></a>
                        </div>
                        <div class="btn-group ml-2" role="group" aria-label="Third group">
                            <a class="editar btn btn-primary btn-sm" data-tippy-content="asignar logros" href="{{ route('listado.edit', $listaCurso->id_listado) }} "><i class="fas fa-edit"></i></a>
                        </div>
                        <div class="btn-group ml-3" role="group" aria-label="Third group">
                            <a class="editar btn btn-success btn-sm" data-tippy-content="calificar" href="{{ route('listado.edit', $listaCurso->id_listado) }} "><i class="fas fa-edit"></i></a>
                        </div>
                      </div>
                    </td> 
                   
                    <td>{{ optional($listaCurso->asignatura)->asignatura }} </td>
                    <td>{{ optional($listaCurso->docente)   ->nombres }} </td>
                    <td>{{ optional($listaCurso->curso)     ->salon }} </td>
                   
                    
                    @empty
					          <div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{ $listaCursos->render() }} {{-- paginacion --}}
          </div>

          
			    

           
    </div>
  </div>
</div>

@endsection