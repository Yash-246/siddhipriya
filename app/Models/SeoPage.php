<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    use HasFactory;

    protected $fillable = ['route_name', 'title', 'description', 'canonical_path', 'robots', 'schema_json'];

    protected $casts = ['schema_json' => 'array'];
}
