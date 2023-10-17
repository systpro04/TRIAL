<?php

namespace App\Http\Controllers\News_Advisory_Interruption;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News_Advisory_Interruption\Advisory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
class AdvisoryController extends Controller
{
    public function index(Request $request)
    {
        $advisories = Advisory::orderBy('created_at', 'desc')->paginate(5);
        return view('ADMIN_VIEW.news_adv_int.advisory.index', compact('advisories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $advisories = Advisory::all();
        // return view('advisory.create',compact('advisories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'place' => 'required',
            'info' => 'required',
            'dateTime' => 'required'
        ]);
        $advisories = new Advisory();
        $advisories->place = $request->place;
        $advisories->info = $request->info;
        $advisories->dateTime = $request->dateTime;
        
        $advisories->save();
        toastr()->success('Created Successfully', 'Success', ['iconClass' => 'toast-success']);
        return redirect()->route('advisories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
        // $advisory = Advisory::find($id);
        // return view('advisory.edit',compact('advisory'));
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
        $this->validate($request,[
            'place' => 'required',
            'info' => 'required',
            'dateTime' => 'required'
        ]);

        $advisory = Advisory::find($id);
        $advisory->place = $request->place;
        $advisory->info = $request->info;
        $advisory->dateTime = $request->dateTime;
       
        $advisory->save();
        toastr()->success('Updated Successfully', 'Success', ['iconClass' => 'toast-success']);
        return redirect()->route('advisories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advisory = Advisory::find($id);
        $advisory->delete();

        toastr()->success('Deleted Successfully', 'Success', ['iconClass' => 'toast-success']);
        return redirect()->back();
    }

}