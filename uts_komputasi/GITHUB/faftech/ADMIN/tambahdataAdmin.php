<?php
include '../koneksi/koneksi.php'; // Mengimpor file konfigurasi

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    usleep(500000);
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sql = "INSERT INTO $tabelAdmin (username, password) VALUES ('$username', '$password')";
    $result = $conn->query($sql);
    if ($result) {
        echo
        '<div class="position-fixed top-0 start-0 w-100 h-100 bg-dark" style="opacity: 0.5; z-index: 998;"></div>
        <div class="alert alert-success w-30 position-fixed top-50 start-50 translate-middle" role="alert" style="z-index: 999;">
            <h4 class="alert-heading">Data Berhasil Ditambahkan</h4>
            <p>Detail: ['.$username.', '.$password.']</p>
            <div class="d-flex justify-content-md-end">
                <a class="btn btn-success px-4" href="tambahdataAdmin.php">Ok</a>
            </div>
        </div>';
    } else {
        echo
        '<div class="alert alert-danger w-50 position-fixed top-50 start-50 translate-middle" role="alert" style="z-index: 999;">
            <h4 class="alert-heading">Data Gagal Ditambahkan</h4>
            <p>Pastikan koneksi berjalan lancar!</p>
            <div class="d-flex gap-2 justify-content-md-end">
                <a class="btn btn-success" href="tambahdataAdmin.php">Ok</a>
            </div>
        </div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAF-Tech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showSpinner(button) {
            const originalText = button.innerHTML;
            button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"> </span>';
            button.disabled = true;
            setTimeout(() => {
                button.innerHTML = originalText;
                button.disabled = false;
            }, 500);
        }
    </script>
</head>
<body>
    <div class="d-flex justify-content-md-start m-3">
        <a href="../CRUD/viewdata.php" class="btn btn-dark px-3" type="button"><strong>< </strong>Kembali</a>
    </div>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h3>Form Tambah Data Admin</h3>
            </div>
            <div class="card-body">
                <form action="" method="post" onsubmit="event.preventDefault(); showSpinner(this.querySelector('button[type=submit]')); this.submit();">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="Masukkan password" required>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-success px-5" type="submit" id="submitBtn">Insert</button>
                        <button class="btn btn-secondary px-5" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
