

<?php $__env->startSection('title','Home - Kuliner Lombok'); ?>

<?php $__env->startSection('content'); ?>

<!-- ================= HERO ================= -->
<div class="container-fluid px-0 mb-5">
    <div class="position-relative text-white text-center"
         style="
            height:420px;
            background-image:url('https://media.istockphoto.com/id/1829241109/id/foto/menikmati-makan-siang-bersama.webp?b=1&s=612x612&w=0&k=20&c=XoEj-HT7RbJFVQaU_nvB-uZ0JyJ21AfJHXwUeKSyq0w=');
            background-size:cover;
            background-position:center;
         ">

        <!-- Overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50"></div>

        <!-- Content -->
        <div class="position-relative h-100 d-flex flex-column justify-content-center align-items-center px-3">

            <h1 class="fw-bold mb-4">
                Selamat Datang di Kuliner Lombok
            </h1>
        </div>
    </div>
</div>

<!-- ================= TOP 5 RESTAURANT CARDS ================= -->
<h2 class="fw-bold mb-4">
    ⭐ Top 5 Restoran Pilihan
</h2>

<div class="row g-4 justify-content-center">
    <?php $__currentLoopData = $topRestaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
            <div class="card h-100 shadow-sm border-0">

                <img src="<?php echo e(asset('storage/'.$top->image)); ?>"
                     class="card-img-top"
                     style="height:160px; object-fit:cover;">

                <div class="card-body d-flex flex-column">

                    <h6 class="fw-bold mb-1">
                        <?php echo e($top->name); ?>

                    </h6>

                    <small class="text-muted mb-2">
                        <?php echo e($top->region); ?>

                    </small>

                    <span class="text-warning fw-bold mb-3">
                        ⭐ <?php echo e(number_format($top->rating,1)); ?>

                    </span>

                    <a href="/restaurant/<?php echo e($top->id); ?>"
                       class="btn btn-warning btn-sm mt-auto">
                        Lihat Detail
                    </a>

                </div>
            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<section class="mt-5 position-relative mx-3 mx-md-5 overflow-hidden shadow-lg rounded-4">
    <div class="text-white p-4 p-md-5"
         style="
            background-image:url('https://plus.unsplash.com/premium_photo-1670601440146-3b33dfcd7e17?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8Zm9vZHxlbnwwfHwwfHx8MA%3D%3D');
            background-size:cover;
            background-position:center;
         ">

        <!-- Overlay -->
        <div class="bg-dark bg-opacity-50 p-4 p-md-5 rounded-4">

            <h2 class="fw-bold mb-3 text-center fs-3">
                Kuliner Lombok
            </h2>

            <p class="text-center mx-auto mb-4"
               style="max-width:720px;">
                Nikmati pengalaman kuliner terbaik di Lombok melalui ulasan dan rekomendasi restoran kami. 
                Dari warung lokal yang autentik hingga restoran mewah, temukan tempat makan favorit Anda 
                dengan panduan dari para penikmat kuliner terpercaya
            </p>

            <!-- CTA -->
            <div class="text-center">
                <a class="nav-link <?php echo e(request()->is('semua') ? 'active' : ''); ?>btn btn-dark fw-semibold rounded-pill px-4 py-2 shadow-sm"
                       href="<?php echo e(route('restaurant.semua')); ?>">Cari Sekarang</a>
            </div>

        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ROG ALLAY X\uasweb\resources\views\home.blade.php ENDPATH**/ ?>