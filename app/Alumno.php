<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';
    protected $primaryKey = 'id_alumno';
    protected $fillable = ['nombres','apellidos','documento','telefono',
    'email','direccion','lugarDeResidencia','fechaDeNacimiento','id_curso',
    'id_tipoDocumento','id_grado','id_lugarDeNacimiento','id_factorRH','id_eps'];

    public function factorrh()
    {
        return $this->belongsTo('App\FactorRH','id_factorRH');
    }

    public function eps()
    {
        return $this->belongsTo('App\Eps','id_eps');
    }
    public function grado()
    {
        return $this->belongsTo('App\Grado','id_grado');
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

    public function responsables()
    {
        return $this->belongsToMany('App\Responsable','alumno_responsable','id_alumno','id_responsable');
    }


    public function scopeAlumno($query, $nombreAlumno)
    {
        if($nombreAlumno)
        return $query->where('nombres','LIKE',"%$nombreAlumno%")

        ->orWhere('apellidos','LIKE',"%$nombreAlumno%")
        ->orWhere('documento','LIKE',"%$nombreAlumno%");
    }

    public function scopeGrado($query, $grado)
    {
        if($grado)
        return $query->whereHas("grado", function ($query) use ($grado){
            $query->where('grado','LIKE', "%$grado%");
        });
    }

    public function scopeCurso($query, $curso)
    {
        if($curso)
        return $query->whereHas("curso", function ($query) use ($curso){
            $query->where('salon','LIKE', "%$curso%");
        });
    }


}
