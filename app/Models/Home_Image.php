<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_Image extends Model
{
    use HasFactory;
    protected $table = "home_images";

    protected $fillable = 
    [
        'images'
    ];
}
