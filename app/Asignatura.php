<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'asignatura';
    protected $primaryKey = 'id_asignatura';
    protected $fillable = ['asignatura'];
}