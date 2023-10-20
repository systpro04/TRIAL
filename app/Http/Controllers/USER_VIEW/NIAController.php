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
        $news = News::latest()->paginate(5);
        $n = News::latest()->paginate(10);
        return view('USER_VIEW.NIA.allnews', compact('news', 'n'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function allint() 
    {
        $interruptions = Interruption::latest()->paginate(10);
        return view('USER_VIEW.NIA.allint', compact('interruptions'))->with('i', (request()->input('page', 1) - 1) *10);
    }
    public function alladv() 
    {
        $advisories = Advisory::latest()->paginate(10);
        return view('USER_VIEW.NIA.alladv', compact('advisories'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
