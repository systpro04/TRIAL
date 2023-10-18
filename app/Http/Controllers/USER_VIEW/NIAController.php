<?php

namespace App\Http\Controllers\USER_VIEW;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News_Advisory_Interruption\News;
use App\Models\News_Advisory_Interruption\Interruption;
use App\Models\News_Advisory_Interruption\Advisory;
class NIAController extends Controller
{
    public function allnews() 
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);
        return view('USER_VIEW.NIA.allnews', compact('news'));
    }

    public function allint() 
    {
        $interruptions = Interruption::orderBy('created_at', 'desc')->paginate(10);
        return view('USER_VIEW.NIA.allint', compact('interruptions'));
    }
    public function alladv() 
    {
        $advisories = Advisory::orderBy('created_at', 'desc')->paginate(10);
        return view('USER_VIEW.NIA.alladv', compact('advisories'));
    }
}
