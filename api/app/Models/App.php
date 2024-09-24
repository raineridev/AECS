<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $table = 'apps_config';
    use HasFactory;

    protected $fillable = [
        "app_id",
        "user_id",
        'is_active',
        'config',
    ];
    protected $casts = [
        'config' => 'array',
        'is_active' => 'boolean',
    ];
}
