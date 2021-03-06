<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;
use App\Añoelectivo;
use App\Alumno;
use App\Estado;
use App\Grado;
use App\Curso;
use App\Tipodocumento;
use App\Tipodeaspirante;
use App\Responsable;


use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateMatriculaRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ListamatriculasController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth:docente'); 

       $this->middleware('roles:Administrador');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        {
            $alumnoDocumento = $request->get('documento');
            $grado        = $request->get('grado');
            $curso        = $request->get('salon');
            $gradoo       = Grado::pluck('grado','id_grado');
            $cursoo       = Curso::pluck('salon','id_curso');
            
    
            $listaMatriculas = Matricula::orderBy('id_matricula','DESC')
            ->alumnodocumentoo($alumnoDocumento)//alumnodocumentoo es el nombre del metodo en el modelo, pero sin scope
            ->grado($grado)
            ->curso($curso)
            ->paginate(7);
            return view('matriculas.index', compact('listaMatriculas','gradoo','cursoo'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listaMatriculas     = Matricula::findOrFail($id);

        $añoElectivoo        = Añoelectivo::pluck('añoElectivo','id_añoElectivo');
        $alumnoo             = Alumno::pluck('nombres','id_alumno');
        $estadoo             = Estado::pluck('estado','id_estado');
        $gradoo              = Grado::pluck('grado','id_grado');
        $cursoo              = Curso::pluck('salon','id_curso');
        $tipoDeAspirantee    = Tipodeaspirante::pluck('tipoDeAspirante','id_tipoDeAspirante');
        $responsablee        = Responsable::pluck('nombres','id_responsable');

        return view('matriculas.edit', compact('listaMatriculas','añoElectivoo','alumnoo','estadoo','gradoo','cursoo','tipoDeAspirantee','responsablee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   //return  $request->all();
        $listaMatriculas     = Matricula::findOrFail($id);
        $listaMatriculas     ->update($request->except('id_responsable','id_alumno'));
        Alert::success('', 'Matricula actualizada')->timerProgressBar();
        return redirect()->route('matriculas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
