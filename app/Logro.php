<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logro extends Model
{
    protected $table = 'logro';
    protected $primaryKey = 'id_logro';
    protected $fillable = ['logro','indicadorLogro','recomendacion','id_docente','id_asignatura'];
}
