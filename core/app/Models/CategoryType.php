<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryType extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'status', 'created_at', 'updated_at', 'fields'];

    protected $casts = [
        'fields' => "object",
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function category()
    {
        return $this->hasOne(Category::class)->active();
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
