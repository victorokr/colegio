<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logro;
use App\Grado;
use App\Periodo;
use App\Asignatura;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CrearLogrosRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ListalogrosController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:docente'); 

       $this->middleware('roles:Empleado');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
        $gradoo      = Grado::pluck('grado','id_grado');
        $periodoo    = Periodo::pluck('periodo','id_periodo');
        $asignaturaa  = Asignatura::pluck('asignatura','id_asignatura');

        $busquedaGrado   = $request-> get('grado');
        $busquedaPeriodo = $request-> get('periodo');
        $asignatura      = $request-> get('asignatura');

        $listaLogros = Logro::orderBy('id_logro','DESC')
        ->consultaGrado($busquedaGrado)//consultaGrado es el nombre del metodo en el modelo, pero sin scope
        ->consultaPeriodo($busquedaPeriodo)
        ->consultaAsignatura($asignatura)
        ->paginate(15);
        return view('logros.index', compact('listaLogros','gradoo','periodoo','asignaturaa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $gradoo       = Grado::pluck('grado','id_grado');
        $periodoo     = Periodo::pluck('periodo','id_periodo');
        $asignaturaa  = Asignatura::pluck('asignatura','id_asignatura');
        return view('logros.create', compact('gradoo','periodoo','asignaturaa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearLogrosRequest $request)
    {
        $consultaLogrosYaCreados = Logro::where('id_periodo','=',$request->id_periodo)->where('id_asignatura','=',$request->id_asignatura)->where('id_grado','=',$request->id_grado)->count();
        if($consultaLogrosYaCreados >= 6){

            Alert::error('ups ', 'Solo puedes crear 6 logros con esta asignatura, periodo y grado')->timerProgressBar();
            return back();
        }

        else{
            $listaLogros = Logro::create($request->all());

        
            Alert::toast('Logro creado correctamente ', 'success')->timerProgressBar();
            return redirect()->route('logros.index', compact('listaLogros'));
        }
       
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
        $listaLogros    = Logro::findOrFail($id);

        $gradoo       = Grado::pluck('grado','id_grado');
        $periodoo     = Periodo::pluck('periodo','id_periodo');
        $asignaturaa  = Asignatura::pluck('asignatura','id_asignatura');

        return view('logros.edit', compact('listaLogros','gradoo','periodoo','asignaturaa'));
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
        $this->validate(request(), ['logro' =>['required','string','max:540',Rule::unique('logro')->ignore($id,'id_logro')]]);

        $listaLogros = Logro::findOrFail($id);
        $listaLogros->id_docente= Auth::user()->id_docente;
         
        $listaLogros->update($request->all());
        Alert::toast('Logro actualizado', 'success')->timerProgressBar();
        return redirect()->route('logros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listaLogros = Logro::findOrFail($id);
        $listaLogros->delete();
        Alert::toast('Logro eliminado', 'success')->timerProgressBar();
        return back();
    }
}
