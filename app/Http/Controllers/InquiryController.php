<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class InquiryController extends Controller
{

    public function index()
    {
        return view('search');
    }
    public function search()
    {
        $response = Http::get('https://dummyjson.com/users');
        if ($response->ok()) {
            return $response->json();
        }
    }
    public function search_data(Request $request)
    {
        $query = $request->input('query');
        $response = Http::get('https://dummyjson.com/users?query=' . $query);
        if ($response->ok()) {
            return $response->json();
        }
        return response()->json(['error' => 'Search failed'], 500);
    }
}

