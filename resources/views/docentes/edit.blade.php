@extends('layouts.app')
@section('content')

<div class="container-global">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header ">
    <a><i class="icono fas fa-user-cog"></i> Editar Docentes</a>
    </div>
    <div class="card-body">
        <form method="POS" action="{{ route('docente.update', $listaDocentes->id_docente) }}">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="label inputEmail4">Nombres</label>
                    <input type="text" class="form-control" id="inputEmail4" name="nombres" value="{{ $listaDocentes->nombres }}" placeholder="Ingresa tus nombres"required>
                    {!!$errors->first('nombres','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Apellidos</label>
                    <input type="text" class="form-control" id="inputPassword4" name="apellidos" value="{{ $listaDocentes->apellidos }}" placeholder="Ingresa tus apellidos"required>
                    {!!$errors->first('apellidos','<span class=error>:message</span>')!!}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Lugar de Residencia</label>
                    <input type="text" class="form-control" id="inputAddress" name="lugarDeResidencia" value="{{ $listaDocentes->lugarDeResidencia }}" placeholder="ingresa el lugar de residencia"required>
                    {!!$errors->first('lugarDeResidencia','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group col-md-6">
                    
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email" value="{{ $listaDocentes->email }}" placeholder="Ingresa tu email"required>
                    {!!$errors->first('email','<span class=error>:message</span>')!!}  
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Contraseña</label>
                    <input type="password" class="form-control" id="inputPassword4" name="password" value="{{ $listaDocentes->password }}" placeholder="Ingresa el Password"required>
                    {!!$errors->first('email','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Confirmar contraseña</label>
                    <input type="password" class="form-control" id="inputPassword4" name="password_confirmation"  value="{{ $listaDocentes->password }}" placeholder="Ingresa el Password"required>
                    {!!$errors->first('email','<span class=error>:message</span>')!!}  
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Direccion</label>
                    <input type="text" class="form-control" id="inputCity" name="direccion" value="{{ $listaDocentes->direccion }}" placeholder="Ingresa la direccion de residencia"required>
                    {!!$errors->first('direccion','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group col-md-4">
                        <label for="inputState">Telefono</label>
                        <input type="text" class="form-control" id="inputZip" name="telefono" value="{{ $listaDocentes->telefono }}" placeholder="Ingresa el numero de telefono"required>
                        {!!$errors->first('telefono','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Documento</label>
                    <input type="text" class="form-control" id="inputZip" name="documento" value="{{ $listaDocentes->documento }}" placeholder="Ingresa el numero"required>
                    {!!$errors->first('documento','<span class=error>:message</span>')!!}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputCity">Escalafon</label>
                        <select id="inputState" class="form-control" name="id_escalafon" required >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($escalafonn as $escalafon =>$Escalafon)
                                <option value="{{ $escalafon }}" {{ old('id_escalafon',$listaDocentes->id_escalafon)== $escalafon ? 'selected':'' }} > {{$Escalafon }} </option>
                                {!!$errors->first('id_escalafon','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCity">Categoria</label>
                        <select id="inputState" class="form-control" name="id_categoria"required>
                        <option value="" selected>Seleccionar...</option>
                            @foreach ($categoriaa as $categoria => $Categoria)
                                <option value="{{ $categoria }}" {{ old('id_categoria',$listaDocentes->id_categoria)== $categoria ? 'selected':'' }} > {{$Categoria }} </option>
                                {!!$errors->first('id_categoria','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                <div class="form-group col-md-3">
                        <label for="inputState">Perfil</label>
                        <select id="inputState" class="form-control" name="id_perfil"required>
                        <option value="" selected>Seleccionar...</option>
                            @foreach ($perfill as $perfil => $Perfil)
                                <option value="{{ $perfil }}" {{ old('id_perfil',$listaDocentes->id_perfil)== $perfil ? 'selected':'' }} > {{$Perfil }} </option>
                                {!!$errors->first('id_perfil','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputZip">Nivel</label>
                        <select id="inputState" class="form-control" name="id_nivel"required>
                        <option value="" selected>Seleccionar...</option>
                            @foreach ($nivell as $nivel => $Nivel)
                                <option value="{{ $nivel }}" {{ old('id_nivel',$listaDocentes->id_nivel)== $nivel ? 'selected':'' }} > {{$Nivel }} </option>
                                {!!$errors->first('id_nivel','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
              
          
        </form> 
      </div>
  </div>
</div>

@endsection