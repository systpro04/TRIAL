<?php

namespace App\Models\News_Advisory_Interruption;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisory extends Model
{
    use HasFactory;
    protected $fillable = [
        'place',
        'info',
        'dateTime'
    ];
}
