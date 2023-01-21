<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdComplain extends Model
{
    use HasFactory;
    protected $fillable = ['advertisement_id', 'complain','complain_details','created_at','updated_at'];

    public function ad()
    {
        return $this->belongsTo(Advertisement::class, 'advertisement_id');
    }
}
