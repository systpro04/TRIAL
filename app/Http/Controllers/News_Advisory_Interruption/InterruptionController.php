<?php

namespace App\Http\Controllers\News_Advisory_Interruption;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News_Advisory_Interruption\Interruption;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class InterruptionController extends Controller
{
    public function index(Request $request)
    {
        $interruptions = Interruption::latest()->paginate(5);

        return view('ADMIN_VIEW.news_adv_int.interruption.index', compact('interruptions'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     // $interruptions = Interruption::all();
    //     // return view('interruptions.create',compact('interruptions'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'what' => 'required',
            'dateTime' => 'required',
            'where' => 'required',
            'why' => 'required'
        ]);

        $interruptions = new Interruption();
        $interruptions->what = $request->what;
        $interruptions->dateTime = $request->dateTime;
        $interruptions->where = $request->where;
        $interruptions->why = $request->why;

        $interruptions->save();
        toastr()->success('Created Successfully', 'Success', ['iconClass' => 'toast-success']);
        return redirect()->route('interruptions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {

    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     // $interruption = Interruption::find($id);
    //     // return view('interruptions.edit',compact('interruption'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'what' => 'required',
            'dateTime' => 'required',
            'where' => 'required',
            'why' => 'required'
        ]);
        $interruption = Interruption::find($id);
        $interruption->what = $request->what;
        $interruption->dateTime = $request->dateTime;
        $interruption->where = $request->where;
        $interruption->why = $request->why;

        $interruption->save();
        toastr()->success('Updated Successfully', 'Success', ['iconClass' => 'toast-success']);
        return redirect()->route('interruptions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interruption = Interruption::find($id);
        $interruption->delete();
        toastr()->success('Deleted Successfully | Move to Recyclebin!!!', 'Success', ['iconClass' => 'toast-success']);
        return redirect()->back();
    }

}