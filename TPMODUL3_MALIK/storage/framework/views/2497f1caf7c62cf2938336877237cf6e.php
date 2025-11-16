<?php $__env->startSection('title', 'Detail Kucing'); ?>

<?php $__env->startSection('content'); ?>
<div class="cat-card mx-auto" style="max-width: 600px;">
    <h2 class="cat-title mb-3 text-center"><?php echo e($kucing->nama_kucing); ?></h2>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Ras:</strong> <?php echo e($kucing->ras); ?></li>
        <li class="list-group-item"><strong>Warna Bulu:</strong> <?php echo e($kucing->warna_bulu); ?></li>
        <li class="list-group-item"><strong>Usia:</strong> <?php echo e($kucing->usia); ?> tahun</li>
        <li class="list-group-item"><strong>Deskripsi:</strong> <?php echo e($kucing->deskripsi); ?></li>
    </ul>
    <div class="text-center mt-4">
        <a href="/kucing" class="btn btn-custom">Kembali ke Daftar</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\TP_Modul3\resources\views/DetailKucing.blade.php ENDPATH**/ ?>