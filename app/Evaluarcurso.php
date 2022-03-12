<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Periodo;
use Carbon\Carbon;

class Evaluarcurso extends Model
{
    protected $table = 'matricula';
    protected $primaryKey = 'id_matricula';
    protected $fillable = ['nota1','nota2','nota3','nota4','nota5','nota6'];

    public function alumno()
    {
        return $this->belongsTo('App\Alumno','id_alumno');
    }

    public function curso()
    {
        return $this->belongsTo('App\Curso','id_curso');
    }



    // public function scopeCurso($query, $curso)
    // {
    //     if($curso)
    //     return $query->whereHas("curso", function ($query) use ($curso){
    //         $query->where('salon','LIKE', "%$curso%");
    //     });
    // }

    // public function scopeCurso($query, $curso)
    // {
    //     if($curso)
    //     return $query->whereHas("curso", function ($query) use ($curso){
    //         $query->where('id_curso','LIKE', "%$curso%");
    //     });
    // }

    public function scopeCurso($query, $curso)
    {
        if($curso)
        return $query->where('id_curso','LIKE',"%$curso%");
    }


    
    



}
