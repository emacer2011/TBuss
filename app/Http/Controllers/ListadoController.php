<?php
namespace App\Http\Controllers;

#---------------- Models --------------------
use App\Viaje;
use App\Http\Controllers\Controller;
use DB;

class ListadoController extends Controller
{
	public function __construct() {
       $this->middleware('auth');
  	}
  	
    /*
        Metodo invocado por defecto
    */
    public function index()
    {
      $registros = Viaje::where('baja','=',0)->get();
      return view('listarRegistros')->with('registros', $registros);
    }

    public function listadoAjax()
    {
      $registros = Viaje::where('baja','=',0)->get();
      return response()->json($registros);
    }
}