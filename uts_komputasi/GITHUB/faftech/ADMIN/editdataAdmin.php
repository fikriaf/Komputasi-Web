<?php
include '../koneksi/koneksi.php'; // Mengimpor file konfigurasi

if (isset($_GET['id_admin'])) {
    $id_admin = $_GET['id_admin'];
    $query = "SELECT * FROM $tabelAdmin WHERE id_admin = $id_admin";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "UPDATE $tabelAdmin SET username = '$username', password = '$password' WHERE id_admin = '$id_admin'";

    if ($conn->query($query) === TRUE) {
        echo '<div class="position-fixed top-0 start-0 w-100 h-100 bg-dark" style="opacity: 0.5; z-index: 998;"></div>
        <div class="alert alert-success w-30 position-fixed top-50 start-50 translate-middle" role="alert" style="z-index: 999;">
            <h4 class="alert-heading">Data Berhasil Diperbarui</h4>
            <hr>
            <p>Detail: [' . $id_admin . ', ' . $username . ', ' . $password . ']</p>
            <div class="d-flex justify-content-md-end">
                <a class="btn btn-success px-4" href="editdataAdmin.php?id_admin=' . $id_admin . '">Ok</a>
            </div>
        </div>';
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAF-Tech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-body">
                <h1 class="card-title">Edit Biodata</h1>
                <hr>
                <form method="post" action="">
                    <div class="form-group mb-3">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>" required>
                    </div>
                    <div class="mt-4">
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        <a href="viewdata.php" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
