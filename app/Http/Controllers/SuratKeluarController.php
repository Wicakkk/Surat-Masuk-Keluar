<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratKeluarRequest;
use App\Models\JenisSurat;
use App\Models\KlasifikasiSurat;
use App\Models\TujuanSurat;
use App\Models\SuratKeluar;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class SuratKeluarController extends Controller
{
    public function viewSk()
    {
        $user = Auth::user();

        // Jika superadmin, tampilkan semua surat keluar
        if ($user->level === 'superadmin') {
            $dataSk = SuratKeluar::all();
        } elseif (in_array($user->level, ['komandan', 'wadan'])) {
            // Komandan dan Wadan dapat melihat semua
            $dataSk = SuratKeluar::all();
        } else {
            // Pengguna lain hanya dapat melihat surat yang sesuai bagian mereka
            $dataSk = SuratKeluar::where('bagian_id', $user->bagian_id)->get();
        }

        return view("surat-k.view-sk", ['data' => $dataSk]);
    }

    public function inputSk()
    {
        $jenisSuratOptions = JenisSurat::all();
        $klasifikasiSuratOptions = KlasifikasiSurat::all();
        $tujuanSuratOptions = TujuanSurat::all();
        return view("surat-k.input-sk", compact('jenisSuratOptions', 'klasifikasiSuratOptions', 'tujuanSuratOptions'));
    }

    public function saveSk(SuratKeluarRequest $request)
    {
        //  dd(vars: $request->all());
        $file = $request->file('file');
        $nama_file = time() . "-" . $file->getClientOriginalName();
        $file->move('file', $nama_file);

        SuratKeluar::create([
            'noSkeluar' => $request->noSkeluar,
            'tglKeluar' => $request->tglKeluar,
            'tujuan_surat_id' => $request->tujuan_surat_id,
            'jenis_surat_id' => $request->jenis_surat_id,
            'klasifikasi_surat_id' => $request->klasidikasi_surat_id,
            'perihal' => $request->perihal,
            'file' => "file/{$nama_file}",
        ]);


        return redirect('/view-sk')->with('toast_success', 'Data berhasil ditambahkan!');
    }

    public function updateSk(SuratKeluar $suratKeluar, SuratKeluarRequest $request)
    {
        $filePath = $suratKeluar->file;
        if ($file = $request->file('file')) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $file->move('file', $nama_file);

            if (File::exists(public_path($filePath))) {
                File::delete(public_path($filePath));
            }
            $filePath = "file/{$nama_file}";
        }

        $suratKeluar->update([
            'noSkeluar' => $request->noSkeluar,
            'tglKeluar' => $request->tglKeluar,
            'tujuan_surat_id' => $request->tujuanSurat,
            'jenis_surat_id' => $request->jenisSurat,
            'klasifikasi_surat_id' => $request->klasifikasiSurat,
            'perihal' => $request->perihal,
            'file' => $filePath,
        ]);

        return redirect('/view-sk')->with('toast_success', 'Data berhasil diupdate!');
    }

    public function hapusSk($idSkeluar)
    {
        $suratKeluar = SuratKeluar::find($idSkeluar);

        if (!$suratKeluar) {
            return redirect('/view-sk')->with('toast_error', 'Data tidak ditemukan!');
        }

        if (File::exists(public_path($suratKeluar->file))) {
            File::delete(public_path($suratKeluar->file));
        }

        $suratKeluar->delete();

        return redirect('/view-sk')->with('toast_success', 'Data berhasil dihapus!');
    }
}
