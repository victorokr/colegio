<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listado extends Model
{
    protected $table = 'listado';
    protected $primaryKey = 'id_listado';
    protected $fillable = ['id_asignatura','id_curso','id_docente'];
}
