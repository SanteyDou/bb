<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Log;

class LogController extends Controller
{    
    public function logs()
    {

        return view('admin.logs', ['logs' => Log::orderBy('created_at', 'asc')->paginate(10)]);

    }

    static public function logStoreAction($data)
    {
        $log = Log::create([
            'personal_id' => $data['personal_id'],
            'location' => $data['location'],
            'action' => $data['action'],
            'place' => $data['place'],
            'matchcode' => $data['matchcode'],
            'quantity' => $data['quantity'],
            
        ]);

        //TODO: error handling

    }

}
