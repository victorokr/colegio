<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FactorRH;
use App\Eps;
use App\Lugardenacimiento;
use App\Tipodocumento;
use App\Grado;
use App\Crearalumno;
use Illuminate\Support\Facades\Auth;

use App\Añoelectivo;
use App\Tipodeaspirante;
use App\Responsable;
use App\Alumno;

class CrearalumnosController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:acudiente'); 

       $this->middleware('roles:Responsable');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $factorrhh           = FactorRH::pluck('factorRH','id_factorRH');
        $epss                = Eps::pluck('EPS','id_eps');
        $lugarDeNacimientoo  = Lugardenacimiento::pluck('lugarDeNacimiento','id_lugarDeNacimiento');
        $tipoDeDocumentoo    = Tipodocumento::pluck('tipoDocumento','id_tipoDocumento');
        $gradoo              = Grado::pluck('grado','id_grado');
        return view('crearAlumnos.create', compact('factorrhh','epss','lugarDeNacimientoo','tipoDeDocumentoo','gradoo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //return $request->all();
        $crearAlumno = Crearalumno::create( $request->all() );
        $responsableDelAlumno =  Auth::user()->id_responsable;
        $crearAlumno ->responsable()->attach($responsableDelAlumno);
        
        return redirect()->route('alumnosmatricula.show', compact('crearAlumno','responsableDelAlumno'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $añoElectivoo           = Añoelectivo::pluck('añoElectivo','id_añoElectivo');
        //$tipoDeAspirantee       = Tipodeaspirante::pluck('tipoDeAspirante','id_tipoDeAspirante');
        //$responsablee           = Responsable::pluck('nombres','id_responsable');
        //$alumnoo                = Alumno::pluck('nombres','id_alumno');

        $crearAlumno = Crearalumno::findOrFail($id);
        return view('crearAlumnos.show',compact('crearAlumno','añoElectivoo'))->with('crearAlumno',$crearAlumno);
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
