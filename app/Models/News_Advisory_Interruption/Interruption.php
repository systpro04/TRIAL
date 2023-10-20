<?php

namespace App\Models\News_Advisory_Interruption;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interruption extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'what',
        'dateTime',
        'where',
        'why'
    ];
}
