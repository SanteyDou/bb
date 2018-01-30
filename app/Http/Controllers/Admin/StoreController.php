<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function storeByLocation($loc)
    {
        
        if (in_array($loc, ['ter', 'che', 'cho'])) {
            // dump($loc);
            return view('admin.store', ['loc' => $loc]);
        };

        return view('admin.index');
    }
}
