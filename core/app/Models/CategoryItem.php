<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryItem extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'status','category_id','created_at', 'updated_at'];

    public function setTitleAttribute($value)
	{
		$this->attributes['title'] = $value;
		$this->attributes['slug'] = Str::slug($value);
	}

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategories()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id')->where('status', 1);
    }
}
