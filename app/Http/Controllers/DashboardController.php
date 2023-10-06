<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News_Advisory_Interruption\NEws;
use App\Models\News_Advisory_Interruption\Advisory;
use App\Models\News_Advisory_Interruption\Interruption;
class DashboardController extends Controller
{
    public function index()
    {
        $users = User::get();
        $news = News::get();
        $advisories = Advisory::get();
        $interruptions = Interruption::get();
        return view('Dashboard', compact('users', 'news', 'advisories', 'interruptions'));
    }

}
