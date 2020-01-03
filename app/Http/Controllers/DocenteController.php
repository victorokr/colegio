<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
use App\Gradoescalafon;
use App\Categoria;
use App\Perfil;
use App\Nivel;

class DocenteController extends Controller
{



    public function __construct()
    {
       $this->middleware('auth:docente'); //protege la ruta lista empleados, solo se muestra haciendo login, se le paso employes como parametro para que no bloquie la ruta lista empleados despues de hacer login

       //$this->middleware('roles:Administrador', ['except' =>['edit','update']]);//protege la ruta gestionempleados dentro de la sesion y le pasa por parametro los distintos roles ej: ('roles:administrador,jefeDeInventario') si se agrega o se quitan roles aqui, tambien se debe hacer en el link
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
        $escalafonn = Gradoescalafon::pluck('escalafon','id_escalafon');
        return view('docentes.create', compact('escalafonn'));
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
        $listaDocentes = Docente::findOrFail($id);
        $escalafonn    = Gradoescalafon::pluck('escalafon','id_escalafon');
        $categoriaa    = Categoria::pluck('categoria','id_categoria');
        $perfill       = Perfil::pluck('perfil','id_perfil');
        $nivell        = Nivel::pluck('nivel','id_nivel');
        return view('docentes.edit', compact('listaDocentes','escalafonn','categoriaa','perfill','nivell'));
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
