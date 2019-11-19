<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Responsable extends Authenticatable
{
    protected $table = 'responsable';
    protected $primaryKey = 'id_responsable';
    protected $fillable = ['nombres','apellidos','documento','telefono',
    'email','password','id_parentesco','id_tipoDocumento','id_matricula'];
}
