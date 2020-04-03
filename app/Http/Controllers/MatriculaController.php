<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Añoelectivo;
use App\Tipodeaspirante;
use App\Responsable;
use App\Alumno;
use App\Matricula;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateMatriculaRequest;

class MatriculaController extends Controller
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
    public function index(Request $request)
    {
        $documentoAlumno = $request->get('nombres');
        

        $listaMatriculas = Matricula::orderBy('id_matricula','DESC')
        ->alumnoscope($documentoAlumno)//alumno es el nombre del metodo en el modelo, pero sin scope
        ->paginate(4);
        return view('matricula.index', compact('listaMatriculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $documentoAlumno = $request->get('nombres');
        $listaMatriculas = Matricula::orderBy('id_matricula','DESC')
        ->alumnoscope($documentoAlumno)//alumno es el nombre del metodo en el modelo, pero sin scope
        ->paginate(1);

        $añoElectivoo           = Añoelectivo::pluck('añoElectivo','id_añoElectivo');
        //$tipoDeAspirantee       = Tipodeaspirante::pluck('tipoDeAspirante','id_tipoDeAspirante');
        //$responsablee           = Responsable::pluck('nombres','id_responsable');
        //$alumnoo                = Alumno::pluck('nombres','id_alumno');
        
        return view('matricula.create', compact('añoElectivoo','listaMatriculas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMatriculaRequest $request)
    {
        //return $request->all();
        $crearMatricula = Matricula::create([

            //"id_responsable"     => Auth::user()->id_responsable,
            "id_responsable"     => $request->input('id_responsable'),
            "id_añoElectivo"     => $request->input('id_añoElectivo'),
            "id_tipoDeAspirante" => '1',
            "id_alumno"          => $request->input('id_alumno'),
            "id_estado"          => '1',
        ]);

        return redirect()->route('area.index', compact('crearMatricula','id_responsable','id_añoElectivo','id_tipoDeAspirante','id_alumno','id_estado'))
       ->with('infoCreate','Alumno PreMatriculado Satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listaMatriculas = Matricula::orderBy('id_matricula','DESC')
        ->alumnoscope($documentoAlumno)//alumno es el nombre del metodo en el modelo, pero sin scope
        ->paginate(4);
        return view('matricula.show', compact('listaMatriculas'));
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
