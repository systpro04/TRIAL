<?php

namespace App\Http\Controllers\News_Advisory_Interruption;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News_Advisory_Interruption\Interruption;
use RealRashid\SweetAlert\Facades\Alert;
class InterruptionController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
    
        $interruptions = Interruption::orderBy('created_at', 'desc')
                            ->when($query, function($q) use ($query) {
                                return $q->where('what', 'like', '%'.$query.'%')
                                         ->orWhere('where', 'like', '%'.$query.'%')
                                         ->orWhere('why', 'like', '%'.$query.'%')
                                         ->orWhere('dateTime', 'like', '%'.$query.'%');
                            })
                            ->paginate(10);
    
        return view('news_adv_int.interruption.index', compact('interruptions', 'query'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $interruptions = Interruption::all();
        // return view('interruptions.create',compact('interruptions'));
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
        Alert::toast('Created Successfully', 'success')->autoClose(3000)->timerProgressBar()->width('20rem')->padding('1.5rem');
        return redirect()->route('int.index')->with('toast_success','Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $interruption = Interruption::find($id);

        // return view('interruptions.edit',compact('interruption'));
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
         Alert::toast('Updated Successfully', 'success')->autoClose(3000)->timerProgressBar()->width('20rem')->padding('1.5rem');
        return redirect()->route('int.index')->with('toast_success','Successfully Saved');
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
        Alert::toast('Deleted Successfully', 'success')->autoClose(3000)->timerProgressBar()->width('20rem')->padding('1.5rem');
        return redirect()->back()->with('toast_success','Successfully Delete');
    }

}