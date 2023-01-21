<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'icon','parent_id','bg_color','status','created_at', 'updated_at'];

    public function setTitleAttribute($value)
	{
		$this->attributes['title'] = $value;
		$this->attributes['slug'] = Str::slug($value);
	}

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('status', 1);;
    }

    public function items()
    {
        return $this->hasMany(CategoryItem::class)->where('status', 1);
    }
    public function parent_category()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }


    public function ads()
    {
        return $this->hasMany(Advertisement::class);
    }
    public function sub_category_ads()
    {
        return $this->hasMany(Advertisement::class, 'sub_category_id');
    }

    public function scopeParent($query)
    {
        return $query->where('parent_id', 0)->select('id', 'title','icon','bg_color','slug');
    }
    public function child($query)
    {
        return $query->where('parent_id', '!=', 0)->select('id', 'title','icon','bg_color','slug');
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
