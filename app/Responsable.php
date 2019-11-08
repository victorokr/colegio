<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table = 'responsable';
    protected $primaryKey = 'id_responsable';
    protected $fillable = ['nombres','apellidos','documento','telefono',
    'email','password','id_parentesco','id_tipoDocumento','id_matricula'];
}
