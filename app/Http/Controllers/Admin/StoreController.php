<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

use App\Storage;
use App\Category;
use App\Http\Controllers\Admin\LogController;

class StoreController extends Controller
{
    public function index()
    {
        return view('admin.index', ['message' => null, 'error' => null, 'loc' => '']);
    }

    public function storeByLocation($loc)
    {        
        if (in_array($loc, ['ter', 'che', 'cho'])) {
            $objStorage = Storage::where('location', $loc)         
                        ->orderByRaw('LEFT(place, 3) asc, CAST(substr(place,4) as unsigned) desc')                        
                        ->paginate(15);
            // dump($objStorage);
            return view('admin.store', ['loc' => $loc, 'objStorage' => $objStorage]);
        };

        return view('admin.index');
    }

    public function storeByMatchcode($loc, Request $request)
    {        
        if (in_array($loc, ['ter', 'che', 'cho'])) {
            $objStorage = Storage::where('location', $loc)
                        ->whereRaw('matchcode LIKE ?', ["%".request()->matchcode."%"])         
                        ->orderByRaw('LEFT(place, 3) asc, CAST(substr(place,4) as unsigned) desc') 
                        ->paginate(15);
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

    public function editPlaceForm($loc, $place){

        return view('admin.editplace', ['loc' => $loc, 
                                       'storage' => Storage::where(['place' => $place, 'location' => $loc])->first(),
                                       'categories' => Category::orderBy('id', 'asc')->get(), 
                                       'message' => '', 
                                       'error' => '']);
    }

    public function editPlace(Request $request)
    {
        $place = Storage::where(['place' => $request->place, 'location' => $request->location])->first();

        if($place->quantity != 0){
            return view('admin.editplace', ['loc' => $request->location, 
                                       'storage' => Storage::where(['place' => $request->place, 'location' => $request->location])->first(),
                                       'categories' => Category::orderBy('id', 'asc')->get(), 
                                       'message' => '', 
                                       'error' => 'Для редагування місце повинно бути порожнім']);
        }

        $place->update(['matchcode' => $request->matchcode,
                      'place' => $request->place_new,
                      'category_id' => $request->category_id,
                      'min_quantity' => $request->min_quantity]);
    
        return redirect()->route('admin.store', ['loc' => $request->location]);
    }

    public function toOrder($loc)
    {
        $objStorage = Storage::whereRaw('(quantity < min_quantity OR (status IS NOT NULL OR email_send IS NOT NULL OR ebm_started IS NOT NULL)) AND location=?', [$loc])
                        ->orderByRaw('LEFT(place, 3) asc, CAST(substr(place,4) as unsigned) desc')
                        ->paginate(15);
            // dump($objStorage);

        return view('admin.toorder', ['objStorage' => $objStorage, 'loc' => $loc]);
    }

    public function toOrderGetCSV($loc)
    {   
        $data = Storage::whereRaw('quantity < min_quantity')
                                    ->where('location', $loc)
                                    ->orderByRaw('LEFT(place, 3) asc, CAST(substr(place,4) as unsigned) desc')
                                    ->get(['location', 'place', 'matchcode', 'quantity', 'min_quantity']);;

        Excel::create("places", function($excel) use($data) {
                $excel->sheet('Sheet 1', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        })->download('xlsx');

        // $csvExporter = new \Laracsv\Export();
        // $csvExporter->build(Storage::whereRaw('quantity < min_quantity')
        //                             ->where('location', $loc)
        //                             ->orderByRaw('LEFT(place, 3) asc, CAST(substr(place,4) as unsigned) desc')->get(), ['location', 'place', 'matchcode', 'category.name', 'quantity', 'min_quantity'])->download();       
    }

    public function editToOrderForm($loc, $place)
    {
        return view('admin.editorder', ['loc' => $loc, 
                                       'storage' => Storage::where(['place' => $place, 'location' => $loc])->first(),
                                       'categories' => Category::orderBy('id', 'asc')->get(),
                                       'message' => null, 
                                       'error' => null]);
    }

    public function editToOrder(Request $request){

        // dump($request);

        $place = Storage::where(['place' => $request->place, 'location' => $request->location])->first();

        $place->update(['status' => $request->status,
                      'email_send' => $request->email_send,
                      'ebm_started' => $request->ebm_started]);
    
        return $this->toOrder($request->location);
    }
    
    public function getCSV($loc)
    {
        $data = Storage::where('location', $loc)
                    ->orderByRaw('LEFT(place, 3) asc, CAST(substr(place,4) as unsigned) desc')
                    ->get(['location', 'place', 'matchcode', 'quantity']);

        $name = date("Y-m-d H:i:s");

        Excel::create($name , function($excel) use($data) {
                $excel->sheet('Sheet 1', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        })->download('xlsx');

        // $csvExporter = new \Laracsv\Export();
        // $csvExporter->build(Storage::where('location', $loc)
        //             ->orderByRaw('LEFT(place, 3) asc, CAST(substr(place,4) as unsigned) desc')
        //             ->get(), ['place', 'matchcode', 'quantity'])
        //             ->download();
        
    }
}
