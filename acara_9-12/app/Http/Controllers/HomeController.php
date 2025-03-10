<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Pastikan ada ini!

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Pastikan ini berada dalam class yang benar
    }

    public function index()
    {
        return view('home'); // Pastikan 'butterfly' ada di folder views
    }
}
