<!DOCTYPE html>
<html>
<head>
    <title>Edit Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<h3>Edit Restoran</h3>

<form method="POST" enctype="multipart/form-data" action="/admin/restaurants/<?php echo e($restaurant->id); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <input class="form-control mb-2" name="name" value="<?php echo e($restaurant->name); ?>">
    <input class="form-control mb-2" name="location" value="<?php echo e($restaurant->location); ?>">
    <textarea class="form-control mb-2" name="description"><?php echo e($restaurant->description); ?></textarea>

    <?php if($restaurant->image): ?>
        <img src="<?php echo e(asset('storage/'.$restaurant->image)); ?>" width="120" class="mb-2"><br>
    <?php endif; ?>

    <input type="file" class="form-control mb-2" name="image">
    <button class="btn btn-success">Update</button>
</form>
</body>
</html>
<?php /**PATH C:\Users\ROG ALLAY X\uasweb\resources\views\admin\restaurant\edit.blade.php ENDPATH**/ ?>