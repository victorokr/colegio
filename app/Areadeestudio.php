<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areadeestudio extends Model
{
    protected $table = 'areadeestudio';
    protected $primaryKey = 'id_areaDeEstudio';
    protected $fillable = ['nombre'];
}
