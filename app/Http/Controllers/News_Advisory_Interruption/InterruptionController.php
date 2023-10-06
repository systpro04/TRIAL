<?php

namespace App\Http\Controllers\News_Advisory_Interruption;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News_Advisory_Interruption\Interruption;

class InterruptionController extends Controller
{
    public function index()
    {
        return view('news_adv_int.interruption.index');
    }
}