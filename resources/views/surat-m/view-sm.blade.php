@extends("layouts.main")

@section('title', 'Surat Masuk')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Surat Masuk </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @if (auth()->user()->level == 'staff')
                        <a href="input-sm" type="button" class="btn btn-gradient-primary btn-icon-text btn-sm">
                            <i class="mdi mdi mdi-plus btn-icon-prepend"></i>Tambah Surat</a>
                    @endif
                </ol>
            </nav>
        </div>
        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body" style="overflow-x:auto;">
                    <h4 class="card-title">Surat Masuk</h4>
                    <div class="table-responsive-md">
                        <table id="example1" class="table table-bordered">
                            <thead style="text-align: center; color:#fff;">
                                <tr>
                                    <th class="col-md-1"> No. </th>
                                    <th> Nomor Surat </th>
                                    <th> Jenis Surat </th>
                                    <th> Klasifikasi Surat </th>
                                    <th class="col-md-1"> Tanggal Surat </th>
                                    <th> Asal Surat </th>
                                    <th> Perihal</th>
                                    <th class="col-md-1"> File </th>
                                    <th class="col-md-1"> Action</th>
                                </tr>
                            </thead>
                            <tbody style="color:#fff;">
                                @foreach ($data as $x)
                                    <tr>
                                        <td style="text-align: center;">{{ $x->id }}</td>
                                        <td>{{ $x->no_surat }}</td>
                                        <td>{{ $x->jenisSurat->keterangan ?? 'Tidak ada' }}</td>
                                        <td>{{ $x->klasifikasiSurat->nama_klasifikasi ?? 'Tidak ada' }}</td>
                                        <td>{{ $x->tgl_surat }}</td>
                                        <td>{{ $x->pengirim }}</td>
                                        <td>{{ $x->perihal }}</td>
                                        <td>
                                            @empty($x->file)
                                                <span class="badge badge-danger">Tidak ada</span>
                                            @else
                                                <span class="badge badge-success">Ada</span>
                                            @endempty
                                        </td>
                                        <td>
                                            <a type="button" href="{{ $x->file }}" download
                                                class="btn-sm btn-inverse-info btn-rounded m-lg-1" data-toggle="tooltip"
                                                data-placement="top" title="Download File">
                                                <i class="mdi mdi-format-vertical-align-bottom"></i>
                                            </a>

                                            @if (auth()->user()->level == 'staff')
                                                <a type="button" href="/edit-sm/{{ $x->id }}"
                                                    class="btn-sm btn-inverse-dark btn-rounded m-lg-1" data-toggle="tooltip"
                                                    data-placement="top" title="Edit">
                                                    <i class="mdi mdi-border-color"></i>
                                                </a>
                                                <a type="button" href="/hapus-sm/{{ $x->id }}"
                                                    onclick="return confirm('Apakah anda yakin menghapus data?')"
                                                    class="btn-sm btn-inverse-danger btn-rounded m-lg-1"
                                                    data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Digunakan untuk alert-->
    @include('sweetalert::alert')

@endsection
