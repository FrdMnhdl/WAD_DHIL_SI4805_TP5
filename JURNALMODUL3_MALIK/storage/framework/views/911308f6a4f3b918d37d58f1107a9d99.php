<!-- 1. Hubungkan file Dashboard.blade.php dengan dashapp.blade.php-->


<?php $__env->startSection('title', 'Dashboard Mahasiswa'); ?>

<?php $__env->startSection('content'); ?>
<div class="dashboard-container">
    <div class="dashboard-card position-relative">
        <div class="animated-bg"></div>

         <!-- 2. Isi value atribut href agar mendirect menuju halaman profile-->
        <a href="<?php echo e(url('/profile')); ?>" class="btn-profile-top">
            <i class="bi bi-person-circle me-1"></i> Lihat Profil
        </a>

        <div class="dashboard-body">
            <div class="dashboard-left">
                <div class="logo-wrapper">
                    <div class="logo-ring ring-1"></div>
                    <div class="logo-ring ring-2"></div>
                    <div class="logo-center">
                        <!-- 3. Isi value atribut src agar menampilkan logo EAD-->
                        <img src="<?php echo e(asset('images/logo-ead.png')); ?>" alt="Logo EAD">
                    </div>
                </div>
            </div>

            <div class="dashboard-right">
                <div class="greeting-box">
                    <h1 class="greeting-title">
                        <!-- 4. Panggil variabel dari controller untuk menampilkan salam-->
                        <?php echo e($salam); ?>

                        <span class="highlight-name"><?php echo e($mahasiswa->nama); ?></span>
                        <span class="wave">👋</span>
                    </h1>
                    <p class="greeting-sub">Selamat datang di dashboard praktikan EAD</p>
                </div>

                <div class="info-grid">
                    <div class="info-card fade-in delay-1">
                        <div class="icon-wrapper primary">
                            <i class="bi bi-clock-fill"></i>
                        </div>
                        <div class="info-text">
                            <p class="info-label">WAKTU AKSES</p>
                            <h4 class="info-value"><?php echo e($accessTime); ?> WIB </h4>
                        </div>
                    </div>

                    <div class="info-card fade-in delay-2">
                        <div class="icon-wrapper secondary">
                            <i class="bi bi-calendar-event-fill"></i>
                        </div>
                        <div class="info-text">
                            <p class="info-label">TANGGAL AKSES</p>
                            <h4 class="info-value"><?php echo e($tanggal); ?> WIB </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/dashapp', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\WAD-DHIL-MALIK-102022400354\Jurnal-WAD-Modul-3\Jurnal_Modul3\resources\views/dashboard.blade.php ENDPATH**/ ?>