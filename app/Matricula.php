<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matricula';
    protected $primaryKey = 'id_matricula';
    protected $fillable = ['id_añoElectivo','id_tipoDeAspirante','id_responsable','id_alumno','id_estado','id_curso','id_grado'];

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

    public function grado()
    {
        return $this->belongsTo('App\Grado','id_grado');
    }

    public function curso()
    {
        return $this->belongsTo('App\Curso','id_curso');
    }



    public function scopeAlumnodocumentoo($query, $alumnoDocumento)
    {
        if($alumnoDocumento)
        return $query->whereHas("alumno", function ($query) use ($alumnoDocumento){
            $query->where('documento','LIKE', "%$alumnoDocumento%");
        });
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

    // public function scopeGrado($query, $grado)
    // {
    //     if($grado)
    //     return $query->where('id_grado','LIKE',"%$grado%");
    // }

    // public function scopeCurso($query, $curso)
    // {
    //     if($curso)
    //     return $query->where('id_curso','LIKE',"%$curso%");
    // }


    // nuevo o antiguo
    public function tipoEstudiante() 
    {
        $fechaUpdatedMatricula = ($this->updated_at);
        $fechaCreatedMatricula = ($this->created_at);
        $estadoDeLaMatricula   = ($this->id_estado);

        if($fechaUpdatedMatricula > $fechaCreatedMatricula and $estadoDeLaMatricula === 2){
            return '2';
        }
        else{
            return '1';
        }

    }


}
