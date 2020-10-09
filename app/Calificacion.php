<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = 'calificacion';
    protected $primaryKey = 'id_calificacion';
    protected $fillable = ['nota1','nota2','nota3','nota4','nota5','nota6','nota6','promedio','id_alumno','id_asignatura','id_periodo'];


    



}
