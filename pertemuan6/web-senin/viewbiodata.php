<!DOCTYPE html>
<html lang="en">
<head>
<?php
    $judul = "Lihat Biodata Mahasiswa";
?>
  <title><?= $judul ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <h2><?= $judul ?></h2>
        <p>Semua data yang ada di bawah ini, sudah tersimpan di database.</p>
        <div class="d-flex justify-content-end">
            <a href="./tambahdata.php" class="btn btn-secondary btn-lg px-4" type="button"><strong>+</strong> Tambah</a>
        </div>
        <div class="table-responsive mt-3" style="height: 400px; overflow-y: auto;">
            <table class="table table-hover table-striped">
                <thead class="position-sticky top-0">
                    <tr class="table-dark">
                        <th class="text-center">
                            <div class="m-2">
                                <input type="checkbox" name="select_all" id="select_all">
                            </div>
                        </th>
                        <th><div class="m-2">ID</div></th>
                        <th><div class="m-2">Nama Depan</div></th>
                        <th><div class="m-2">Nama Belakang</div></th>
                        <th><div class="m-2 ">Aksi</div></th>
                    </tr>
                </thead>
                <tbody style="height: 400px; overflow-y: auto;">
                    <?php
                    include "koneksi.php"; // Koneksi ke database

                    $sql = "SELECT * FROM biodata ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);

                    // Cek apakah ada data
                    if (mysqli_num_rows($result) == 0) {
                    ?>
                    <tr>
                        <td colspan="5"><div class="m-2">Data Kosong</div></td>
                    </tr>
                    <?php
                    } else {
                        // Looping untuk menampilkan data
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td class="text-center">
                            <div class="m-2">
                                <input type="checkbox" name="checklist" id="checklist">
                            </div>
                        </td>
                        <td><div class="m-2"><?= $row['id'] ?></div></td>
                        <td><div class="m-2"><?= $row['namadepan'] ?></div></td>
                        <td><div class="m-2"><?= $row['namabelakang'] ?></div></td>
                        <td>
                            <div class="d-flex">
                                <div class="edit mx-1">
                                    <a href="editdata.php?id=<?= $row['id'] ?>" class="btn btn-primary px-4" type="button">Edit</a>
                                </div>
                                <div class="remove mx-1">
                                    <a href="hapusdata.php?id=<?= $row['id'] ?>" class="btn btn-danger" type="button" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
