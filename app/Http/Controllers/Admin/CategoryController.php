<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories', ['categories' => Category::orderBy('id', 'asc')->get(), 'loc' => '']);
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

    public function editCategoryForm($id)
    {
      $category = Category::where('id', $id)->first();

      return view('admin.editcategory', ['category' => $category]);      
    }

    public function editCategory(Request $request)
    {
      try {
        $category = Category::where('id', $request->id)->first();
        $category->update(['name' => $request->name]);
      } catch(\Exception $e) {
        return redirect('admin/cat')->with('error', "Категорію не оновлено");
      }
      return redirect('admin/cat')->with('message', "Категорію оновлено");      
    }
    
}
