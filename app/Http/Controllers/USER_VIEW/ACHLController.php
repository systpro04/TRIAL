<?php

namespace App\Http\Controllers\USER_VIEW;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ACHLController extends Controller
{
    public function award()
    {
        return view('USER_VIEW.Awards.index');
    }
    public function core()
    {
        return view('USER_VIEW.Core.index');
    }
    public function leader()
    {
        return view('USER_VIEW.Leaders.index');
    }
    public function history()
    {
        return view('USER_VIEW.History.index');
    }
}
