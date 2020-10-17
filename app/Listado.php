<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listado extends Model
{
    protected $table = 'listado';
    protected $primaryKey = 'id_listado';
    protected $fillable = ['id_asignatura','id_curso','id_docente'];

    

    public function curso()
    {
        return $this->belongsTo('App\Curso','id_curso');
    }

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