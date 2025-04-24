<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $request){      
        return $request->segment(1);    
    }

    public function index2($nama){       
        return $nama ;   
    }

    public function formulir(){
        return view('formulir');
    }
    public function proses (Request $request){
        $messages = [
            'required' => 'Input :attribute wajib diisi',
            'min'=> 'Input :attribute harus diisi minimal :min karakter!',
            'max'=> 'Input :attribute harus diisi maksimal :max karakter!',
        ];

        $request->validate([
            'nama'=> 'required|min:5|max:20',
            'alamat'=>'required|regex:/^[a-zA-Z0-9\s,.]+$/',
        ], $messages);

        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        return "Nama :".$nama.", Alamat :".$alamat;

    }
}
  