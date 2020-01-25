            {!!csrf_field() !!}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="label inputNombres">Nombres</label>
                    <input type="text" class="form-control" id="inputNombres" name="nombres" value="{{ $listaDocentes->nombres }}" placeholder="Ingresa tus nombres"required  data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 30]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('nombres','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group col-md-6">
                    <label for="inputApellidos">Apellidos</label>
                    <input type="text" class="form-control" id="inputApellidos" name="apellidos" value="{{ $listaDocentes->apellidos }}" placeholder="Ingresa tus apellidos"required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 30]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('apellidos','<span class=error>:message</span>')!!}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputLugar">Lugar de Residencia</label>
                    <input type="text" class="form-control" id="inputlugarDeResidencia" name="lugarDeResidencia" value="{{ $listaDocentes->lugarDeResidencia }}" placeholder="ingresa el lugar de residencia"required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 40]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('lugarDeResidencia','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group col-md-6">
                    
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" value="{{ $listaDocentes->email }}" placeholder="Ingresa tu email"required data-parsley-type="email" data-parsley-maxlength="50" data-parsley-trigger="keyup"  />
                    {!!$errors->first('email','<span class=error>:message</span>')!!}  
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña nuevamente"required data-parsley-pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/" data-parsley-minlength="8" data-parsley-trigger="keyup" />
                    <small id="passwordHelpInline" class="text-muted">
                        Min 8 caracteres 1 mayuscula 1 numero 
                    </small>
                    {!!$errors->first('password','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Confirmar contraseña</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  placeholder="Ingresa tu contraseña nuevamente"required data-parsley-equalto="#password" data-parsley-trigger="keyup" />
                    <small id="passwordHelpInline" class="text-muted">
                        Min 8 caracteres 1 mayuscula 1 numero 
                    </small>
                    {!!$errors->first('password_confirmation','<span class=error>:message</span>')!!}  
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputDireccion">Direccion</label>
                    <input type="text" class="form-control" id="inputDireccion" name="direccion" value="{{ $listaDocentes->direccion }}" placeholder="Ingresa la direccion de residencia"required data-parsley-pattern="/(^[A-Za-z0-9 ]+$)+/" data-parsley-length="[5, 40]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('direccion','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group col-md-4">
                        <label for="inputTelefono">Telefono</label>
                        <input type="text" class="form-control" id="inputTelefono" name="telefono" value="{{ $listaDocentes->telefono }}" placeholder="Ingresa el numero de telefono"required data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-type="digits" data-parsley-trigger="keyup" />
                        {!!$errors->first('telefono','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group col-md-2">
                    <label for="inputDocumento">Documento</label>
                    <input type="text" class="form-control" id="inputDocumento" name="documento" value="{{ $listaDocentes->documento }}" placeholder="Ingresa el numero"required data-parsley-length="[8, 10]" data-parsley-type="digits" data-parsley-trigger="keyup" />
                    {!!$errors->first('documento','<span class=error>:message</span>')!!}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputEscalafon">Escalafon</label>
                        <select id="inputEscalafon" class="form-control" name="id_escalafon" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($escalafonn as $escalafon =>$Escalafon)
                                <option value="{{ $escalafon }}" {{ old('id_escalafon',$listaDocentes->id_escalafon)== $escalafon ? 'selected':'' }} > {{$Escalafon }} </option>
                                {!!$errors->first('id_escalafon','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                
                <div class="form-group col-md-2">
                        <label for="inputPerfil">Perfil</label>
                        <select id="inputPerfil" class="form-control" name="id_perfil"required data-parsley-required data-parsley-trigger="keyup">
                        <option value="" selected>Seleccionar...</option>
                            @foreach ($perfill as $perfil => $Perfil)
                                <option value="{{ $perfil }}" {{ old('id_perfil',$listaDocentes->id_perfil)== $perfil ? 'selected':'' }} > {{$Perfil }} </option>
                                {!!$errors->first('id_perfil','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputNivel">Nivel</label>
                        <select id="inputNivel" class="form-control" name="id_nivel"required data-parsley-required data-parsley-trigger="keyup">
                        <option value="" selected>Seleccionar...</option>
                            @foreach ($nivell as $nivel => $Nivel)
                                <option value="{{ $nivel }}" {{ old('id_nivel',$listaDocentes->id_nivel)== $nivel ? 'selected':'' }} > {{$Nivel }} </option>
                                {!!$errors->first('id_nivel','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                <div class="form-group col-md-5">
                    <label for="inputEstudios">Estudios</label>
                        <select id="inputEstudios" class="form-control" name="areaDeEstudio[]"required data-parsley-required data-parsley-trigger="keyup">
                        <option value="" selected>Seleccionar...</option>
                            @foreach ($areaDeEstudioo as $area => $Nombre)
                                <option value="{{ $area }}" {{ $listaDocentes->areaDeEstudio->pluck('id_areaDeEstudio')->contains($area) ? 'selected':'' }} > {{$Nombre }} </option>
                                {!!$errors->first('id_areaDeEstudio','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                <div class="form-group col-md-6">
                    <div class="form-check">
                        <small id="passwordHelpInline" class="text-muted">
                            Roles 
                        </small>
                        @foreach ($roles as $id_role => $Nombre)
                            @if ($loop->first)
                                <label class="form-check btn btn-light">
                                    <input
                                    type="checkbox" 
                                    value="{{ $id_role }}"
                                    {{ $listaDocentes->roles->pluck('id_role')->contains($id_role) ? 'checked' : ''}} 
                                    name="roles[]">
                                    {{ $Nombre }}
                                </label><!--la linea del metodo pluck, verifica el role en la base de datos y muestra el check en el checkbox-->
                            @endif
                            @if ($loop->last)
                            <label class="form-check btn btn-light">
                                    <input
                                    type="checkbox" 
                                    value="{{ $id_role }}"
                                    {{ $listaDocentes->roles->pluck('id_role')->contains($id_role) ? 'checked' : ''}} 
                                    name="roles[]">
                                    {{ $Nombre }}
                                </label><!--la linea del metodo pluck, verifica el role en la base de datos y muestra el check en el checkbox-->    
                            @endif
                        @endforeach	  			
                        {!!$errors->first('roles','<span class=error>:message</span>')!!}
                    </div>
                </div>
            </div>