<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsabledos extends Model
{
    protected $table = 'responsabledos';
    protected $primaryKey = 'id_responsabledos';
    protected $fillable = ['nombres','apellidos','telefono','direccion'];
}
