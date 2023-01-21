<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'status','country_id','created_at', 'updated_at'];
    public function setTitleAttribute($value)
	{
		$this->attributes['title'] = $value;
		$this->attributes['slug'] = Str::slug($value);
	}
    public function ads()
    {
        return $this->hasMany(Advertisement::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
