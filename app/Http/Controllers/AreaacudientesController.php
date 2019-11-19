<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaacudientesController extends Controller
{
    public function acudiente()
    {
    	return view('acudiente');
    }

     public function __construct()
     {
         $this->middleware('auth:acudiente');
     }
}
