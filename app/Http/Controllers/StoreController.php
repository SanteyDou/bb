<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Storage;
use App\Category;
use App\Http\Controllers\Admin\LogController;

class StoreController extends Controller
{
    public function index()
    {
        return view('main')->with(['message' => null, 'categories' => Category::all(), 'objStorage' => '']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'personal_id' => 'required|regex:/(^S+\d{5})/|max:6',
            'quantity' => 'required|integer',
        ]);

        $place = Storage::where('place', $request->input('place'))
                        ->where('location', $request->input('location'))
                        ->whereRaw('matchcode LIKE ?', ["%".$request->input('matchcode')."%"])
                        ->where('category_id', $request->input('category_id'))
                        ->first();
        // dd($request);
        
        

        if($place){
            
            if($request->input('action') == '-' && $place->quantity < $request->input('quantity')){
                return redirect()->route('main')->with('error', 'Немає такої кількості матеріалу на даному місці')->withInput();
            }

            if ($request->input('action') == '+')
                $place->quantity += $request->input('quantity');
            else if($request->input('action') == '-')
                $place->quantity -= $request->input('quantity');

            $place->update();
        }else{
            return redirect()->route('main')->with('error', 'Помилка внесення в базу')->withInput();
        }

        LogController::logStoreAction($request->input());
        
        return redirect()->route('main')->with('message', 'Дані внесено в базу');
    }

    public function ajaxRequestByPlace()
    {
  
      $place = Storage::where('place', request()->place)->first();
  
      return response()->json(['category_id' => $place->category_id, 'category' => $place->category->name, 'matchcode' => $place->matchcode, 'quantity' => $place->quantity]);
  
    }

    public function ajaxRequestByMatchcode()
    {
  
    //   $places = Storage::where('matchcode', request()->matchcode)->where('category_id',  request()->category_id)->get()->toJson();
      $place = Storage::whereRaw('matchcode LIKE ?', ["%".request()->matchcode."%"]) 
                ->where('category_id',  request()->category_id)
                ->where('quantity', '>', 0)
                ->first();

    //   return response()->json($places);
      return response()->json(['place' => $place->place, 'quantity' => $place->quantity]);
  
    }

    public function ajaxRequestSearch()
    {
        if(request()->matchcode != '') {
            $places = Storage::where('category_id',  request()->category_id)
                            ->where('location',  request()->location)
                            ->whereRaw('matchcode LIKE ?', ["%".request()->matchcode."%"])
                            ->get();
            //  $place = Storage::where('matchcode', request()->matchcode)->where('category_id',  request()->category_id)->where('quantity', '>', 0)->first();

            return response()->json($places);
            //  return response()->json(['place' => $place->place, 'quantity' => $place->quantity]);
        }
      
  
    }
    
}
