<!DOCTYPE html>
<html>
<head>
    <title>Tambah Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h3 class="mb-4">➕ Tambah Restoran</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="/admin/restaurants">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Restoran</label>
                    <input class="form-control" name="name" required>
                </div>

                <!-- LOKASI DETAIL (BEBAS) -->
                <div class="mb-3">
                    <label class="form-label">Alamat / Lokasi Detail</label>
                    <input class="form-control" name="location"
                           placeholder="Contoh: Jl. Raya Senggigi No. 10" required>
                </div>

                <!-- LOKASI FILTER -->
                <div class="mb-3">
                    <label class="form-label">Wilayah</label>
                    <select class="form-control" name="region" required>
                        <option value="">-- Pilih Wilayah --</option>
                        <option value="Lombok Timur">Lombok Timur</option>
                        <option value="Lombok Utara">Lombok Utara</option>
                        <option value="Lombok Barat">Lombok Barat</option>
                        <option value="Lombok Tengah">Lombok Tengah</option>
                        <option value="Mataram">Mataram</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="description" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Restoran</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <button class="btn btn-primary">💾 Simpan</button>
                <a href="/admin/restaurants" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
