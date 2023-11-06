<?php

namespace App\Http\Controllers\ADMIN_VIEW;

use App\Http\Controllers\Controller;
use App\Models\Power;
use Illuminate\Http\Request;

class PowerSupplyController extends Controller
{
    public function index()
    {
        $powers = Power::get();
        // return view('ADMIN_VIEW.power.index', compact('powers'))->with('i', (request()->input('page', 1) - 1) * 5);
        return view('ADMIN_VIEW.power.index', compact('powers'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'capacity' => 'required',
            'morning' => 'required',
            'afternoon' => 'required',
            'evening' => 'required'
        ]);
        $powers = new Power();
        $powers->capacity = $request->capacity;
        $powers->morning = $request->morning;
        $powers->afternoon = $request->afternoon;
        $powers->evening = $request->evening;
        
        $powers->save();
        toastr()->success('Created Successfully', 'Success', ['iconClass' => 'toast-success']);
        return redirect()->route('power.index');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'capacity' => 'required',
            'morning' => 'required',
            'afternoon' => 'required',
            'evening' => 'required'
        ]);
        $power = Power::find($id);
        $power->capacity = $request->capacity;
        $power->morning = $request->morning;
        $power->afternoon = $request->afternoon;
        $power->evening = $request->evening;
        
        $power->save();
        toastr()->success('Updated Successfully', 'Success', ['iconClass' => 'toast-success']);
        return redirect()->route('power.index');
    }

    public function destroy($id)
    {
        $power = Power::find($id);
        $power->delete();

        toastr()->success('Deleted Successfully | Move to Recyclebin!!!', 'Success', ['iconClass' => 'toast-success']);
        return redirect()->back();
    }
}
