<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdType extends Model
{
    use HasFactory;
    protected $table = "ad_types";
    protected $fillable = ['title', 'status', 'slug', 'created_at', 'updated_at','start_date','end_date'];

    public function setTitleAttribute($value)
	{
		$this->attributes['title'] = $value;
		$this->attributes['slug'] = Str::slug($value);
	}

    public function duration()
    {
        $start = Carbon::parse($this->start_date);
        $end = Carbon::parse($this->end_date);
        $duration = $end->diffInHours($start);
        return gmdate('H:i', $duration);
    }
}
