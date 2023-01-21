<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdImage extends Model
{
    use HasFactory;
    protected $table = "ad_images";
    protected $fillable = ['advertisement_id','id','images'];

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }
    public function ad()
    {
        return $this->belongsTo(Advertisement::class);
    }


}
