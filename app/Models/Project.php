<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'subtitle', 'developer_name', 'address', 'city', 'state',
        'pincode', 'map_plus_code', 'rera_id', 'rera_agent_id', 'configuration',
        'possession_date', 'launch_date', 'project_area', 'project_size', 'units',
        'towers', 'floors', 'size_range', 'price_range', 'avg_price', 'short_description',
        'long_description', 'hero_image', 'status', 'is_featured', 'seo_title',
        'seo_description', 'schema_json'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'schema_json' => 'array',
    ];

    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(Amenity::class)->withTimestamps();
    }

    public function galleryImages(): HasMany
    {
        return $this->hasMany(GalleryImage::class)->orderBy('sort_order');
    }
}
