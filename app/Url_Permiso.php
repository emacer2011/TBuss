<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url_Permiso extends Model
{
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'url_role','url_id','role_id');
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name',$role)->first()) {
            return true;
        }
        return false;
    }
}
