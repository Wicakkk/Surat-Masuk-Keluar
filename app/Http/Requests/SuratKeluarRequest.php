<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratKeluarRequest extends FormRequest
{
    public function authorize()
    {
        // Mengizinkan semua pengguna yang memiliki
        return true;
    }

    public function rules()
    {
        return [
            'noSkeluar' => 'required|string|max:50',
            'tglKeluar' => 'required|date',
            'perihal' => 'required|string|max:100',
            'tujuan_surat_id' => 'required|string|max:100',
            'jenis_surat_id' => 'required|exists:jenis_surat,id',
            'klasifikasi_surat_id' => 'required|exists:klasifikasi_surat,id',
            'file' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'noSkeluar.required' => 'Nomor surat tidak boleh kosong!',
            'tglKeluar.required' => 'Tanggal surat tidak boleh kosong!',
            'perihal.required' => 'Perihal tidak boleh kosong!',
            'tujuan_surat_id.required' => 'Tujuan surat harus dipilih!',
            'tujuan_surat_id.exists' => 'Tujuan surat tidak valid!',
            'jenis_surat_id.required' => 'Jenis surat harus dipilih!',
            'jenis_surat_id.exists' => 'Jenis surat tidak valid!',
            'klasifikasi_surat_id.required' => 'Klasifikasi surat harus dipilih!',
            'klasifikasi_surat_id.exists' => 'Klasifikasi surat tidak valid!',
            'file.mimes' => 'File harus berupa PDF!',
            'file.max' => 'Ukuran file maksimal adalah 2MB!',
        ];
    }
}
