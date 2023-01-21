<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $table = 'auths';
    protected $fillable = [
            'username','first_name','last_name','email','mobile_no',' password','gender','can_login','about'
    ];
}
