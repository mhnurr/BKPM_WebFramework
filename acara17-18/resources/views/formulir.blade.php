<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulir Pegawai</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Form Validation dengan Laravel</h1>

                <!-- Menampilkan error flash session jika ada -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/pegawai/proses') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama"
                            class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                            value="{{ old('nama') }}">
                        @if ($errors->has('nama'))
                            <span class="text-danger small">
                                {{ $errors->first('nama') }}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="alamat" class="control-label">Alamat</label>
                        <textarea id="alamat" name="alamat"
                            class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}"
                            placeholder="Alamat">{{ old('alamat') }}</textarea>
                        @if ($errors->has('alamat'))
                            <span class="text-danger small">
                                {{ $errors->first('alamat') }}
                            </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
</body>

</html>