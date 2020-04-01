@extends('layouts.app')
@section('content')



<div class="container-global">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header ">
    <a><i class="icono fas fa-user-cog"></i> Matricular Alumno</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('alumnosmatricula.store') }}" id="form" >
        {!!csrf_field() !!}
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="label inputEmail4">Nombres</label>
                    <input type="text" class="form-control" id="inputNombres" name="nombres" value="{{ old('nombres') }}" placeholder="Ingresa tus nombres"required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 30]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('nombres','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">Apellidos</label>
                    <input type="text" class="form-control" id="inputApellidos" name="apellidos" value="{{ old('apellidos') }}" placeholder="Ingresa tus apellidos"required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 30]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('apellidos','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group col-md-3">
                    <label for="inputDocumento">Documento</label>
                    <input type="text" class="form-control" id="inputDocumento" name="documento" value="{{ old('documento') }}" placeholder="Ingresa el numero"required data-parsley-length="[8, 10]" data-parsley-type="digits" data-parsley-trigger="keyup" />
                    {!!$errors->first('documento','<span class=error>:message</span>')!!}
                </div>
                
                
                <div class="form-group col-md-3">
                        <label for="inputPerfil">Tipo de Documento</label>
                        <select id="inputPerfil" class="form-control" name="id_tipoDocumento"required data-parsley-required data-parsley-trigger="keyup">
                        <option value="" selected>Seleccionar...</option>
                            @foreach ($tipoDeDocumentoo as $tipo => $Tipo)
                                <option value="{{ $tipo }}" {{ old('id_tipoDocumento') }} > {{$Tipo }} </option>
                                {!!$errors->first('id_tipoDocumento','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputAddress">Lugar de Residencia</label>
                    <input type="text" class="form-control" id="inputlugarDeResidencia" name="lugarDeResidencia" value="{{ old('lugarDeResidencia') }}" placeholder="ingresa el lugar de residencia"required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 40]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('lugarDeResidencia','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCity">Direccion</label>
                    <input type="text" class="form-control" id="inputDireccion" name="direccion" value="{{ old('direccion') }}" placeholder="Ingresa la direccion de residencia"required data-parsley-pattern="/(^[A-Za-z0-9 ]+$)+/" data-parsley-length="[5, 40]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('direccion','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group col-md-3">
                    <label for="inputTelefono">Telefono</label>
                    <input type="text" class="form-control" id="inputTelefono" name="telefono" value="{{ old('telefono') }}" placeholder="Ingresa el numero de telefono"required data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-type="digits" data-parsley-trigger="keyup" />
                    {!!$errors->first('telefono','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCity">FechaDeNacimiento</label>
                    <input type="date" class="form-control" id="inputDireccion" name="fechaDeNacimiento" value="{{ old('fechaDeNacimiento') }}" placeholder="Ingresa la fecha de nacimiento" data-parsley-required  data-parsley-trigger="keyup"  />
                    {!!$errors->first('direccion','<span class=error>:message</span>')!!}
                </div>
            </div>
            
            
            <div class="form-row">     
            </div>


            <div class="form-row">
                
                
                <div class="form-group col-md-3">
                    <label for="inputCity">Tipo de Sangre</label>
                        <select id="inputParentesco" class="form-control" name="id_factorRH" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($factorrhh as $factorrh =>$Factor)
                                <option value="{{ $factorrh }}" {{ old('id_factorRH') }} > {{$Factor }} </option>
                                {!!$errors->first('id_factorRH','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                
                
                <div class="form-group col-md-3">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" value="{{ old('email') }}" placeholder="Ingresa tu email"required data-parsley-type="email" data-parsley-maxlength="50" data-parsley-trigger="keyup"  />
                    {!!$errors->first('email','<span class=error>:message</span>')!!}  
                </div>


                <div class="form-group col-md-3">
                    <label for="inputEPS">Eps</label>
                        <select  class="eps js-states form-control"  name="id_eps" required data-parsley-required data-parsley-trigger="keyup">
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($epss  as $eps => $EPS)
                                <option value="{{ $eps }}" {{ old('id_eps') }} > {{$EPS }} </option>
                                {!!$errors->first('EPS','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                        <script type="text/javascript" >
				  		  	$(document).ready(function() {

    						$('.eps').select2();
                            $("#mySelect").select2();

    						$(".eps").select2({
                            theme: "classic",							  
                            });
                            

							});
				  		  </script>
                </div>

                <div class="form-group col-md-3">
                    <label for="inputAreaDeEstudio">Lugar de nacimiento</label>
                        <select id="mySelect" class="variable js-states form-control"  name="id_lugarDeNacimiento" required data-parsley-required data-parsley-trigger="keyup">
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($lugarDeNacimientoo  as $lugarDeNacimiento => $Lugar)
                                <option value="{{ $lugarDeNacimiento }}" {{ old('id_lugarDeNacimiento') }} > {{$Lugar }} </option>
                                {!!$errors->first('lugarDeNacimiento','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                        <script type="text/javascript" >
				  		  	$(document).ready(function() {

    						$('.variable').select2();
                            $("#mySelect").select2();

    						$(".variable").select2({
                            maximumSelectionLength: 2,
                            theme: "classic"							  
                            });
                            

							});
				  		  </script>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEPS">Grado al que ingresa</label>
                        <select  class="grado js-states form-control"  name="id_grado" required data-parsley-required data-parsley-trigger="keyup">
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($gradoo  as $grado => $Grado)
                                <option value="{{ $grado }}" {{ old('id_grado') }} > {{$Grado }} </option>
                                {!!$errors->first('id_grado','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                        <script type="text/javascript" >
				  		  	$(document).ready(function() {

    						$('.grado').select2();
                            $("#mySelect").select2();

    						$(".grado").select2({
                            theme: "classic",							  
                            });
                            

							});
				  		  </script>
                </div>


                
            </div>

            <div class="form-row">   
            </div>


            <div class="form-row">
            </div>
            
            <button type="submit" class="btn btn-success btn-sm btn-block">Crear Estudiante</button> 
        </form> 
      </div>
  </div>
</div>

@endsection