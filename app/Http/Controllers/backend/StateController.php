<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\state;
use App\Models\Country;
use Illuminate\Http\Request;
use DB;

class StateController extends Controller
{

    public function index()
    {
        $states = DB::table('states')->join('countries','countries.id','=','states.country_id')->select('states.*','countries.name as country_name')->get();
        return view('states.index',compact('states'));
    }

    public function search(Request $request)
    {
        $states = DB::table('states')->join('countries','countries.id','=','states.country_id')->select('states.*','countries.name as country_name')->where('states.name', 'like', '%'.($request->search).'%')->get();
        return view('states.index',compact('states'));
    }


    public function create()
    {
        $countries = Country::all();
        return view('states.create',compact('countries'));
    }


    public function store(StateRequest $request)
    {
        state::create([
            'name' => $request->name,
            'country_id' => $request->country_id,
        ]);

        return redirect()->route('states.index')->with('message','state registered successfully');
    }


    public function edit(state $state)
    {
        $countries = Country::all();
        return view('states.edit',compact('state','countries'));
    }


    public function update(StateRequest $request, state $state)
    {
        $state->update([
            'name' => $request->name,
            'country_id' => $request->country_id,
        ]);

        return redirect()->route('states.index')->with('message','state updated successfully');
    }


    public function destroy($id)
    {
        $state = state::find($id);
        $state->delete();
        return redirect()->route('states.index')->with('message','state deleted successfully');
    }
}
