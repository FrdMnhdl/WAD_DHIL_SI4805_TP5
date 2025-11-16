<!-- 1. Hubungkan file Profile.blade.php dengan profapp.blade.php-->


<?php $__env->startSection('title', 'Profil Mahasiswa'); ?>

<?php $__env->startSection('content'); ?>
<div class="profile-wrapper">
    <div class="profile-card animate-fadeup">
        <div class="profile-header">
            <div class="avatar animate-pop">
                <span><?php echo e(substr($mahasiswa->nama, 0, 1)); ?></span>
            </div>
            <div class="profile-identity">
                <h2><?php echo e($mahasiswa->nama); ?></h2>
                <p><?php echo e($mahasiswa->nim); ?></p>
            </div>
        </div>

        <div class="profile-info animate-delay">
            <div class="info-group">
                <span class="label">Program Studi</span>
                <span class="value"><?php echo e($mahasiswa->prodi); ?></span>
            </div>
            <div class="info-group">
                <span class="label">Fakultas</span>
                <span class="value"><?php echo e($mahasiswa->fakultas); ?></span>
            </div>
            <div class="info-group">
                <span class="label">Kelas</span>
                <span class="value"><?php echo e($mahasiswa->kelas); ?></span>
            </div>
            <div class="info-group">
                <span class="label">Email</span>
                <span class="value"><?php echo e($mahasiswa->email); ?></span>
            </div>
        </div>

        <div class="btn-wrapper animate-fadein">
            <!-- 9. Isi value atribut href agar mendirect menuju halaman dashboard-->
            <a href="<?php echo e(url()->previous()); ?>" class="btn-back">
                <i class="bi bi-arrow-left"></i> Dashboard
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/profapp', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\WAD-DHIL-MALIK-102022400354\Jurnal-WAD-Modul-3\Jurnal_Modul3\resources\views/Profile.blade.php ENDPATH**/ ?>