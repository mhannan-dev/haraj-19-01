<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Favourite extends Model
{
    use HasFactory;
    protected $table = 'advertisement_advertiser';
    public function ads()
    {
        return $this->belongsTo(Advertisement::class,'advertisement_id');
    }
}
