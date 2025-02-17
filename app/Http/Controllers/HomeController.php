<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
        ]);

        // Simpan data ke database atau proses lainnya
        // Contoh: Simpan ke log untuk debugging
        Log::info('Data yang dikirim: ' . json_encode($request->all()));
        // Kembalikan respon JSON
        return response()->json(['success' => true, 'message' => 'Data berhasil dikirim']);
    }
}
