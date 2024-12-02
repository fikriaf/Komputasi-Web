<?php
include "koneksi.php";
$id = $_GET["id"];

// Query untuk menghapus data
$query = "DELETE FROM biodata WHERE id='$id'";

// Eksekusi query
$hapusBerhasil = false;
if (mysqli_query($conn, $query)) {
    $hapusBerhasil = true;
} else {
    $error = mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Penghapusan Data</title>
</head>
<body>
<div class="container mt-5">
    <?php 
    if ($hapusBerhasil) {
        echo
        '<div class="alert alert-success w-50" role="alert">
            <h4 class="alert-heading">Data dengan [ id = '.$id.' ] Berhasil Dihapus!</h4>
            <p>Data yang dipilih telah berhasil dihapus dari database.</p>
            <hr>
            <div class="d-flex justify-content-end">
                <a href="viewbiodata.php" class="btn btn-primary px-5">OK</a>
            </div>
        </div>';
    } else { 
        echo
        '<div class="alert alert-danger w-50" role="alert">
            <h4 class="alert-heading">Error!</h4>
            <p>Terjadi kesalahan saat menghapus data: <?= $error ?></p>
            <hr>
            <div class="d-flex justify-content-end">
                <a href="viewbiodata.php" class="btn btn-secondary">Kembali</a>
            </div>
        </div>';
    }
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
