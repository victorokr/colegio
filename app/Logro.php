<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logro extends Model
{
    protected $table = 'logro';
    protected $primaryKey = 'id_logro';
    protected $fillable = ['logro','id_docente','id_periodo','id_asignatura','id_grado'];



    public function docente()
    {
        return $this->belongsTo('App\Docente','id_docente');
    }

    public function periodo()
    {
        return $this->belongsTo('App\Periodo','id_periodo');
    }

    public function asignatura()
    {
        return $this->belongsTo('App\Asignatura','id_asignatura');
    }

    public function grado()
    {
        return $this->belongsTo('App\Grado','id_grado');
    }


    public function scopeConsultaGrado($query, $grado)
    {
        if($grado)
        return $query->whereHas("grado", function ($query) use ($grado){
            $query->where('id_grado','LIKE', "%$grado%");
        });
    }

    public function scopeConsultaPeriodo($query, $periodo)
    {
        if($periodo)
        return $query->whereHas("periodo", function ($query) use ($periodo){
            $query->where('id_periodo','LIKE', "%$periodo%");
        });
    }

    // public function cursos()
    // {
    //     return $this->hasManyThrough('App\Listado','App\Curso','id_curso','id_listado');
    // }

}
