<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Biodata</title>
    <!-- Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Inter:ital,opsz,wght@0,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body class="m-4 w-100" style="font-family: Heebo">
    <h1>Tambah Biodata</h1>
    <div class="border rounded p-2 my-4 w-25 shadow-sm">
        <form action="<?php echo e(route('biodatas.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <label for="first_name">Nama Depan:</label>
            <input class="form-control" type="text" name="first_name" id="first_name" value="<?php echo e(old('first_name')); ?>" required>
            <label for="last_name">Nama Belakang:</label>
            <input class="form-control" type="text" name="last_name" id="last_name" value="<?php echo e(old('last_name')); ?>" required>
            <br>
            <label for="gender">Jenis Kelamin:</label>
            <select class="rounded" name="gender" id="gender" required>
                <option value="male" <?php echo e(old('gender') == 'male' ? 'selected' : ''); ?>>Laki-Laki</option>
                <option value="female" <?php echo e(old('gender') == 'female' ? 'selected' : ''); ?>>Perempuan</option>
            </select>
            <br>
            <button class="btn btn-primary mt-3" type="submit">Simpan</button>
        </form>
    </div>
    <div class="">
        <a class="btn btn-outline-secondary" href="<?php echo e(route('biodatas.index')); ?>">Kembali ke Daftar Biodata</a>
    </div>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH D:\UPJ\Komputasi Berbasis Web\pertemuan14\komputasi-web-a\resources\views/biodatas/create.blade.php ENDPATH**/ ?>