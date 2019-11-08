<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observaciones extends Model
{
    protected $table = 'observaciones';
    protected $primaryKey = 'id_observaciones';
    protected $fillable = ['observaciones','id_alumno'];
}
