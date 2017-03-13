<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Url_Permiso;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role','user_id','role_id');
    }

    public function hasAnyRole($url,$action)
    {   
        $url = Url_Permiso::where('urlRelativa','=',$url)->where('action','=',$action)->first();
        if ($url) {
            $user_roles = $url->roles()->get();
            foreach ($user_roles as $role) {
                if ($this->hasRole($role->name))
                    return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name',$role)->first()) {
            return true;
        }
        return false;
    }

    public function allUsers()
    {
        $users = User::all();
        return $users;
    }
}
