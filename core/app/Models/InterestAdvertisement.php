<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestAdvertisement extends Model
{
    use HasFactory;
    protected $table = 'advertisement_interest_advertisement';
    protected  $guarded = ['id'];

    public function ad()
    {
        return $this->belongsTo(Advertisement::class,'interest_advertisement_id');
    }
}
