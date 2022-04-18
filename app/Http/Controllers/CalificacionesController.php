<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calificacion;
use App\Curso;
use App\Listado;
use App\Periodo;
use App\Asignatura;
use App\Alumno;
use Illuminate\Support\Facades\Auth;

class CalificacionesController extends Controller
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
        $cursoo       = Curso::pluck('salon','id_curso');
        $periodoo     = Periodo::pluck('periodo','id_periodo');
        $asignaturaa  = Asignatura::pluck('asignatura','id_asignatura');
        

        $curso        = $request->get('curso');
        $periodo      = $request->get('periodo');
        $asignatura   = $request->get('asignatura');
        $nombreAlumno = $request->get('nombre');
       
        
       // $listacursos  = new Calificacion();
       // $listaCal = Calificacion::all();

        $listaCalificaciones = Calificacion::orderBy('id_calificacion','DESC')
        ->consultaCurso($curso)//consultaCurso es el nombre del metodo en el modelo, pero sin scope
        ->consultaPeriodo($periodo)
        ->consultaAsignatura($asignatura)
        ->consultaNombre($nombreAlumno)
        ->paginate(8);
        // $nombree      = Alumno::where('id_alumno','=',Calificacion::pluck('id_alumno'));
        // dd($nombree);
       //$filtroCursoo = $listaCal->$listacursos->curso()->first();
       
       //$filtroCursoo = $listaCalificaciones->  where('id_docente','=', Auth::user()->id_docente);
    //    $filtroCursoo = Calificacion::whereHas('curso', function ($query){
    //        return $query->where('id_curso', '=', 'id_curso');
    //    })->get();
       //dd($filtroCursoo);
       //$cursoo = $filtroCursoo;
        return view('calificaciones.index', compact('listaCalificaciones','cursoo','periodoo','asignaturaa'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
