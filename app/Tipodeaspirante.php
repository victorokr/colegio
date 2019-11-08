<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipodeaspirante extends Model
{
    protected $table = 'tipodeaspirante';
    protected $primaryKey = 'id_tipoDeAspirante';
    protected $fillable = ['tipoDeAspirante'];
}
