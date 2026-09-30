<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Publikasi</title>
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h4 mb-0">Daftar Publikasi Badan Pusat Statistik Provinsi Papua</h1>
            <a href="{{ route('tambah') }}" class="btn btn-primary btn-sm">Tambah Publikasi</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col" style="width: 60px;">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Tanggal Rilis</th>
                                <th scope="col" class="text-center">Sampul</th>
                                <th scope="col" class="text-center" style="width: 170px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($publikasi as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>
                                        <span class="badge text-bg-secondary">
                                            {{ \Carbon\Carbon::parse($item->tanggal_rilis)->translatedFormat('d F Y') }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        @if ($item->sampul)
                                            <img src="/images/{{ $item->sampul }}" alt="{{ $item->judul }}" width="80"
                                                class="img-thumbnail">
                                        @else
                                            <span class="badge text-bg-light border">Tanpa Sampul</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('publikasi.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('publikasi.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus publikasi ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-3">Belum ada data publikasi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>