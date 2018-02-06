<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Storage;
use App\Http\Controllers\Admin\LogController;

class StoreController extends Controller
{
    public function index()
    {
        return view('main')->with('message', null);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'personal_id' => 'required|regex:/(^S+\d{5})/|max:6',
            'quantity' => 'required|integer',
        ]);

        $place = Storage::where('place', $request->input('place'))
                        ->where('location', $request->input('location'))
                        ->where('matchcode', $request->input('matchcode'))
                        ->where('category_id', $request->input('category_id'))
                        ->first();
        
        if($place){
            if ($request->input('action') == '+')
                $place->quantity += $request->input('quantity');
            else if($request->input('action') == '-')
                $place->quantity -= $request->input('quantity');

            $place->update();
        }else{
            return redirect()->route('main')->with('error', 'Помилка внесення в базу');
        }

        LogController::logStoreAction($request->input());
        
        return redirect()->route('main')->with('message', 'Дані внесено в базу');
    }   
    
}
