<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id', 'name', 'email', 'phone', 'interest', 'budget', 'message',
        'source', 'ip_address', 'user_agent', 'status'
    ];
}
