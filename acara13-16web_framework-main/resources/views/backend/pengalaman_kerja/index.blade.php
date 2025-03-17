@extends('backend.layouts.template')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Riwayat Hidup</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Riwayat Hidup</li>
                <li class="breadcrumb-item active">Pengalaman Kerja</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3">
                    <h5 class="card-title">Pengalaman Kerja</h5>

                    <!-- Alert Success -->
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <!-- Tombol Tambah -->
                    <div class="mb-3">
                        <a href="{{ route('pengalaman_kerja.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah
                        </a>
                    </div>

                    <!-- Data Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th><i class="bi bi-briefcase"></i> Nama</th>
                                    <th><i class="bi bi-person-badge"></i> Jabatan</th>
                                    <th><i class="bi bi-calendar"></i> Tahun Masuk</th>
                                    <th><i class="bi bi-calendar"></i> Tahun Selesai</th>
                                    <th><i class="bi bi-gear"></i> Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengalaman_kerja as $item)
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jabatan }}</td>
                                        <td>{{ $item->tahun_masuk }}</td>
                                        <td>{{ $item->tahun_keluar }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <!-- Tombol Edit -->
                                                <a class="btn btn-warning" href="{{ route('pengalaman_kerja.edit', $item->id) }}">
                                                    <i class="bi bi-pencil"></i>
                                                </a>

                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('pengalaman_kerja.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- End Table -->
                </div><!-- End Card -->
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection
