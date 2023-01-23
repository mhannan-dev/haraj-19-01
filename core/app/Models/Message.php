<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['from','to','message','is_read','advertisement_id','created_at','updated_at'];

    public function user(){

        return $this->belongsTo(Advertiser::class, 'to');
    }
}
