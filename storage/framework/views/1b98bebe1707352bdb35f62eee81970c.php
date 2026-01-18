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
                <option value="Lombok Timur" <?php echo e(request('region')=='Lombok Timur'?'selected':''); ?>>Lombok Timur</option>
                <option value="Lombok Barat" <?php echo e(request('region')=='Lombok Barat'?'selected':''); ?>>Lombok Barat</option>
                <option value="Lombok Tengah" <?php echo e(request('region')=='Lombok Tengah'?'selected':''); ?>>Lombok Tengah</option>
                <option value="Mataram" <?php echo e(request('region')=='Mataram'?'selected':''); ?>>Mataram</option>
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
        <?php $__empty_1 = true; $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($r->name); ?></td>
                <td><?php echo e($r->location); ?></td>
                <td>
                    <span class="badge bg-info text-dark">
                        <?php echo e($r->region); ?>

                    </span>
                </td>
                <td>⭐ <?php echo e(number_format($r->rating ?? 0,1)); ?></td>
                <td>
                    <a href="/admin/restaurants/<?php echo e($r->id); ?>/edit" class="btn btn-sm btn-warning">
                        Edit
                    </a>
                    <form method="POST" action="/admin/restaurants/<?php echo e($r->id); ?>" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Hapus restoran ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" class="text-center text-muted">
                    Data restoran tidak ditemukan
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
<?php /**PATH C:\Users\ROG ALLAY X\uasweb\resources\views\admin\restaurant\index.blade.php ENDPATH**/ ?>