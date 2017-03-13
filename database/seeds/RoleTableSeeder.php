<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'admin';
        $role_user->descripcion  = 'Role para manejo de usuarios y permisos';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'nivel_1';
        $role_user->descripcion  = 'Role para usuarios con mayores responsabilidades';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'nivel_2';
        $role_user->descripcion  = 'Role para usuarios con permisos para consulta unicamente';
        $role_user->save();
    }
}
