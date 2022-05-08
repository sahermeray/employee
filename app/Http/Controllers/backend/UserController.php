<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function search(Request $request)
    {
        $users = User::where('username', 'like', '%'.($request->search).'%')->orWhere('email','like','%'.($request->search).'%')->get();
        return view('users.index',compact('users'));
    }

    public function changePassword(Request $request,$id)
    {
        $request->validate([
            'password'=>['required'],
            'password_confirmation'=>['required','same:password']
        ]);
        $user = User::find($id);
        $user->update([
          'password'=>Hash::make($request->password)
        ]);

        return redirect()->route('users.index')->with('message','password has changed successfully');
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(UserStoreRequest $request)
    {
            User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('message','user registered successfully');
    }


    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }


    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        return redirect()->route('users.index')->with('message','user updated successfully');
    }


    public function destroy($id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('users.index')->with('message','user cant be deleted');
        }
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('message','user deleted successfully');
    }
}
