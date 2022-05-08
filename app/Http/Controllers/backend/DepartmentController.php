<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\department;
use Illuminate\Http\Request;


class DepartmentController extends Controller
{

    public function index()
    {
        $departments = department::all();
        return view('departments.index',compact('departments'));
    }

    public function search(Request $request)
    {
        $departments = department::where('name', 'like', '%'.($request->search).'%')->get();
        return view('departments.index',compact('departments'));
    }




    public function create()
    {
        return view('departments.create');
    }


    public function store(DepartmentRequest $request)
    {
        department::create([
            'name' => $request->name,
        ]);

        return redirect()->route('departments.index')->with('message','department registered successfully');
    }


    public function edit(department $department)
    {
        return view('departments.edit',compact('department'));
    }


    public function update(DepartmentRequest $request, department $department)
    {
        $department->update([
            'name' => $request->name,
        ]);

        return redirect()->route('departments.index')->with('message','department updated successfully');
    }


    public function destroy($id)
    {
        $department = department::find($id);
        $department->delete();
        return redirect()->route('departments.index')->with('message','department deleted successfully');
    }
}
