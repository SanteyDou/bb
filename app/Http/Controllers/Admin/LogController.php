<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Log;
use App\Category;

class LogController extends Controller
{    
    public function logs($loc)
    {
        $logs = Log::where('location', $loc)
                    ->orderBy('created_at', 'desc')
                    ->paginate(15);

        return view('admin.logs', ['loc' => $loc, 'logs' => $logs]);
    }

    static public function logStoreAction($data)
    {
        $category = Category::find($data['category_id'])->name;

        $log = Log::create([
            'personal_id' => $data['personal_id'],
            'location' => $data['location'],
            'action' => $data['action'],
            'place' => $data['place'],
            'category' => $category,
            'matchcode' => $data['matchcode'],
            'quantity' => $data['quantity'],            
        ]);

        //TODO: error handling

    }

    public function logsSearch(Request $request, $loc)
    {
        $logs = Log::where('location', $loc)
                    ->where('place', $request->place)
                    ->orderBy('created_at', 'desc')
                    ->paginate(15);

        if(!$request->place) {
            return $this->logs($loc);
        }

        return view('admin.logs', ['logs' => $logs, 'loc' => $loc]);
    }

    public function getCSV($loc)
    {
        $csvExporter = new \Laracsv\Export();
        $csvExporter->build(Log::orderBy('created_at', 'desc')->get(), ['personal_id', 'action', 'place', 'matchcode', 'category', 'quantity', 'created_at'])->download();
        
    }

}
