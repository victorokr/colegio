<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = 'grado';
    protected $primaryKey = 'id_grado';
    protected $fillable = ['grado'];
}
