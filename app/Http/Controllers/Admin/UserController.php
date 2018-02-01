<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

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
      $validatedData = $request->validate([
        'name' => 'required|string',
        'personal_id' => 'required|regex:/(^S+\d{5})/|max:6',
        'email' => 'required',
      ]);

      $objUser = User::create(['location' => $request->input('location'),
                      'name' => $request->input('name'),
                      'email' => $request->input('email'),
                      'personal_id' => $request->input('personal_id'),
                      'is_admin' => $request->input('admin'),
                      'password' => bcrypt($request->input('personal_id')),
                      ]);

      if(!$objUser) {
          ehco(error);
      }

      return redirect('admin/users');
    }
}
