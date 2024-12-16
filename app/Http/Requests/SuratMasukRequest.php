<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratMasukRequest extends FormRequest
{
    public function rules()
    {
        return [
            'noSurat' => 'required',
            'tglSurat' => 'required|date',
            'pengirim' => 'required',
            'jenisSurat' => 'required|exists:jenis_surat,id',
            'klasifikasiSurat' => 'required|exists:klasifikasi_surat,id',
            'file' => 'nullable|mimes:pdf,doc,docx|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'noSurat.required' => 'Nomor surat tidak boleh kosong!',
            'tglSurat.required' => 'Tanggal surat tidak boleh kosong!',
            'pengirim.required' => 'Pengirim tidak boleh kosong!',
            'jenisSurat.required' => 'Jenis Surat tidak boleh kosong!',
            'klasifikasiSurat.required' => 'Klasifikasi Surat tidak boleh kosong!',
            'file.mimes' => 'File harus bertipe pdf, doc, atau docx.',
        ];
    }
}
