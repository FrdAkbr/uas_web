<!DOCTYPE html>
<html>
<head>
    <title>Admin - Daftar Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h3 class="mb-3">🍽️ Data Restoran</h3>

    <div class="d-flex justify-content-between mb-3">
        <a href="/admin/restaurants/create" class="btn btn-primary">
            ➕ Tambah Restoran
        </a>

        <!-- FILTER REGION -->
        <form method="GET" class="d-flex">
            <select name="region" class="form-select me-2">
                <option value="">-- Semua Lokasi --</option>
                <option value="Lombok Timur" {{ request('region')=='Lombok Timur'?'selected':'' }}>Lombok Timur</option>
                <option value="Lombok Barat" {{ request('region')=='Lombok Barat'?'selected':'' }}>Lombok Barat</option>
                <option value="Lombok Tengah" {{ request('region')=='Lombok Tengah'?'selected':'' }}>Lombok Tengah</option>
                <option value="Mataram" {{ request('region')=='Mataram'?'selected':'' }}>Mataram</option>
            </select>
            <button class="btn btn-secondary">Filter</button>
        </form>
    </div>

    <table class="table table-bordered table-striped bg-white shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat Detail</th>
                <th>Region</th>
                <th>Rating</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($restaurants as $r)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $r->name }}</td>
                <td>{{ $r->location }}</td>
                <td>
                    <span class="badge bg-info text-dark">
                        {{ $r->region }}
                    </span>
                </td>
                <td>⭐ {{ number_format($r->rating ?? 0,1) }}</td>
                <td>
                    <a href="/admin/restaurants/{{ $r->id }}/edit" class="btn btn-sm btn-warning">
                        Edit
                    </a>
                    <form method="POST" action="/admin/restaurants/{{ $r->id }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Hapus restoran ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted">
                    Data restoran tidak ditemukan
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
