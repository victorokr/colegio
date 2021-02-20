<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Asignatura;
use App\Curso;
use App\Docente;
use App\Listado;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateAsignaturaRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ListadoController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:docente'); 

    //    colocar el except index
       $this->middleware('roles:Administrador'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {   
        $busquedaCurso = $request-> get('asignatura');

        $listaCursos = Listado::orderBy('id_listado','DESC')
        ->consultaCurso($busquedaCurso)//consultaCurso es el nombre del metodo en el modelo, pero sin scope
        ->paginate(8);
        return view('listado.index', compact('listaCursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asignaturas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAsignaturaRequest $request)
    {
        $listaAsignaturas    = Asignatura::create($request->all());

        
        Alert::toast('Asignatura creada ', 'success')->timerProgressBar();
        return redirect()->route('asignaturas.index', compact('listaAsignaturas'));
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
        $listado    = Listado::findOrFail($id);

        $asignaturaa        = Asignatura::pluck('asignatura','id_asignatura');
        $cursoo             = Curso::pluck('salon','id_curso');
        $docentee           = Docente::pluck('nombres','id_docente');
        return view('listado.edit', compact('listado','asignaturaa','cursoo','docentee'));
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
        $this->validate(request(), ['asignatura' =>['required','string','max:30',Rule::unique('asignatura')->ignore($id,'id_asignatura')]]);

        $listaAsignaturas = Asignatura::findOrFail($id);
         
        $listaAsignaturas->update($request->all());
        Alert::toast('Asignatura actualizada', 'success')->timerProgressBar();
        return redirect()->route('asignaturas.index');
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
