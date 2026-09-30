<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Tambah Publikasi</title>
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Tambah Publikasi</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('publikasi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                                    class="form-control @error('judul') is-invalid @enderror"
                                    placeholder="Masukkan judul publikasi">
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_rilis" class="form-label">Tanggal Rilis</label>
                                <input type="date" name="tanggal_rilis" id="tanggal_rilis" value="{{ old('tanggal_rilis') }}"
                                    class="form-control @error('tanggal_rilis') is-invalid @enderror">
                                @error('tanggal_rilis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="sampul" class="form-label">Sampul</label>
                                <input type="file" name="sampul" id="sampul" accept="image/*"
                                    class="form-control @error('sampul') is-invalid @enderror">
                                <div class="form-text">Format yang diizinkan: jpg, jpeg, png, webp. Maksimal 2 MB.</div>
                                @error('sampul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('welcome') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
