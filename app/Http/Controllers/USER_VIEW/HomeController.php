<?php

namespace App\Http\Controllers\USER_VIEW;

use App\Http\Controllers\Controller;
use App\Models\HomeImages;
use App\Models\News_Advisory_Interruption\Advisory;
use Illuminate\Http\Request;
use App\Models\News_Advisory_Interruption\News;
use App\Models\News_Advisory_Interruption\Interruption;
class HomeController extends Controller
{
    public function home()
    {
        $images = HomeImages::all();
        $news = News::latest()->paginate(1);
        $recentNews = News::latest()->take(5)->get();
        $interruptions = Interruption::latest()->paginate(2);
        $advisories = Advisory::latest()->paginate(3);
        return view('USER_VIEW.Home.index', compact('images', 'news','recentNews', 'interruptions', 'advisories'));
    }

}
