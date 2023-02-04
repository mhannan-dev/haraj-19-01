<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Stripe\Treasury\ReceivedDebit;

class Advertisement extends Model
{
    use HasFactory;
    protected $table = "advertisements";
    protected $fillable = ['title', 'status', 'image', 'slug', 'created_at', 'updated_at'];
    protected $casts = [
        'details_informations' => "object",
    ];
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function sub_category()
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', 1);
    }

    public function images()
    {
        return $this->hasMany(AdImage::class);
    }

    public function favourite_to_users()
    {
        return $this->belongsToMany(Advertiser::class)->withTimestamps();
    }
    public function recent_visited_by_visitors()
    {
        return $this->belongsToMany(RecentlyViewAd::class)->withTimestamps();
    }

    public function complains()
    {
        return $this->hasMany(AdComplain::class);
    }
    public function ad_message()
    {
        return $this->hasMany(UserContact::class, 'advertisement_id');
    }

    public function getCustomTitle()
    {
        return ucwords("{$this->brand} {$this->model} {$this->year_of_manufacture}");
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
