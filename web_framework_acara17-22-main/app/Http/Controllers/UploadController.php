<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManagerStatic as Image;


class UploadController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function proses_upload(Request $request)
    {
        $request->validate( [
            'file' => 'required',
            'keterangan' => 'required',
        ]);

        // Menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        // Nama file
        echo 'File Name: ' . $file->getClientOriginalName() . '<br>';

        // Ekstensi file
        echo 'File Extension: ' . $file->getClientOriginalExtension() . '<br>';

        // Real path
        echo 'File Real Path: ' . $file->getRealPath() . '<br>';

        // Ukuran file
        echo 'File Size: ' . $file->getSize() . '<br>';

        // Tipe MIME
        echo 'File Mime Type: ' . $file->getMimeType();

        // Tentukan folder tujuan penyimpanan
        $tujuan_upload = 'data_file';

        // Upload file ke folder tujuan
        $file->move($tujuan_upload, $file->getClientOriginalName());
    }

    public function resize_upload(Request $request)
    {
        $request->validate([
            "file" => "required",
            "keterangan" => "required",
        ]);

        $path = public_path("img/logo");

        if (!File::isDirectory($path)) {
            File::makeDirectory($path,0777, true);
        }

        $file = $request->file("file");
        $fileName = 'logo'. uniqid() . '.' . $file->getClientOriginalExtension();

        $file->move($path, $fileName);

        $manager = new ImageManager(new Driver());
        $image = $manager->read($path . '/' . $fileName);

        $canvas = $image->resizeCanvas(500, 700, 'fff');

        $resizeImage = $image->scale(500);

        $canvas->place($resizeImage, 'center');

        if ($canvas->save($path . '/' . $fileName)) {
            return redirect()->route('upload')->with('success','Data berhasil ditambahkan');
        } else {
            return redirect()->route('upload')->with('error', 'Data gagal ditambahkan');
        }
    }
        // Menampilkan form upload dropzone
        public function dropzone()
        {
            return view('dropzone');  
        }

    public function dropzone_store(Request $request)
    {
        // Validasi file yang di-upload
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Mengambil file yang di-upload
        $image = $request->file('file');

        // Membuat nama file yang unik
        $imageName = Str::random(40) . '.' . $image->extension();

        // Menyimpan file ke folder public/img/dropzone
        $image->move(public_path('img/dropzone'), $imageName);

        // Mengembalikan response JSON
        return response()->json(['success' => $imageName]);
    }

    // Menampilkan form upload PDF
    public function pdf_upload()
    {
        return view('upload_PDFDropzone');  
    }

    // Menyimpan file PDF yang di-upload
    public function pdf_store(Request $request)
    {
        // Validasi file yang di-upload
        $request->validate([
            'file' => 'required|mimes:pdf|max:10240',  // Membatasi hanya file PDF dan ukuran maksimal 10 MB
        ]);

        // Mengambil file yang di-upload
        $pdf = $request->file('file');

        // Membuat nama file yang unik
        $pdfName = 'pdf_' . time() . '.' . $pdf->extension();

        // Pastikan folder tujuan ada, jika tidak, buat folder
        if (!File::isDirectory(public_path('pdf/dropzone'))) {
            File::makeDirectory(public_path('pdf/dropzone'), 0777, true);
        }

        // Menyimpan file PDF di folder public/pdf/dropzone
        $pdf->move(public_path('pdf/dropzone'), $pdfName);

        // Mengembalikan respons JSON dengan nama file yang berhasil di-upload
        return response()->json(['success' => $pdfName]);
    }
}
