<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Storage;
use App\Category;
use App\Http\Controllers\Admin\LogController;

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
        return view('admin.addplace', ['loc' => $loc, 'categories' => Category::orderBy('id', 'asc')->get(), 'message' => null, 'error' => null]);
    }

    public function addPlace(Request $request)
    {

        $objStorage = Storage::create($request->input());

        if ($request->input('quantity')){
            LogController::logStoreAction($request->input());
        }   

        return view('admin.addplace', ['loc' => $request->input('location'), 'categories' => Category::orderBy('id', 'asc')->get(), 'message' => 'Місце успішно створено', 'error' => null]);
    }

    public function toOrder(Request $request)
    {
        $objStorage = Storage::whereRaw('quantity < min_quantity')
                        ->orderBy('place', 'asc')
                        ->get();
            // dump($objStorage);

        return view('admin.toorder', ['objStorage' => $objStorage]);
    }

    public function editPlaceForm($loc, $place){

        return view('admin.editplace', ['loc' => $loc, 
                                       'storage' => Storage::where(['place' => $place, 'location' => $loc])->first(),
                                       'categories' => Category::orderBy('id', 'asc')->get(), 
                                       'message' => null, 
                                       'error' => null]);
    }

    public function editPlace(Request $request){
        // dd($request);
        Storage::where(['place' => $request->place, 'location' => $request->location])
            ->first()
            ->update(['matchcode' => $request->matchcode,
                      'category_id' => $request->category_id,
                      'min_quantity' => $request->min_quantity]);
    
        return redirect()->route('admin.store', ['loc' => $request->location]);
    }
}
