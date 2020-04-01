<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crearalumno extends Model
{
    protected $table = 'alumno';
    protected $primaryKey = 'id_alumno';
    protected $fillable = ['nombres','apellidos','documento','telefono',
    'email','direccion','lugarDeResidencia','fechaDeNacimiento','id_curso',
    'id_tipoDocumento','id_lugarDeNacimiento','id_factorRH','id_eps','id_grado'];

    public function factorrh()
    {
        return $this->belongsTo('App\FactorRH','id_factorRH');
    }

    public function eps()
    {
        return $this->belongsTo('App\Eps','id_eps');
    }

    public function curso()
    {
        return $this->belongsTo('App\Curso','id_curso');
    }

    public function lugarDeNacimiento()
    {
        return $this->belongsTo('App\Lugardenacimiento','id_lugarDeNacimiento');
    }

    public function tipoDeDocumento()
    {
        return $this->belongsTo('App\Tipodocumento','id_tipoDocumento');
    }

    public function responsable()
    {
        return $this->belongsToMany('App\Responsable','alumno_responsable','id_alumno','id_responsable');
    }
}
