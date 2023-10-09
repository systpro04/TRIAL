<?php

namespace App\Http\Controllers\News_Advisory_Interruption;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News_Advisory_Interruption\Advisory;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
class AdvisoryController extends Controller
{
    public function index(Request $request)
    {
        $advisories = Advisory::orderBy('created_at', 'desc')->paginate(5);

        foreach ($advisories as $adv) {
            // Split the date range into start and end date strings
            $dateStrings = explode(' - ', $adv->dateTime);
    
            // Parse start and end dates
            $adv->formattedDateTime = Carbon::createFromFormat('m/d/Y h:iA', $dateStrings[0])->format('M d, Y h:i A');
            $adv->formattedEndDate = Carbon::createFromFormat('m/d/Y h:iA', $dateStrings[1])->format('M d, Y h:i A');
        }

        return view('news_adv_int.advisory.index', compact('advisories'));
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
        toastr()->success('Created Successfully');
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
    public function edit($id)
    {
        // $advisory = Advisory::find($id);
        // return view('advisory.edit',compact('advisory'));
    }

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
        toastr()->success('Updated Successfully');
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

        toastr()->success('Deleted Successfully');
        return redirect()->back();
    }

}