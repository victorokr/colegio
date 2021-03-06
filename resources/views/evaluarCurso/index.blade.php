@extends('layouts.app')
@section('content')


<div class="container-angosto">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header ">
    <a><i class="icono  fas fa-folder-open"></i> Evaluar</a>
    </div>
    <div class="card-body">
          
          <form method="GET" action="{{ route('evaluar.index') }}">
          
              <div class="row mt-1">
                  
                  <div class="col-sm-2">
                  <input type="text" class="form-control form-control-sm mb-2" value="{{ request('cursoo')}}" id="prueba" name="cursoo" placeholder="busca por curso">
                  </div>
                  <div class="col-sm">
                      <button type="submit" class="btn btn-primary btn-sm mt-0 ml-0 mr-0 mb-2 " data-tippy-content="Buscar"><i class="fas fa-search"></i></button>
                      <a href="{{ url('evaluar') }}"   class="btn btn-light btn-sm mt-0 ml-0 mb-2 "data-tippy-content="restablecer"><i class="fas fa-reply"></i></a>
                  </div>
                  <div class="col-sm">
                 
                  </div>
              </div>
          
          </form>
              
          
          <div class="table-responsive">  
            <table class="table table-sm table-hover table-striped  mt-2">
            <caption> Matriculas</caption>
            <thead >
                <tr>
                <th scope="col">Acciones</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Curso</th>
                </tr>
            </thead>
              <tbody>
                @forelse ($listaCursos as $listaCurso)
                <tr>
                    <td>
                      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                         

                            
                        </div>
                      </div>
                    </td> 
                   
                    <td>{{ optional($listaCurso->alumno)->nombres }}</td>
                    
                    <td>{{ optional($listaCurso->curso)->salon }}</td>
                    
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