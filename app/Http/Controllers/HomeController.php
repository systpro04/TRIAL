<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\News_Advisory_Interruption\NEws;
use App\Models\News_Advisory_Interruption\Advisory;
use App\Models\News_Advisory_Interruption\Interruption;
use App\Models\Home_Image;
use File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $uploads = Upload::get()->count();
        $news = News::get()->count();
        $advisories = Advisory::get()->count();
        $interruptions = Interruption::get()->count();
        return view('Dashboard', compact('uploads', 'news', 'advisories', 'interruptions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        if ($request->hasfile('image')) {

            foreach ($request->file('image') as $image) {
                $nameImage = $image->getClientOriginalName();
                $image->move(public_path() . '/uploads/home_images', $nameImage);
                $data[] = $nameImage;
            }


            $images = new Home_Image();
            $images->image = json_encode($data);

            $images->save();
        }

        toastr()->success('Image Added Successfully', 'Success', ['iconClass' => 'toast-success']);
        return redirect()->back();
    }
}