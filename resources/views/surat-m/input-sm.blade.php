@extends("layouts.main")

@section('title', 'Input Surat Masuk')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Tambah Surat Masuk</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/view-sm" class="text-white">Surat Masuk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Surat Masuk</li>
            </ol>
        </nav>
    </div>

    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Form Tambah Surat Masuk</h4>

                <form method="POST" action="/save-sm" enctype="multipart/form-data" class="forms-sample">
                    {{ csrf_field() }}

                    <!-- Nomor Surat -->
                    <div class="form-group">
                        <label for="noSurat">Nomor Surat</label>
                        <input type="text" name="noSurat" class="form-control" id="noSurat" placeholder="Nomor Surat" value="{{ old('noSurat') }}">
                        @error('noSurat')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <!-- Jenis Surat -->
                    <div class="form-group">
                        <label for="jenisSurat">Jenis Surat</label>
                        <select name="jenisSurat" class="form-control" id="jenisSurat">
                            <option selected disabled>Pilih Jenis Surat</option>
                            @foreach ($jenisSuratOptions as $option)
                                <option value="{{ $option->id }}" {{ old('jenisSurat') == $option->id ? 'selected' : '' }}>
                                    {{ $option->keterangan }}
                                </option>
                            @endforeach
                        </select>
                        @error('jenisSurat')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <!-- Klasifikasi Surat -->
                    <div class="form-group">
                        <label for="klasifikasiSurat">Klasifikasi Surat</label>
                        <select name="klasifikasiSurat" class="form-control" id="klasifikasiSurat">
                            <option selected disabled>Pilih Klasifikasi Surat</option>
                            @foreach ($klasifikasiSuratOptions as $option)
                                <option value="{{ $option->id }}" {{ old('klasifikasiSurat') == $option->id ? 'selected' : '' }}>
                                    {{ $option->nama_klasifikasi }}
                                </option>
                            @endforeach
                        </select>
                        @error('klasifikasiSurat')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <!-- Tanggal Surat -->
                    <div class="form-group">
                        <label for="tglSurat">Tanggal Surat</label>
                        <input type="date" name="tglSurat" class="form-control" id="tglSurat" value="{{ old('tglSurat') }}">
                        @error('tglSurat')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <!-- Asal Surat -->
                    <div class="form-group">
                        <label for="pengirim">Asal Surat</label>
                        <input type="text" name="pengirim" class="form-control" id="pengirim" placeholder="Asal Surat" value="{{ old('pengirim') }}">
                        @error('pengirim')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    
                    <!-- Perihal -->
                    <div class="form-group">
                        <label for="perihal">Perihal</label>
                        <input type="text" name="perihal" class="form-control" id="perihal" placeholder="Perihal" value="{{ old('perihal') }}">
                        @error('perihal')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <!-- File Upload -->
                    <div class="form-group">
                        <label>File Upload</label>
                        <input type="file" name="file" class="file-upload-default">
                        <div class="input-group">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                            </span>
                        </div>
                        @error('file')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-gradient-primary mr-2">Tambah Surat</button>
                        <a href="/view-sm" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
