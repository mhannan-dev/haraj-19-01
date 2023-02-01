<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table = 'role_permission';

    public function role()
    {
        return $this->belongsTo('App\Models\Role','role_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','auth_roles','auth_id','role_id');
    }

    public function attachRole($role)
    {

        // echo "====<br/>";
        // print_r($role);
        // echo "<br/>====";
        // exit();

        if (is_object($role)) {
            $role = $role->getKey();
        }

        if (is_array($role)) {
            $role = $role['id'];
        }

        $this->roles()->attach($role);
    }
}
