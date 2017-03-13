<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\User;
use App\Role;
use App\Url_Permiso;

class ABMUsuariosController extends Controller
{

	public function __construct() {
        $this->middleware('auth');
  	}
  	
    public function index()
    {
    	return view('abmUsuarios');
    }

    public function getListado()
    {
    	$users = User::all();
		return view('listados.listarUsuarios')->with('usuarios', $users);
    }

    public function postListado()
    {
        $email = Input::get('email');
        $admin = Input::get('admin');
        $nivel_1 = Input::get('nivel_1');
        $nivel_2 = Input::get('nivel_2');

        $user = User::where('email','=',$email)->first();
        if ($user) {
            $user->roles()->detach();
            if ($admin) {
                $user->roles()->attach(Role::where('name','admin')->first());
            }
            if ($nivel_1) {
                $user->roles()->attach(Role::where('name','nivel_1')->first());
            }
            if ($nivel_2) {
                $user->roles()->attach(Role::where('name','nivel_2')->first());
            }
            return response()->json(['message' => 'Roles asignados correctamente para usuario ','user' => $email],200);
        }
        return response()->json(['message' => 'Error al intentar asignar roles al usuario ','user' => $email], 409);
    }

    public function getRoles()
    {
        $roles = Role::all();
        return view('listados.listarRoles')->with('roles', $roles);
    }

    public function getFormUrl()
    {
        return view('forms.formUrl');
    }

    public function postFormUrl()
    {
        $urlRelativa = Input::get('url_permiso');
        $metodo = Input::get('metodo');
        $existe = Url_Permiso::where('urlRelativa','=',$urlRelativa)->where('action','=',$metodo)->get();
        if ($existe->count()) {
            return response()->json(['message' => 'La dirección y metodo que desea dar de alta ya existe!!'], 409);
        }
        $url = new Url_Permiso();
        $url->urlRelativa = $urlRelativa;
        $url->action = $metodo;
        $url->save();
        return response()->json(['message' => 'Operacion exitosa!!'],200);
    }

    public function getListadoUrl()
    {
        $url = Url_Permiso::all();
        return view('listados.listarUrl')->with('urls',$url);
    }

    public function postListadoUrl()
    {
        $urlRelativa = Input::get('url_permiso');
        $metodo = Input::get('metodo');
        $admin = Input::get('admin');
        $nivel_1 = Input::get('nivel_1');
        $nivel_2 = Input::get('nivel_2');

        $url = Url_Permiso::where('urlRelativa','=',$urlRelativa)->where('action','=',$metodo)->first();
        if ($url) {
            $url->roles()->detach();
            if ($admin) {
                $url->roles()->attach(Role::where('name','admin')->first());
            }
            if ($nivel_1) {
                $url->roles()->attach(Role::where('name','nivel_1')->first());
            }
            if ($nivel_2) {
                $url->roles()->attach(Role::where('name','nivel_2')->first());
            }
            return response()->json(['message' => 'Roles asignados correctamente...'],200);
        }
        return response()->json(['message' => 'Error al intentar asignar roles a la URL...'], 409);
    }
}
