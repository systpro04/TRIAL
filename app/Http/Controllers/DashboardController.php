<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\News_Advisory_Interruption\NEws;
use App\Models\News_Advisory_Interruption\Advisory;
use App\Models\News_Advisory_Interruption\Interruption;
class DashboardController extends Controller
{
    public function index()
    {
        $uploads = Upload::get();
        $news = News::get();
        $advisories = Advisory::get();
        $interruptions = Interruption::get();
        return view('Dashboard', compact('uploads', 'news', 'advisories', 'interruptions'));
    }

}
