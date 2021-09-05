<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory; // minor, but it doesn't have a factory...

    protected $guarded = [];

    protected $casts = [
        'wishlist' => 'array'
    ];
    
}
