@extends('layouts.app')
@section('content')

<div class="container-global">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header ">
    <a><i class="icono fas fa-user-tie"></i>  Docentes</a>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('docente.index') }}">
          
              <div class="row mt-1">
                  <div class="col-sm">
                      <input type="text" class="form-control mb-2" value="{{ request('nombres')}}" id="prueba" name="nombres" placeholder="Ingrese un Nombre">
                  </div>
                  <div class="col-sm">
                      <button type="submit" class="btn btn-primary mt-0 ml-0 mr-0 " title="Buscar"><i class="fas fa-search"></i></button>
                      <a href="{{ url('docente') }}"   class="btn btn-light mt-0 ml-0 "title="restablecer"><i class="fas fa-reply"></i></a>
                  </div>
                  <div class="col-sm">
                  <a href="#" class="btn btn-primary mt-0 ml-0 mr-0 btn-sm"style="float:right;">Agregar Docente</a>
                  </div>
              </div>
          
        </form>
          <div class="table-responsive">  
            <table class="table table-sm table-hover  mt-2">
            <caption>Lista de Docentes</caption>
            <thead class="thead-light">
                <tr>
                <th scope="col">Acciones</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Documento</th>
                <th scope="col">Telefono</th>
                <th scope="col">Direccion</th>
                <th scope="col">Email</th>
                <th scope="col">LugarDeResidencia</th>
                <th scope="col">Escalafon</th>
                <th scope="col">Categoria</th>
                <th scope="col">Perfil</th>
                <th scope="col">Nivel</th>
                </tr>
            </thead>
              <tbody>
                @forelse ($listaDocentes as $listaDocente)
                <tr>
                  <td>
                  <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                      <button class="eliminar btn btn-danger btn-sm mr-3"data-toggle="modal" onclick="deleteData({{$listaDocente->id_docente}})" data-target="#delete"
								        title="Eliminar"><i class="fas fa-trash-alt"></i> </button>

                        <a class="editar btn btn-info btn-sm" title="Editar" href="{{ route('docente.edit', $listaDocente->id_docente) }} "><i class="fas fa-edit"></i></a>
                    </div>
                  </div>
                  </td>
                  <td>{{ $listaDocente->nombres }}</td>
                  <td>{{ $listaDocente->apellidos }}</td>
                  <td>{{ $listaDocente->documento }}</td>
                  <td>{{ $listaDocente->telefono }}</td>
                  <td>{{ $listaDocente->direccion }}</td>
                  <td>{{ $listaDocente->email }}</td>
                  <td>{{ $listaDocente->lugarDeResidencia }}</td>
                  <td>{{ optional($listaDocente->gradoEscalafon)->escalafon }}</td>
                  <td>{{ optional($listaDocente->categoria)->categoria }}</td>
                  <td>{{ optional($listaDocente->perfil)->perfil }}</td>
                  <td>{{ optional($listaDocente->nivel)->nivel }}</td>

                  @empty
					          <div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{ $listaDocentes->render() }} {{-- paginacion --}}
          </div> 
      </div>
  </div>
</div>

@endsection