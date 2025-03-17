<?php

namespace App\Http\Controllers\Backend;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendidikanController extends Controller
{
    public function index()
    {
        $pendidikan = Pendidikan::all(); // Ambil semua data pendidikan
        return view('backend.pendidikan.index', compact('pendidikan'));
    }

    public function create()
    {
        return view('backend.pendidikan.create'); // Pastikan ada view ini
    }

    public function store(Request $request)
    {
        // Validasi data sebelum menyimpan
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkatan' => 'required|string|max:100',
            'tahun_masuk' => 'required|integer',
            'tahun_keluar' => 'nullable|integer',
        ]);

        Pendidikan::create($request->all());

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data Pendidikan Berhasil Disimpan');
    }

    public function edit($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        return view('backend.pendidikan.create', compact('pendidikan'));
    }


    public function update(Request $request, $id)
    {
        // Validasi data sebelum menyimpan perubahan
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkatan' => 'required|in:1,2,3,4,5,6', // Hanya menerima nilai yang ada dalam pilihan
            'tahun_masuk' => 'required|integer|min:1900|max:' . date('Y'), // Tahun masuk tidak boleh lebih dari tahun sekarang
            'tahun_keluar' => 'nullable|integer|min:1900|max:' . date('Y') . '|gte:tahun_masuk', // Tahun keluar minimal tahun masuk
        ]);

        // Ambil data berdasarkan ID
        $pendidikan = Pendidikan::findOrFail($id);

        // Perbarui data
        $pendidikan->fill([
            'nama' => $request->nama,
            'tingkatan' => $request->tingkatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ])->save();

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data Pendidikan berhasil diperbarui');
    }


    public function destroy($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->delete();

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
