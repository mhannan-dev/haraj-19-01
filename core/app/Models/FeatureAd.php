<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureAd extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function ad()
    {
        return $this->belongsTo(Advertisement::class,'advertisement_id');
    }
}
