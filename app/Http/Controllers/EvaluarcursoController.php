<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EvaluarcursoController extends Controller
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
    {       //return $request->all();
            $docentee     = $request->get('docentee');
            
            if($docentee != Auth::user()->id_docente){
                
                Alert::toast('no puedes calificar este salon', 'error')->timerProgressBar();
                return redirect()->route('listado.index');
                

            }
            else{

                // dd($curso);
                $curso        = $request->get('cursoo');
                $listaCursos = Matricula::orderBy('id_matricula','DESC')
                ->curso($curso) //curso es el nombre del metodo en el modelo, pero sin scope
                ->paginate(15);
                return view('evaluarCurso.index', compact('listaCursos'));
                
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
