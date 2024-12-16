@extends('layouts.main')

@section('title', 'Input Surat Keluar')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Tambah Surat Keluar</h3>
            <nav aria-label="breadcrumb">
                <li class="breadcrumb">
                <li class="breadcrumb-item"><a href="/view-sk" style="color: #fff">Surat Keluar</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Surat Keluar</li>
                </ol>
            </nav>
        </div>

        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Surat Keluar</h4>
                    <p class="card-description"></p>

                    <form class="forms-sample" method="POST" action="/save-sk" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail3">Nomor Surat</label>
                            <input type="text" name="noSkeluar" class="form-control" id="exampleInputEmail3"
                                placeholder="Nomor Surat" value="{{ old('noSkeluar') }}">
                            @error('noSkeluar')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Jenis Surat</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="jenis_surat_id">
                                <option selected disabled>Pilih Jenis Surat</option>
                                @foreach ($jenisSuratOptions as $x)
                                    <option value="{{ $x->id }}"
                                        {{ old('jenis_surat_id') == $x->id ? 'selected' : '' }}>
                                        {{ $x->keterangan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis_surat_id')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Klasifikasi Surat</label>
                            <select class="form-control" id="exampleFormControlSelect3" name="klasifikasi_surat_id">
                                <option selected disabled>Pilih Klasifikasi Surat</option>
                                @foreach ($klasifikasiSuratOptions as $x)
                                    <option value="{{ $x->id }}"
                                        {{ old('klasifikasi_surat_id') == $x->id ? 'selected' : '' }}>
                                        {{ $x->nama_klasifikasi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('klasifikasi_surat_id')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Tanggal Surat</label>
                            <input type="date" name="tglKeluar" class="form-control" id="exampleInputPassword4"
                                placeholder="Tanggal Surat" value="{{ old('tglKeluar') }}">
                            @error('tglKeluar')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tujuanSurat">Tujuan Surat</label>
                            <select name="tujuan_surat_id" class="form-control" id="tujuanSurat">
                                <option selected disabled>Pilih Tujuan Surat</option>
                                @foreach ($tujuanSuratOptions as $option)
                                    <option value="{{ $option->id }}"
                                        {{ old('tujuan_surat_id') == $option->id ? 'selected' : '' }}>
                                        {{ $option->keterangan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tujuan_surat_id')
                                <p class="text-danger"><small>{{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <input type="text" name="perihal" class="form-control" id="perihal" placeholder="Perihal"
                                value="{{ old('perihal') }}">
                            @error('perihal')
                                <p class="text-danger"><small>{{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>File Upload</label>
                            <input type="file" name="file" class="file-upload-default">
                            <div class="input-group">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload File">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-primary"
                                        type="button">Upload</button>
                                </span>
                            </div>
                            @error('file')
                                <p class="text-danger"><small>{{ $message }}</small></p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">Tambah Surat</button>
                        <a href="view-sk" class="btn btn-light">Cancel</a>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
