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

                         <!-- pasar id arreglo -->
                        <a href="#, array (
                                    'idAlumno' => ($listaCurso->alumno)->id_alumno,
                                    
                                    )
                                  )" 




                        class="btn btn-primary btn-sm pull-right"data-tippy-content="Calificar Alumno" data-toggle="modal" data-target="#create"><i class="fas fa-edit"></i></a>
                            
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
           



          <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Calificar Alumno {{ request ('nombres') }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="GET" action="{{ route('evaluar.store') }}"  id="form">
                    <div class="form-group">
                        <label class="asterisko">Nota1</label>
                        <input type="text" class="form-control form-control-sm" id="inputNota1" name="nota1" value="{{ old('nota1') }}" required data-parsley-length="[1, 3]" data-parsley-pattern="/^[\d]{0,11}(\.[\d]{1,2})?$/" data-parsley-min="1" data-parsley-max="5" data-parsley-trigger="keyup" />
                        {!!$errors->first('nota1','<span class=error>:message</span>')!!}
                    </div>
                    <div class="form-group">
                        <label class="asterisko">Nota2</label>
                        <input type="text" class="form-control form-control-sm" id="inputNota2" name="nota2" value="{{ old('nota2') }}" required data-parsley-length="[1, 3]" data-parsley-pattern="/^[\d]{0,11}(\.[\d]{1,2})?$/" data-parsley-min="1" data-parsley-max="5" data-parsley-trigger="keyup" />
                        {!!$errors->first('nota2','<span class=error>:message</span>')!!}
                    </div>
                    <div class="form-group">
                        <label class="asterisko">Nota3</label>
                        <input type="text" class="form-control form-control-sm" id="inputNota3" name="nota3" value="{{ old('nota3') }}" required data-parsley-length="[1, 3]" data-parsley-pattern="/^[\d]{0,11}(\.[\d]{1,2})?$/" data-parsley-min="1" data-parsley-max="5" data-parsley-trigger="keyup" />
                        {!!$errors->first('nota3','<span class=error>:message</span>')!!}
                    </div>
                    <div class="form-group">
                        <label class="asterisko">Nota4</label>
                        <input type="text" class="form-control form-control-sm" id="inputNota4" name="nota4" value="{{ old('nota4') }}" required data-parsley-length="[1, 3]" data-parsley-pattern="/^[\d]{0,11}(\.[\d]{1,2})?$/" data-parsley-min="1" data-parsley-max="5" data-parsley-trigger="keyup" />
                        {!!$errors->first('nota4','<span class=error>:message</span>')!!}
                    </div>
                    <div class="form-group">
                        <label class="asterisko">Nota5</label>
                        <input type="text" class="form-control form-control-sm" id="inputNota5" name="nota5" value="{{ old('nota5') }}" required data-parsley-length="[1, 3]" data-parsley-pattern="/^[\d]{0,11}(\.[\d]{1,2})?$/" data-parsley-min="1" data-parsley-max="5" data-parsley-trigger="keyup" />
                        {!!$errors->first('nota5','<span class=error>:message</span>')!!}
                    </div>
                    <div class="form-group">
                        <label class="asterisko">Nota6</label>
                        <input type="text" class="form-control form-control-sm" id="inputNota6" name="nota6" value="{{ old('nota6') }}" required data-parsley-length="[1, 3]" data-parsley-pattern="/^[\d]{0,11}(\.[\d]{1,2})?$/" data-parsley-min="1" data-parsley-max="5" data-parsley-trigger="keyup" />
                        {!!$errors->first('nota6','<span class=error>:message</span>')!!}
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Message:</label>
                      <textarea class="form-control" id="message-text"></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                  <button type="submit" class="btn btn-primary">Evaluar</button>
                </div>
              </div>
            </div>
          </div>





      </div>
  </div>
</div>

@endsection