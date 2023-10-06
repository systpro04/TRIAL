<?php

namespace App\Models\News_Advisory_Interruption;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'article',
        'image',
        'dateTime'
    ];
}
