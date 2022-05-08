<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Http\Requests\CountryUpdateRequest;
use App\Models\Country;
use Illuminate\Http\Request;


class CountryController extends Controller
{

    public function index()
    {
        $countries = Country::all();
        return view('countries.index',compact('countries'));
    }

    public function search(Request $request)
    {
        $countries = Country::where('name', 'like', '%'.($request->search).'%')->get();
        return view('countries.index',compact('countries'));
    }


    public function create()
    {
        return view('countries.create');
    }


    public function store(CountryRequest $request)
    {
        Country::create([
            'name' => $request->name,
            'country_code' => $request->country_code,
        ]);

        return redirect()->route('countries.index')->with('message','country registered successfully');
        //return "saher";
    }


    public function edit(Country $country)
    {
        return view('countries.edit',compact('country'));
    }


    public function update(CountryUpdateRequest $request, Country $country)
    {
        $country->update([
            'name' => $request->name,
            'country_code' => $request->country_code,
        ]);

        return redirect()->route('countries.index')->with('message','country updated successfully');
    }


    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();
        return redirect()->route('countries.index')->with('message','country deleted successfully');
    }
}
