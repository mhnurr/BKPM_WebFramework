<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import Validator

class PegawaiController extends Controller
{
    public function formulir()
    {
        return view('formulir');
    }

    public function proses(Request $request)
    {
        $messages = [
            'required' => 'Input :attribute wajib diisi!',
            'min' => 'Input :attribute harus diisi minimal :min karakter!',
            'max' => 'Input :attribute harus diisi maksimal :max karakter!',
        ];

        // Buat validator manual agar bisa menangani error
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:5|max:20',
            'alamat' => 'required|string', // Gunakan string agar alamat bisa menerima karakter lain
        ], $messages);

        // Jika validasi gagal, kembalikan ke halaman form dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, lanjutkan
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        return "Nama : " . $nama . ", Alamat : " . $alamat;
    }
}


