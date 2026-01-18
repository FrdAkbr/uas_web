

<?php $__env->startSection('title', $restaurant->name); ?>

<?php $__env->startSection('content'); ?>

<h2 class="fw-bold"><?php echo e($restaurant->name); ?></h2>

<div class="d-flex align-items-center mb-3">
    <span class="text-success fw-bold me-2">
        ⭐ <?php echo e(number_format($restaurant->rating,1)); ?>

    </span>
    <small class="text-muted">
        (<?php echo e($restaurant->reviews->count()); ?> review)
    </small>
</div>

<div class="row">
    <div class="col-md-8">

        <?php if($restaurant->image): ?>
            <img src="<?php echo e(asset('storage/'.$restaurant->image)); ?>"
                 class="img-fluid rounded mb-4"
                 style="height:350px;object-fit:cover;width:100%;">
        <?php endif; ?>

        <h4 class="fw-bold">About</h4>
        <p><?php echo e($restaurant->description); ?></p>

        <hr>

        <h4 class="fw-bold">Location</h4>
        <p><?php echo e($restaurant->location); ?></p>
        <small class="text-muted"><?php echo e($restaurant->region); ?>, NTB</small>

        <hr>
    </div>

    <div class="col-md-4">
        <div class="bg-white rounded shadow-sm p-3 sticky-top" style="top:70px;">
            
<?php
    $total = $restaurant->reviews->count();

    $counts = [
        5 => $restaurant->reviews->where('rating',5)->count(),
        4 => $restaurant->reviews->where('rating',4)->count(),
        3 => $restaurant->reviews->where('rating',3)->count(),
        2 => $restaurant->reviews->where('rating',2)->count(),
        1 => $restaurant->reviews->where('rating',1)->count(),
    ];

    $labels = [
        5 => 'Excellent',
        4 => 'Good',
        3 => 'Average',
        2 => 'Poor',
        1 => 'Terrible'
    ];
?>

<div class="row align-items-center mb-4">
    <div class="col-md-4 text-center">
        <h1 class="fw-bold text-success">
            <?php echo e(number_format($restaurant->rating,1)); ?>

        </h1>
        <p class="fw-semibold mb-1">Excellent</p>

        <div>
            <?php for($i=1;$i<=5;$i++): ?>
                <span class="text-success fs-5">●</span>
            <?php endfor; ?>
            <small>(<?php echo e($total); ?>)</small>
        </div>
    </div>

    <div class="col-md-8">
        <?php $__currentLoopData = $labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $count = $counts[$rate];
                $percent = $total ? ($count / $total) * 100 : 0;
            ?>

            <div class="d-flex align-items-center mb-2">
                <div style="width:90px"><?php echo e($label); ?></div>

                <div class="progress flex-grow-1 mx-2" style="height:10px">
                    <div class="progress-bar bg-success"
                         style="width: <?php echo e($percent); ?>%">
                    </div>
                </div>

                <div style="width:30px"><?php echo e($count); ?></div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

        </div>
    </div>
            
        <h4 class="fw-bold">Write a Review</h4>
        <form method="POST" action="/review/<?php echo e($restaurant->id); ?>">
            <?php echo csrf_field(); ?>
            <input class="form-control mb-2" name="name" placeholder="Your name" required>

            <select class="form-control mb-2" name="rating" required>
                <option value="">Rating</option>
                <?php for($i=5;$i>=1;$i--): ?>
                    <option><?php echo e($i); ?></option>
                <?php endfor; ?>
            </select>

            <textarea class="form-control mb-2" name="comment" placeholder="Your review" required></textarea>
            <button class="btn btn-success">Submit</button>
        </form>

        <hr>

        <h4 class="fw-bold">Reviews</h4>
        <?php $__empty_1 = true; $__currentLoopData = $restaurant->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="border rounded p-3 mb-3 bg-white">
                <b><?php echo e($r->name); ?></b>
                <span class="text-warning ms-2">⭐ <?php echo e($r->rating); ?></span>
                <p class="mb-0 mt-1"><?php echo e($r->comment); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-muted">No reviews yet</p>
        <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ROG ALLAY X\uasweb\resources\views\detail.blade.php ENDPATH**/ ?>