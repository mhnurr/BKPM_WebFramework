<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementUserController extends Controller
{
    public function index()
    {
        $nama = 'Moh Nur Huda';  
        $mataKuliah = ["Web Framework, Mobile Framework, Literasi Digital"];
        
        return view('home', compact('nama', 'mataKuliah')); //compact digunakan untuk mengirimkan data ke view
    }
}