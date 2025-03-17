@extends('backend.layouts.template')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Riwayat Hidup</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Riwayat Hidup</li>
                    <li class="breadcrumb-item active">Pendidikan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-4">
                        <h5 class="card-title">Pendidikan</h5>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Ada beberapa masalah dengan inputan Anda.
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ isset($pendidikan) ? route('pendidikan.update', $pendidikan->id) : route('pendidikan.store') }}" class="needs-validation" novalidate>
                            @csrf
                            @if(isset($pendidikan))
                                @method('PUT')
                            @endif

                            <div class="row mb-3">
                                <label for="nama" class="col-md-3 col-form-label">Nama Sekolah</label>
                                <div class="col-md-9">
                                    <input type="text" id="nama" name="nama" class="form-control" required minlength="5" 
                                           value="{{ old('nama', $pendidikan->nama ?? '') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tingkatan" class="col-md-3 col-form-label">Tingkatan</label>
                                <div class="col-md-9">
                                    <select name="tingkatan" id="tingkatan" class="form-control" required>
                                        <option value="1" {{ (isset($pendidikan) && $pendidikan->tingkatan == '1') ? 'selected' : '' }}>TK</option>
                                        <option value="2" {{ (isset($pendidikan) && $pendidikan->tingkatan == '2') ? 'selected' : '' }}>SD</option>
                                        <option value="3" {{ (isset($pendidikan) && $pendidikan->tingkatan == '3') ? 'selected' : '' }}>SMP</option>
                                        <option value="4" {{ (isset($pendidikan) && $pendidikan->tingkatan == '4') ? 'selected' : '' }}>SMA/SPK</option>
                                        <option value="5" {{ (isset($pendidikan) && $pendidikan->tingkatan == '5') ? 'selected' : '' }}>D3</option>
                                        <option value="6" {{ (isset($pendidikan) && $pendidikan->tingkatan == '6') ? 'selected' : '' }}>D4/S1</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tahun_masuk" class="col-md-3 col-form-label">Tahun Masuk</label>
                                <div class="col-md-9">
                                    <input type="text" id="tahun_masuk" name="tahun_masuk" class="form-control" required
                                           value="{{ old('tahun_masuk', $pendidikan->tahun_masuk ?? '') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tahun_keluar" class="col-md-3 col-form-label">Tahun Selesai</label>
                                <div class="col-md-9">
                                    <input type="text" id="tahun_keluar" name="tahun_keluar" class="form-control" required
                                           value="{{ old('tahun_keluar', $pendidikan->tahun_keluar ?? '') }}">
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($pendidikan) ? 'Update' : 'Simpan' }}
                                </button>
                                <a href="{{ route('pendidikan.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection

@push('content-css')
    <link href="{{ asset('backend/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
@endpush

@push('content-js')
    <script src="{{ asset('backend/js/bootstrap-datepicker.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#tahun_masuk, #tahun_keluar').datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
        });
    </script>
@endpush
