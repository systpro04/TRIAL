<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class DashboardController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('Dashboard', compact('users'));
    }

}
