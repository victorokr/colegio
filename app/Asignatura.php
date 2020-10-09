<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'asignatura';
    protected $primaryKey = 'id_asignatura';
    protected $fillable = ['asignatura'];

    
public function scopeConsultaAsignatura($query, $busquedaAsignatura)
{
    if($busquedaAsignatura)
    return $query->where('asignatura','LIKE',"%$busquedaAsignatura%");
}
    


}
