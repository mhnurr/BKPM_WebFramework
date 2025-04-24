<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create (Request $request){
        $request->session()->put('nama', 'Politeknik Negeri Jember');
        echo"Data Telah Ditambahkan Pada Sessions";
    }

    public function show (Request $request){
        if($request->session()->has('nama')){
            echo $request->session()->get('nama');
        } else{
            echo 'Tidak ada data dalam sesions';
        };
    }

    public function delete (Request $request){
        $request->session()->forget('nama');
        echo"Data Telah Dihapus pada Sessions";
    }
    
}
