<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\KlasifikasiSurat;
use App\Models\TujuanSurat;
use Illuminate\Http\Request;

class TujuanSuratController extends Controller
{
    public function create()
    {
        $jenisSuratOptions = JenisSurat::all(); // Getting Jenis Surat options
        $klasifikasiSuratOptions = KlasifikasiSurat::all(); // Getting Klasifikasi Surat options
        $tujuanSuratOptions = TujuanSurat::all(); // Getting Tujuan Surat options

        return view('surat-m.input-sm', compact('jenisSuratOptions', 'klasifikasiSuratOptions', 'tujuanSuratOptions'));
    }

}
