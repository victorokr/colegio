<?php

namespace App\Policies;

use App\Docente;
use App\Evaluarcurso;
use Illuminate\Auth\Access\HandlesAuthorization;

class EvaluarcursoPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any evaluarcursos.
     *
     * @param  \App\Docente  $user
     * @return mixed
     */
    public function viewAny(Docente $user)
    {
        //
    }

    /**
     * Determine whether the user can view the evaluarcurso.
     *
     * @param  \App\Docente  $user
     * @param  \App\Evaluarcurso  $evaluarcurso
     * @return mixed
     */
    public function view(Docente $user, Evaluarcurso $evaluarcurso)
    {
        // $todaLaUrl = request()->url();
        
        // $evaluarCursoRouteList = route('evaluar.index');
        // return $todaLaUrl === $todaLaUrl;
    }

    /**
     * Determine whether the user can create evaluarcursos.
     *
     * @param  \App\Docente  $user
     * @return mixed
     */
    public function create(Docente $user)
    {
        $todaLaUrl = request()->url();
        
        $evaluarCursoRouteList = route('evaluar.index');
        return $evaluarCursoRouteList == $evaluarCursoRouteList;
    }

    /**
     * Determine whether the user can update the evaluarcurso.
     *
     * @param  \App\Docente  $user
     * @param  \App\Evaluarcurso  $evaluarcurso
     * @return mixed
     */
    public function update(Docente $user, Evaluarcurso $evaluarcurso)
    {
        //
    }

    /**
     * Determine whether the user can delete the evaluarcurso.
     *
     * @param  \App\Docente  $user
     * @param  \App\Evaluarcurso  $evaluarcurso
     * @return mixed
     */
    public function delete(Docente $user, Evaluarcurso $evaluarcurso)
    {
        //
    }

    /**
     * Determine whether the user can restore the evaluarcurso.
     *
     * @param  \App\Docente  $user
     * @param  \App\Evaluarcurso  $evaluarcurso
     * @return mixed
     */
    public function restore(Docente $user, Evaluarcurso $evaluarcurso)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the evaluarcurso.
     *
     * @param  \App\Docente  $user
     * @param  \App\Evaluarcurso  $evaluarcurso
     * @return mixed
     */
    public function forceDelete(Docente $user, Evaluarcurso $evaluarcurso)
    {
        //
    }
}
