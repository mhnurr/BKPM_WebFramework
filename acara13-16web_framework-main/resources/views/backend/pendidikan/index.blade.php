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
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pendidikan</h5>

                        @if(Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif

                        <div class="d-flex justify-content-between mb-3">
                            <a href="{{ route('pendidikan.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Tambah
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tingkatan</th>
                                        <th>Tahun Masuk</th>
                                        <th>Tahun Keluar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pendidikan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->tingkatan }}</td>
                                            <td>{{ $item->tahun_masuk }}</td>
                                            <td>{{ $item->tahun_keluar ?? '-' }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                     <!-- Tombol Edit -->
                                                <a class="btn btn-warning" href="{{ route('pendidikan.edit', $item->id) }}">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                      <!-- Tombol Hapus -->
                                                <form action="{{ route('pendidikan.destroy', $item->id) }}" method="POST" style="display:inline;">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
