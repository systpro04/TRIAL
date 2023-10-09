<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use File;

class UploadController extends Controller
{
    public function index()
    {
        $uploads = Upload::orderBy('created_at', 'desc')->paginate(5);
        return view('upload.index', compact('uploads'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'nullable|mimes:mp4,ogx,oga,ogv,ogg,webm'

        ]);
        $uploads = new Upload;
        $uploads->title = $request->input('title');

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $request->file('file')->move('uploads/videos', $filename);
            $uploads->file = $filename;

        }
        $uploads->save();
        toastr()->success('Video Uploaded Successfully');
        return redirect()->route('upload.index');
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'file' => 'nullable|mimes:mp4,ogx,oga,ogv,ogg,webm'

        ]);
        $uploads = Upload::find($id);
        $uploads->title = $request->input('title');

        if ($request->hasFile('file')) {

            $destination = 'uploads/videos/' . $uploads->file;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $request->file('file')->move('uploads/videos/', $filename);
            $uploads->file = $filename;

        }

        $uploads->update();
        toastr()->success('Video Updated Successfully');
        return redirect()->route('upload.index');

    }

    public function destroy($id)
    {

        $uploads = Upload::find($id);
        $destination = 'uploads/videos/' . $uploads->file;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $uploads->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->back();
    }

}