<?php

namespace App\Policies;

use App\Docente;
use App\Calificacion;
use Illuminate\Auth\Access\HandlesAuthorization;

class CalificacionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function store(Docente $user, Request $request)
    {
        $request = request()->url();
        
        //$evaluarCursoRouteList = route('evaluar.index');
        return $request === $request;
    }


}
