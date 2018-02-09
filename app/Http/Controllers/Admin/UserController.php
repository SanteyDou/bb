<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

// use Illuminate\Support\facades\Input;

class UserController extends Controller
{
  public function index()
  {
    return view('admin.users', ['users' => User::orderBy('personal_id', 'asc')->get()]);
  }

  public function addUserForm()
  {    
    return view('admin.adduser');
  }

  public function addUser(Request $request)
  {
    // dd(Input::all());
    $validatedData = $request->validate([
      'name' => 'required|string',
      'personal_id' => 'required|regex:/(^S+\d{5})/|max:6',
    ]);

    try {
      $objUser = User::create(['location' => $request->input('location'),
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'personal_id' => $request->input('personal_id'),
                    'is_admin' => $request->input('admin'),
                    'password' => bcrypt($request->input('personal_id')),
                    ]);
    } catch(\Exception $e) {
      return redirect('admin/users')->with('error', "Користувача не створено");
    }
    return redirect('admin/users')->with('message', "Користувача створено");
  }

  public function editUserForm($personal_id)
  {         
    return view('admin.edituser', ['user' => User::where('personal_id', $personal_id)->first()]);
  }

  public function editUser(Request $request)
  {
    // dd(Input::all());
    $validatedData = $request->validate([
      'name' => 'required|string',
      'personal_id' => 'required|regex:/(^S+\d{5})/|max:6',
    ]);

    try {
      $objUser = User::where('personal_id', $request->input('personal_id'))->first();
      $objUser->update(['location' => $request->input('location'),
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'personal_id' => $request->input('personal_id'),
                    'is_admin' => $request->input('admin'),
                    ]);
    } catch(\Exception $e) {
      return redirect('admin/users')->with('error', "Дані користувача не змінено");
    }
    return redirect('admin/users')->with('message', "Дані користувача змінено");
  }

  public function ajaxRequest()
  {

    $user = User::where('personal_id', request()->personal_id)->first();

    return response()->json(['location' => $user->location]);

  }
}
