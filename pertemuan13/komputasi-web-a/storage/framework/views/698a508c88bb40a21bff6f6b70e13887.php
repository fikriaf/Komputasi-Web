

<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
    <p>
        <strong>Ini adalah halaman Home</strong>
    </p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('isi'); ?>
    <div>
        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="https://img.freepik.com/free-vector/3d-style-black-background-with-paper-layer_206725-669.jpg?semt=ais_hybrid" alt="Los Angeles" class="d-block w-100">
    </div>
    <div class="carousel-item">
        <img src="https://t4.ftcdn.net/jpg/06/95/05/51/360_F_695055160_oBrk5j3u2rNiSwDAGdZiULAKcM3sN9ZN.jpg" alt="Chicago" class="d-block w-100">
    </div>
    <div class="carousel-item">
        <img src="https://t4.ftcdn.net/jpg/06/95/05/51/360_F_695055182_Sr5W8IicjAzPKk93c25fajyT9llIggYh.jpg" alt="New York" class="d-block w-100">
    </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
    </button>
    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UPJ\Komputasi Berbasis Web\pertemuan13\komputasi-web-a\resources\views/home1.blade.php ENDPATH**/ ?>