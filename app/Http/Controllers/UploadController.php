<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use File;
use RealRashid\SweetAlert\Facades\Alert;
class UploadController extends Controller
{
    public function index()
    {
        $uploads = Upload::latest()->paginate(5);
        return view('ADMIN_VIEW.upload.index', compact('uploads'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        toastr()->success('Video Updated Successfully', 'Success', ['iconClass' => 'toast-success']);
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
        toastr()->success('Deleted Successfully | Move to Recyclebin!!!', 'Success', ['iconClass' => 'toast-success']);
        // Alert::toast('Deleted Successfully', 'success')->autoClose(3000)->timerProgressBar()->width('20rem')->padding('1.5rem');
        return redirect()->back();
    }

}