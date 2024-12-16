<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratMasukRequest;
use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use App\Models\KlasifikasiSurat;
use App\Models\TujuanSurat;
use App\Models\SuratMasuk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SuratMasukController extends Controller
{
    public function viewSm()
    {
        $user = auth()->user()->load('bagianSurat');
        // dd(auth()->user());


        if ($user->level === 'superadmin') {
            $dataSm = SuratMasuk::all();
        } elseif (in_array($user->level, ['komandan', 'wadan'])) {
            $dataSm = SuratMasuk::all();
        } else {
            $dataSm = SuratMasuk::where('bagian_id', $user->bagian_id)->get();
        }

        return view("surat-m.view-sm", ['data' => $dataSm]);
    }


    public function inputSm()
    {
        $jenisSuratOptions = JenisSurat::all();
        $klasifikasiSuratOptions = KlasifikasiSurat::all();
        $tujuanSuratOptions = TujuanSurat::all();
        return view('surat-m.input-sm', compact('jenisSuratOptions', 'klasifikasiSuratOptions', 'tujuanSuratOptions'));
    }

    public function saveSm(SuratMasukRequest $request)
    {
        $file = $request->file('file');
        $nama_file = time() . "-" . $file->getClientOriginalName();
        $file->move('file', $nama_file);

        $user = Auth::user();
        $bagianId = $user->bagian_id;

        SuratMasuk::create([
            'jenis_surat_id' => $request->jenisSurat,
            'klasifikasi_surat_id' => $request->klasifikasiSurat,
            'tgl_surat' => $request->tglSurat,
            'no_surat' => $request->noSurat,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
            'file' => "file/{$nama_file}",
            'bagian_id' => $bagianId,
        ]);

        return redirect('/view-sm')->with('toast_success', 'Data berhasil ditambahkan!');
    }



    public function editSm($id, SuratMasukRequest $request)
    {
        $suratMasuk = SuratMasuk::find($id);

        if (!$suratMasuk) {
            return redirect('/view-sm')->with('toast_error', 'Data tidak ditemukan!');
        }

        $filePath = $suratMasuk->file;

        if ($file = $request->file('file')) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $file->move('file', $nama_file);

            if (File::exists(public_path($filePath))) {
                File::delete(public_path($filePath));
            }

            $filePath = "file/{$nama_file}";
        }

        $suratMasuk->update([
            'jenis_surat_id' => $request->jenisSurat,
            'klasifikasi_surat_id' => $request->klasifikasiSurat,
            'tgl_surat' => $request->tglSurat,
            'no_surat' => $request->noSurat,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
            'file' => $filePath,
        ]);

        return redirect('/view-sm')->with('toast_success', 'Data berhasil diupdate!');
    }



    public function hapusSm($id)
    {
        $suratMasuk = SuratMasuk::find($id);

        if (!$suratMasuk) {
            return redirect('/view-sm')->with('toast_error', 'Data tidak ditemukan!');
        }

        if (File::exists(public_path($suratMasuk->file))) {
            File::delete(public_path($suratMasuk->file));
        }

        $suratMasuk->delete();

        return redirect('/view-sm')->with('toast_success', 'Data berhasil dihapus!');
    }
}
