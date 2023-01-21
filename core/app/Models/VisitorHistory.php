<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'ip_address', 'iso_code', 'country','city','state_name','lat','lon','timezone'
    ];
}
