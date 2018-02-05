<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Storage;

class StoreController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function storeByLocation($loc)
    {
        
        if (in_array($loc, ['ter', 'che', 'cho'])) {
            $objStorage = Storage::where('location', $loc)
                        ->orderBy('place', 'asc')
                        ->get();
            // dump($objStorage);
            return view('admin.store', ['loc' => $loc, 'objStorage' => $objStorage]);
        };

        return view('admin.index');
    }

    public function addPlaceForm($loc)
    {
        return view('admin.addplace', ['loc' => $loc]);
    }

    public function addPlace(Request $request)
    {
        $objStorage = Storage::create(['location' => $request->input('location'),
                        'place' => $request->input('place'),
                        'matchcode' => $request->input('matchcode'),
                        'min_quantity' => $request->input('min-quantity'),
                        ]);
        if(!$objStorage) {
            ehco(error);
        }

        return view('admin.addplace', ['loc' => $request->input('location')]);
    }

    public function toOrder(Request $request)
    {
        $objStorage = Storage::whereRaw('quantity < min_quantity')
                        ->orderBy('place', 'asc')
                        ->get();
            // dump($objStorage);

        return view('admin.toorder', ['objStorage' => $objStorage]);
    }
}
