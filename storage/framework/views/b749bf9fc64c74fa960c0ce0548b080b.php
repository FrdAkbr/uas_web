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
<?php endif; ?><?php /**PATH C:\Users\ROG ALLAY X\uasweb\resources\views\partials\restaurant-list.blade.php ENDPATH**/ ?>