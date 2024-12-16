<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\jenisSurat as ModelsJenisSurat;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Support\Facades\File;

class SuratController extends Controller
{
    //View Layout
    public function Main()
    {
        return view("layouts.main");
    }

    public function index()
{
    $user = auth()->user();
    $bagianId = $user->bagian_id;

    if (in_array($user->level, ['superadmin', 'komandan', 'wadan'])) {
        $suratMasukCount = SuratMasuk::count();
        $suratKeluarCount = SuratKeluar::count();
    } else {
        $suratMasukCount = SuratMasuk::where('bagian_id', $bagianId)->count();
        $suratKeluarCount = SuratKeluar::where('bagian_id', $bagianId)->count();
    }

    return view('index', [
        'data' => [
            'SuratMasuk' => $suratMasukCount,
            'SuratKeluar' => $suratKeluarCount,
        ],
    ]);
}

}
