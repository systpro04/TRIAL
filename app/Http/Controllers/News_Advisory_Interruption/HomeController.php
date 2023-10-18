<?php

namespace App\Http\Controllers\News_Advisory_Interruption;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\News_Advisory_Interruption\News;
use App\Models\News_Advisory_Interruption\Advisory;
use App\Models\News_Advisory_Interruption\Interruption;
use App\Models\HomeImages;
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
        $images = HomeImages::get();
        $uploads = Upload::get()->count();
        $news = News::get()->count();
        $advisories = Advisory::get()->count();
        $interruptions = Interruption::get()->count();
        return view('ADMIN_VIEW.Dashboard', compact('uploads', 'news', 'advisories', 'interruptions', 'images'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);
        if ($request->hasfile('image')) {
            $latestImages = HomeImages::latest()->first();
            if ($latestImages) {
                $oldImageArray = json_decode($latestImages->image);
                foreach ($oldImageArray as $oldImage) {
                    $oldImagePath = public_path("uploads/home_images/$oldImage");
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }
            $data = [];
            foreach ($request->file('image') as $image) {
                $nameImage = $image->getClientOriginalName();
                $image->move(public_path() . '/uploads/home_images', $nameImage);
                $data[] = $nameImage;
            }

            $images = new HomeImages();
            $images->image = json_encode($data);
            $images->save();
        }
        toastr()->success('Image Added Successfully', 'Success', ['iconClass' => 'toast-success']);
        return redirect()->route('dashboard');
    }


}