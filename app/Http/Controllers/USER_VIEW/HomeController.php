<?php

namespace App\Http\Controllers\USER_VIEW;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News_Advisory_Interruption\News;
use App\Models\News_Advisory_Interruption\Interruption;
class HomeController extends Controller
{
    public function home()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(3);
        $interruptions = Interruption::orderBy('created_at', 'desc')->paginate(2);
        return view('USER_VIEW.Home.index', compact('news', 'interruptions'));
        // return redirect()->route('user_home', compact('news'));
    }

}
