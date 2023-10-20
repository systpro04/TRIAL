<?php

namespace App\Models\News_Advisory_Interruption;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advisory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'place',
        'info',
        'dateTime'
    ];
}
