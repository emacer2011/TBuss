<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name','admin')->first();
    	$role_nivel_1 = Role::where('name','nivel_1')->first();

    	$user = new User();
        $user->name = 'administrador';
        $user->email = 'administrador@example.com';
        $user->password = bcrypt('admin123');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'test';
        $user->email = 'test@example.com';
        $user->password = bcrypt('test123');
        $user->save();
        $user->roles()->attach($role_nivel_1);
    }
}
