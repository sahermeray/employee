<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\city;
use App\Models\state;
use Illuminate\Http\Request;
use DB;


class CityController extends Controller
{

    public function index()
    {

        $cities = DB::table('cities')->join('states','states.id','=','cities.state_id')->select('cities.*','states.name as state_name')->get();
        return view('cities.index',compact('cities'));
    }

    public function search(Request $request)
    {
        $cities = DB::table('cities')->join('states','states.id','=','cities.state_id')->select('cities.*','states.name as state_name')->where('cities.name', 'like', '%'.($request->search).'%')->get();
        return view('cities.index',compact('cities'));

    }


    public function create()
    {
        $states = state::all();
        return view('cities.create',compact('states'));
    }


    public function store(CityRequest $request)
    {
        city::create([
            'name' => $request->name,
            'state_id' => $request->state_id,
        ]);

        return redirect()->route('cities.index')->with('message','city registered successfully');
    }


    public function edit(city $city)
    {
        $states = state::all();
        return view('cities.edit',compact('city','states'));
    }


    public function update(CityRequest $request, city $city)
    {
        $city->update([
            'name' => $request->name,
            'state_id' => $request->state_id,
        ]);

        return redirect()->route('cities.index')->with('message','city updated successfully');
    }


    public function destroy($id)
    {
        $city = city::find($id);
        $city->delete();
        return redirect()->route('cities.index')->with('message','city deleted successfully');
    }
}
