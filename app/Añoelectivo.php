<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Añoelectivo extends Model
{
    protected $table = 'añoelectivo';
    protected $primaryKey = 'id_añoElectivo';
    protected $fillable = ['añoElectivo'];
}
