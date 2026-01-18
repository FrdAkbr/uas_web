

<?php $__env->startSection('content'); ?>

<h2 class="mb-4 fw-bold">🍽️ Kuliner Lombok - Semua Restoran</h2>

<!-- ================= SEARCH & FILTER ================= -->
<form class="row mb-4" onsubmit="return false;">
    <div class="col-md-5">
        <input type="text" id="search"
               class="form-control"
               placeholder="Cari restoran...">
    </div>

    <div class="col-md-4">
        <select id="region" class="form-control">
            <option value="">Semua Wilayah</option>
            <option value="Lombok Timur">Lombok Timur</option>
            <option value="Lombok Barat">Lombok Barat</option>
            <option value="Lombok Tengah">Lombok Tengah</option>
            <option value="Mataram">Mataram</option>
        </select>
    </div>
</form>

<!-- ================= LIST RESTORAN ================= -->
<h3 class="mb-4">Semua Restoran</h3>

<div class="row" id="restaurantList">
    <?php $__empty_1 = true; $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">

                <?php if($r->image): ?>
                    <img src="<?php echo e(asset('storage/'.$r->image)); ?>"
                         class="card-img-top"
                         style="height:180px; object-fit:cover;">
                <?php endif; ?>

                <div class="card-body">
                    <h5 class="mb-1"><?php echo e($r->name); ?></h5>

                    <small class="text-muted">
                        <?php echo e($r->region); ?> • <?php echo e($r->location); ?>

                    </small>

                    <br>

                    <span class="badge bg-warning text-dark mt-2">
                        ⭐ <?php echo e(number_format($r->rating,1)); ?>

                    </span>

                    <br>

                    <a href="/restaurant/<?php echo e($r->id); ?>"
                       class="btn btn-sm btn-outline-primary mt-2">
                        Detail
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-muted">Data restoran tidak ditemukan.</p>
    <?php endif; ?>
</div>

<!-- ================= SCRIPT (DIPERBAIKI) ================= -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const search  = document.getElementById('search');
    const region  = document.getElementById('region');
    const list    = document.getElementById('restaurantList');

    function loadData() {
        fetch(`/search?search=${search.value}&region=${region.value}`)
            .then(response => response.text())
            .then(html => {
                list.innerHTML = html;
            });
    }

    search.addEventListener('keyup', loadData);
    region.addEventListener('change', loadData);

});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ROG ALLAY X\uasweb\resources\views\semua.blade.php ENDPATH**/ ?>