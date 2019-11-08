<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logro extends Model
{
    protected $table = 'logro';
    protected $primaryKey = 'id_logro';
    protected $fillable = ['codigo','indicadorLogro','recomendacion','id_docente'];
}
