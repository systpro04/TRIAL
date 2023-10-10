<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\News_Advisory_Interruption\NEws;
use App\Models\News_Advisory_Interruption\Advisory;
use App\Models\News_Advisory_Interruption\Interruption;
use App\Models\Home_Image;
use Image;
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
       
        $uploads = Upload::get();
        $news = News::get();
        $advisories = Advisory::get();
        $interruptions = Interruption::get();
        return view('Dashboard', compact('uploads', 'news', 'advisories', 'interruptions'));
    }

    public function store(Request $request, $id){

        $img = Home_Image::find($id);

        $request->validate([
            'images*' => 'required|mimes:jpeg,png,jpg,gif,svg'
            ]);
        $images = json_decode($img->images,true);
        if (is_array($images) && !empty($images)){
        foreach ($images as $deleteimage) {
                if (File::exists('uploads/home_images/' .$deleteimage)) {
                    File::delete('uploads/home_images/' .$deleteimage);
                }
            }

        }

        if ($request->hasFile('images')){

            foreach($request->file('images') as $image){

                $name = $image->getClientOriginalName();
                $image->move('uploads/home_images', $name);
                $data[] = $name;
        }
    }

        $img->images = json_encode($data);
        $img->save();
        toastr()->success('Images Uploaded Successfully');
        return redirect()->back();

    }
}

