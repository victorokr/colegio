<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matricula';
    protected $primaryKey = 'id_matricula';
    protected $fillable = ['id_añoElectivo','id_tipoDeAspirante','id_responsable','id_alumno','id_estado'];

    public function añoElectivo()
    {
        return $this->belongsTo('App\Añoelectivo','id_añoElectivo');
    }

    public function tipoDeAspirante()
    {
        return $this->belongsTo('App\Tipodeaspirante','id_tipoDeAspirante');
    }

    public function responsable()
    {
        return $this->belongsTo('App\Responsable','id_responsable');
    }

    public function alumno()
    {
        return $this->belongsTo('App\Alumno','id_alumno');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado','id_estado');
    }



    public function scopeAlumnoscope($query, $alumno)
    {
        if($alumno)
        return $query->whereHas("alumno", function ($query) use ($alumno){
            $query->where('documento','LIKE', "%$alumno%");
        });
    }


}
