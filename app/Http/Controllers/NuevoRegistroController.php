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

class NuevoRegistroController extends Controller
{
	
	public function __construct() {
       $this->middleware('auth');
  	}

    /*
        Metodo invocado por defecto
    */
    public function index()
    {
		return view('nuevoRegistro');
    }

    public function store()
    {
    	$rules = array(
	        'empresa' => 'required|Alpha|min:3|max:100',
	        'origen' => 'required|Alpha|min:3|max:100',
	        'destino' => 'required|Alpha|min:3|max:100',
	        'coche' => 'required|Integer',
	        'plataforma' => 'required|Integer',
	        'fecha' => 'required|date_format:d/m/Y',
	        'hora' => 'required|date_format:H:m'
	    );
 
	    //personalizamos los mensajes de error para nuestro formualario
	    $messages = [
		    'required' => 'El campo :attribute es obligatorio.',
		    'min' => 'El campo :attribute no puede tener menos de :min carácteres.',
		    'max' => 'El campo :attribute no puede tener más de :min carácteres.',
		    'alpha' => 'El campo :attribute solo puede contener letras.',
		    'integer' => 'El campo :attribute debe ser numerico.',
		    'date_format' => 'El formato de fecha debe ser dd/mm/yyyy y la hora hh:mm'
		];
		
		$validation = Validator::make(Input::all(), $rules, $messages);
 
		if ($validation->fails())
	    {		
	    	// dd($validation->errors());
	    	return back()->withErrors($validation)->withInput();
	    }else{
 			try {
                $registro = new Viaje;
				$registro->empresa = e(Input::get('empresa'));
				$registro->origen = e(Input::get('origen'));
				$registro->destino = e(Input::get('destino'));
				$registro->coche = e(Input::get('coche'));
				$registro->plataforma = e(Input::get('plataforma'));
				$registro->fecha = e(Input::get('fecha'));
				$registro->hora = e(Input::get('hora'));
				$registro->tipo_uso = e(Input::get('opciones'));
				$registro->save();
    			return back()->with('ok_message','¡Viaje registrado correctamente!.');
            } catch (QueryException $e) {
    			return back()->with('fail_message','¡Error al guardar, intente nuevamente o contactese con el administrador!.');
            }
	    }
    }
}