@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
    <div class="content-wrapper">
        <div class="row" id="proBanner">
            <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                    @auth
                        <p>SELAMAT DATANG {{ auth()->user()->name }}</p>
                    @endauth
                    <a href="/view-sm" class="btn download-button purchase-button ml-auto">KELOLA SURAT</a>
                    <i class="mdi mdi-close" id="bannerClose"></i>
                </span>
            </div>
        </div>
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home" style="color: #fff;"></i>
                </span> DASHBOARD
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i
                            style="color: #000;"class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        @if (in_array(auth()->user()->level, ['superadmin', 'komandan', 'wadan']))
            <!-- Menampilkan semua data Surat Masuk -->
            <div class="row">
                <div class="col-md-6 stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body" style="background: linear-gradient(to right, #fff, #f0f0);">
                            <img src="{{ asset('thema/assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                                alt="circle-image" />
                            <h4 class="font-weight-normal mb-3" style="color: #000;">
                                <b>Semua Surat Masuk</b>
                                <i class="mdi mdi-email-open-outline mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5" style="color: #000;">{{ $data['SuratMasuk'] }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 stretch-card grid-margin">
                    <div class="card bg-gradient-info card-img-holder text-white">
                        <div class="card-body" style="background: linear-gradient(to right, #fff, #f0f0);">
                            <img src="{{ asset('thema/assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                                alt="circle-image" />
                            <h4 class="font-weight-normal mb-3" style="color: #000;">
                                <b>Semua Surat Keluar</b>
                                <i class="mdi mdi-email-outline mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5" style="color: #000;">{{ $data['SuratKeluar'] }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Menampilkan data sesuai bagian -->
            <div class="row">
                <div class="col-md-6 stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body" style="background: linear-gradient(to right, #fff, #f0f0);">
                            <img src="{{ asset('thema/assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                                alt="circle-image" />
                            <h4 class="font-weight-normal mb-3" style="color: #000;">
                                <b>SURAT MASUK {{ auth()->user()->bagianSurat->nama_bagian ?? 'Tidak Ada Bagian' }}</b>
                                <i class="mdi mdi-email-open-outline mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5" style="color: #000;">{{ $data['SuratMasuk'] }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 stretch-card grid-margin">
                    <div class="card bg-gradient-info card-img-holder text-white">
                        <div class="card-body" style="background: linear-gradient(to right, #fff, #f0f0);">
                            <img src="{{ asset('thema/assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                                alt="circle-image" />
                            <h4 class="font-weight-normal mb-3" style="color: #000;">
                                <b>SURAT KELUAR {{ auth()->user()->bagianSurat->nama_bagian ?? 'Tidak Ada Bagian' }}</b>
                                <i class="mdi mdi-email-outline mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5" style="color: #000;">{{ $data['SuratKeluar'] }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
    <!-- content-wrapper ends -->
    <!--Digunakan untuk alert-->
    @include('sweetalert::alert')

@endsection
