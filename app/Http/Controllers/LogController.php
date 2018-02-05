<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    static public function logStoreAction($data)
    {
        $log = $data['personal_id'] . ";" 
             . $data['action'] . ";"
             . $data['quantity'] . ";"
             . $data['place'] . ";"
             . $data['matchcode'] . ";"
             . $data['location'] . ";";
        
    }
}
