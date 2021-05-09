<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crearalumno extends Model
{
    protected $table = 'alumno';
    protected $primaryKey = 'id_alumno';
    protected $fillable = ['nombres','documento','telefono',
    'email','direccion','lugarDeResidencia','fechaDeNacimiento',
    'id_tipoDocumento','id_lugarDeNacimiento','id_factorRH','id_eps'];

    public function factorrh()
    {
        return $this->belongsTo('App\FactorRH','id_factorRH');
    }

    public function eps()
    {
        return $this->belongsTo('App\Eps','id_eps');
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
