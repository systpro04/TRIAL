<?php

namespace App\Http\Controllers\USER_VIEW;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NIAController extends Controller
{
    public function allnews() 
    {
        return view('USER_VIEW.NIA.allnews');
    }

    public function allint() 
    {
        return view('USER_VIEW.NIA.allint');
    }
    public function alladv() 
    {
        return view('USER_VIEW.NIA.alladv');
    }
}
