<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';
    protected $primaryKey = 'id_curso';
    protected $fillable = ['salon','id_asignatura','id_docente'];



    public function asignatura()
    {
        return $this->belongsTo('App\Asignatura','id_asignatura');
    }

    public function docente()
    {
        return $this->belongsTo('App\Docente','id_docente');
    }


    public function scopeConsultaCurso($query, $busquedaCurso)
    {
    if($busquedaCurso)
    return $query->where('id_curso','LIKE',"%$busquedaCurso%");
    }


}
