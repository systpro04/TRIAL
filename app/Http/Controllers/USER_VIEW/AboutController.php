<?php

namespace App\Http\Controllers\USER_VIEW;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('USER_VIEW.About.index');
    }
}
