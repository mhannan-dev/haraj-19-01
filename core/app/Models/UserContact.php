<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserContact extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'advertisement_id', 'message_sender_id', 'advertiser_id', 'advertisement_price', 'advertisement_title', 'created_at', 'updated_at'];

    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class);
    }

    

     // is onlive user
     function isOnline()
     {
         return Cache::has('user-is-online-' . $this->id);
     }
}
