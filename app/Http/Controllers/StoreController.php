<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Storage;

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
                        ->first();
        
        if($place){
            if ($request->input('action') == 'add')
                $place->quantity += $request->input('quantity');
            else if($request->input('action') == 'remove')
                $place->quantity -= $request->input('quantity');

            $place->update();
        }else{
            return redirect()->route('main')->with('message', 'Помилка внесення в базу');
        }

        return redirect()->route('main')->with('message', 'Дані внесено в базу');
    }
    
}
