<?php

use Illuminate\Database\Seeder;
use App\Url_Permiso;
use App\Role;

class UrlPermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_nivel_1 = Role::where('name','nivel_1')->first();
        $role_admin = Role::where('name','admin')->first();
        $role_nivel_2 = Role::where('name','nivel_2')->first();

        $url = new Url_Permiso();
        $url->urlRelativa = 'home';
        $url->action = 'get';
        $url->save();
        //le asigno el permiso requerido para acceder a esta URL
        $url->roles()->attach($role_admin);
        $url->roles()->attach($role_nivel_1);
        $url->roles()->attach($role_nivel_2);

        $url = new Url_Permiso();
        $url->urlRelativa = 'ABM/usuarios';
        $url->action = 'get';
        $url->save();
        $url->roles()->attach($role_admin);

        $url = new Url_Permiso();
        $url->urlRelativa = 'ABM/usuarios/alta/url';
        $url->action = 'get';
        $url->save();
        $url->roles()->attach($role_admin);

        $url = new Url_Permiso();
        $url->urlRelativa = 'ABM/usuarios/alta/url';
        $url->action = 'post';
        $url->save();
        $url->roles()->attach($role_admin);

        $url = new Url_Permiso();
        $url->urlRelativa = 'ABM/usuarios/listado';
        $url->action = 'get';
        $url->save();
        $url->roles()->attach($role_admin);

        $url = new Url_Permiso();
        $url->urlRelativa = 'ABM/usuarios/listado';
        $url->action = 'post';
        $url->save();
        $url->roles()->attach($role_admin);

        $url = new Url_Permiso();
        $url->urlRelativa = 'ABM/usuarios/listado/url';
        $url->action = 'get';
        $url->save();
        $url->roles()->attach($role_admin);

        $url = new Url_Permiso();
        $url->urlRelativa = 'ABM/usuarios/listado/url';
        $url->action = 'post';
        $url->save();
        $url->roles()->attach($role_admin);

        $url = new Url_Permiso();
        $url->urlRelativa = 'listar/registros';
        $url->action = 'get';
        $url->save();
        $url->roles()->attach($role_admin);
        $url->roles()->attach($role_nivel_1);

        $url = new Url_Permiso();
        $url->urlRelativa = 'listar/registros';
        $url->action = 'post';
        $url->save();
        $url->roles()->attach($role_admin);
        $url->roles()->attach($role_nivel_1);

        $url = new Url_Permiso();
        $url->urlRelativa = 'listar/registros/ajax';
        $url->action = 'get';
        $url->save();
        $url->roles()->attach($role_admin);
        $url->roles()->attach($role_nivel_1);
    }
}
