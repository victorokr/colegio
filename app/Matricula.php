<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matricula';
    protected $primaryKey = 'id_matricula';
    protected $fillable = ['numeroDeFormulario','fechaSolicitud','id_grado','id_añoElectivo','id_tipoDeAspirante','id_responsable'];
}
