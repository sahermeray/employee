<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\employee;
use App\Models\Country;
use App\Models\department;
use DB;

class EmployeeController extends Controller
{
    public function getStates(Request $request){
        $states = DB::table('states')->where('country_id',$request->message)->get();
        $response = array(
            'status' => 'success',
            'msg' => $request->message,
            'states' => $states
        );
        return response()->json($response);
    }

    public function getCities(Request $request){
        $cities = DB::table('cities')->where('state_id',$request->message)->get();
        $response = array(
            'status' => 'success',
            'msg' => $request->message,
            'cities' => $cities
        );
        return response()->json($response);
    }

    public function index()
    {
        $employees = DB::table('employees')
            ->join('countries','countries.id','=','employees.country_id')
            ->join('states','states.id','=','employees.state_id')
            ->join('cities','cities.id','=','employees.city_id')
            ->join('departments','departments.id','=','employees.department_id')
            ->select('employees.*','countries.name as country_name','states.name as state_name','cities.name as city_name','departments.name as department_name')
            ->get();
        return view('employees.index',compact('employees'));
    }

    public function search(Request $request)
    {
        $employees = employee::where('name', 'like', '%'.($request->search).'%')->get();
        return view('employees.index',compact('employees'));
    }


    public function create()
    {
        $countries = Country::all();
        $departments = department::all();
        return view('employees.create',compact('countries','departments'));
    }


    public function store(EmployeeRequest $request)
    {
       employee::create([
            'country_id' => $request->country_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'department_id' => $request->department_id,
        ]);

        return redirect()->route('employees.index')->with('message','employee registered successfully');
    }


    public function edit(employee $employee)
    {
        $countries = Country::all();
        $departments = department::all();
        return view('employees.edit',compact('employee','countries','departments'));
    }


    public function update(EmployeeRequest $request, employee $employee)
    {
        $employee->update([
            'country_id' => $request->country_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'department_id' => $request->department_id,
        ]);

        return redirect()->route('employees.index')->with('message','employee updated successfully');
    }


    public function destroy($id)
    {
        $employee = employee::find($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('message','employee deleted successfully');
    }
}
