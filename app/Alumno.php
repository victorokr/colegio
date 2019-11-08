<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';
    protected $primaryKey = 'id_alumno';
    protected $fillable = ['codigo','nombres','apellidos','documento','telefono',
    'email','direccion','lugarDeResidencia','fechaDeNacimiento','id_curso','id_matricula',
    'id_tipoDocumento','id_lugarDeNacimiento','id_factorRH','id_eps'];
}
