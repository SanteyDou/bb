<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories', ['categories' => Category::orderBy('id', 'asc')->get()]);
    }

    public function addCategoryForm()
    {    
        return view('admin.addcategory');
    }

    public function addCategory(Request $request)
    {
      // dd(Input::all());
      $validatedData = $request->validate([
        'name' => 'required|string',
      ]);

      try {
        $objUser = Category::create([
                      'name' => $request->input('name'),
                      ]);
      } catch(\Exception $e) {
        return redirect('admin/cat')->with('error', "Категорію не створено");
      }
      return redirect('admin/cat')->with('message', "Категорію створено");
    }
}
