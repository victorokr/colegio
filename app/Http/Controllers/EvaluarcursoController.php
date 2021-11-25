<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;
use App\Calificacion;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Collection;

use App\Periodo;
use Carbon\Carbon;

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
                ->paginate(150);//la paginacion no se debe habilitar porque borra los parametros de la url
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




    public static function calcularPeriodo(){
        //toArray convierte un objeto elocuent en un array plano
        $fechainicioo  = Periodo::pluck('fechainicio')->toArray();
        $fechafinn     = Periodo::pluck('fechafin')->toArray();

        

        $fechahoy = Carbon::now();
        

        foreach($fechainicioo as $fechainicio){

                if($fechahoy >= ($fechainicio[0]) && $fechahoy <= ($fechafinn[0]) )
                return '1';

                
       
                if($fechahoy >= ($fechainicio[1]) && $fechahoy <= ($fechafinn[1]) )
                return '2';

                
                    
                if($fechahoy >= ($fechainicio[2]) && $fechahoy <= ($fechafinn[2]) )
                return '3';

               
                    
                if($fechahoy >= ($fechainicio[3]) && $fechahoy <= ($fechafinn[3]) )
                return '4';

                

        }





    }








    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //return $request->all();
        

        $notas =  $request->all( 'nota1','nota2','nota3','nota4','nota5','nota6');
        $calcularPromedio = array_sum($notas)/6;
        $numeroFormateado = bcdiv($calcularPromedio, '1','1'); //bcdiv no redondea el resultado
        //dd($numeroFormateado);



        $crearCalificacion = Calificacion::create([
            
            //"id_responsable"     => Auth::user()->id_responsable,
            "nota1" => $request->input('nota1'),
            "nota2" => $request->input('nota2'),
            "nota3" => $request->input('nota3'),
            "nota4" => $request->input('nota4'),
            "nota5" => $request->input('nota5'),
            "nota6" => $request->input('nota6'),
            "promedio"      => ($numeroFormateado),
            "id_asignatura" => $request->input('id_asignatura'),
            "id_alumno"     => $request->input('id_alumno'),
            "id_curso"      => $request->input('id_curso'),
            "id_periodo"    => $this->calcularPeriodo(),
            "id_docente"    => $request->input('id_docente'),

        ]);
        
        Alert::toast('Su calificacion fue exitosa', 'success')->timerProgressBar();
        return redirect()-> back();
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
