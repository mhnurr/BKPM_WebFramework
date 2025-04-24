<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function index(Request $request){
        if( $request->segment(2) !== null)
        {
            $nama= $request->segment(2);
            echo $nama;
    } else{
        abort(403);
}
    }
}