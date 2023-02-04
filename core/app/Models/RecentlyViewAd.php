<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentlyViewAd extends Model
{
    use HasFactory;
    protected $table = "recently_view_ads";

    public function advertisements()
    {
        return $this->belongsTo(Advertisement::class);
    }
}
