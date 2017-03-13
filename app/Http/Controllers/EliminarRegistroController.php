<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

#---------------- Models --------------------
use App\Viaje;

class EliminarRegistroController extends Controller{
	
	public function __construct() {
        $this->middleware('auth');
  	}

    /*
        Metodo invocado por defecto
    */
    public function index()
    {
        $registros = Viaje::where('baja','=',0)->get();
        return view('eliminarRegistro');
    }

    public function ajax(Request $request)
    {
        $registros = Viaje::where('baja','=',0)->get();
        return response()->json($registros);
    }

    public function ajaxDelete()
    {
        $id = Input::get('id');
        $registro = Viaje::find($id);
        $registro->baja = 1;
        $registro->save();
        $registros = Viaje::where('baja','=',0)->get();
        return response()->json($registros);
    }
}