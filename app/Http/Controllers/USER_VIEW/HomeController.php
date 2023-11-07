<?php

namespace App\Http\Controllers\USER_VIEW;

use App\Http\Controllers\Controller;
use App\Models\HomeImages;
use App\Models\News_Advisory_Interruption\Advisory;
use App\Models\User;
use App\Models\Power;
use Illuminate\Http\Request;
use App\Models\News_Advisory_Interruption\News;
use App\Models\News_Advisory_Interruption\Interruption;
class HomeController extends Controller
{
    public function home()
    {
        $users = User::all();
        $images = HomeImages::get();
        $news = News::latest()->paginate(1);
        $recentNews = News::latest()->take(5)->get();
        $interruptions = Interruption::latest()->paginate(2);
        $advisories = Advisory::latest()->paginate(3);
        $powers = Power::get();
        return view('USER_VIEW.Home.index', compact('users', 'images', 'news','recentNews', 'interruptions', 'advisories', 'powers'));
    }

}
