<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
use App\Gradoescalafon;
use App\Perfil;
use App\Nivel;
use App\Role;
use App\Areadeestudio;
use App\Http\Requests\UpdateDocenteRequest;
use App\Http\Requests\CreateDocenteRequest;
use Illuminate\Validation\Rule;

class DocenteController extends Controller
{



    public function __construct()
    {
       $this->middleware('auth:docente'); //protege la ruta lista empleados, solo se muestra haciendo login, se le paso employes como parametro para que no bloquie la ruta lista empleados despues de hacer login

       $this->middleware('roles:Administrador', ['except' =>['edit','update']]);//protege la ruta gestionempleados dentro de la sesion y le pasa por parametro los distintos roles ej: ('roles:administrador,jefeDeInventario') si se agrega o se quitan roles aqui, tambien se debe hacer en el link
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombreDocente = $request->get('nombres');
        

        $listaDocentes = Docente::orderBy('id_docente','DESC')
        ->docente($nombreDocente)//empleado es el nombre del metodo en el modelo, pero sin scope
        ->paginate(4);
        return view('docentes.index', compact('listaDocentes') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $escalafonn    = Gradoescalafon::pluck('escalafon','id_escalafon');
        $perfill       = Perfil::pluck('perfil','id_perfil');
        $nivell        = Nivel::pluck('nivel','id_nivel');
        $roles         = Role::pluck('display_name', 'id_role');
        $areaDeEstudioo = Areadeestudio::pluck('nombre','id_areaDeEstudio');
        return view('docentes.create', compact('escalafonn','perfill','nivell','roles','areaDeEstudioo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDocenteRequest $request)
    {
        //return $request->all();
        $listaDocentes = Docente::create( $request->all() );
        $listaDocentes->roles()->attach($request->roles);
        $listaDocentes->areaDeEstudio()->attach($request->areaDeEstudio);
        return redirect()->route('docente.index', compact('listaDocentes'))->with('infoCreate','Docente agregado');
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
        $listaDocentes  = Docente::findOrFail($id);
        $escalafonn     = Gradoescalafon::pluck('escalafon','id_escalafon');
        $perfill        = Perfil::pluck('perfil','id_perfil');
        $nivell         = Nivel::pluck('nivel','id_nivel');
        $roles          = Role::pluck('display_name', 'id_role');
        $areaDeEstudioo = Areadeestudio::pluck('nombre','id_areaDeEstudio');
        return view('docentes.edit', compact('listaDocentes','escalafonn','perfill','nivell','roles','areaDeEstudioo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocenteRequest $request, $id)
    {
        $this->validate(request(), ['email' =>['required','email','max:50',Rule::unique('docente')->ignore($id,'id_docente')]]);
        $listaDocentes = Docente::findOrFail($id);
        $listaDocentes  ->roles()        ->sync($request->roles);
        $listaDocentes  ->areaDeEstudio()->sync($request->areaDeEstudio);
        $listaDocentes  ->update($request->all());
        return back()->with('infoUpdate','Docente actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listaDocentes = Docente::findOrFail($id);
        $listaDocentes->delete();
        return back()->with('infoDelete','Docente eliminado'); 
    }
}
