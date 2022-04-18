<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = 'calificacion';
    protected $primaryKey = 'id_calificacion';
    protected $fillable = ['nota1','nota2','nota3','nota4','nota5','nota6','promedio','id_asignatura','id_alumno','id_curso','id_periodo','id_docente'];


    public function asignatura()
    {
        return $this->belongsTo('App\Asignatura','id_asignatura');
    }

    public function alumno()
    {
        return $this->belongsTo('App\Alumno','id_alumno');
    }

    public  function curso()
    {
        return $this->belongsTo('App\Curso','id_curso');
    }

    public function periodo()
    {
        return $this->belongsTo('App\Periodo','id_periodo');
    }

    public function docente()
    {
        return $this->belongsTo('App\Docente','id_docente');
    }


    public function scopeConsultaCurso($query, $curso)
    {
    if($curso)
    return $query->where('id_curso','LIKE',"%$curso%");
    }

    public function scopeConsultaPeriodo($query, $periodo)
    {
    if($periodo)
    return $query->where('id_periodo','LIKE',"%$periodo%");
    }

    public function scopeConsultaAsignatura($query, $asignatura)
    {
    if($asignatura)
    return $query->where('id_asignatura','LIKE',"%$asignatura%");
    }


    public function scopeConsultaNombre($query, $nombre)
    {
        if($nombre)
        return $query->whereHas("alumno", function ($query) use ($nombre){
            $query->where('nombres','LIKE', "%$nombre%");
        });
    }

    // public function scopeConsultaNombre($query, $nombre)
    // {
    // if($nombre)
    // return $query->where('id_alumno','LIKE',"%$nombre%");
    // }


    // public function scopeAsignatura($query, $asignatura)
    // {
    //     if($asignatura)
    //     return $query->where('id_asignatura','LIKE',"%$asignatura%")
    //                  ->orWhere('id_alumno'  ,'LIKE',"%$asignatura%")
    //                  ;
    // }
    



}
