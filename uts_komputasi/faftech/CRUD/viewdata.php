<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
    $judul = "FAF-Tech";
?>
  <title><?= $judul ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../style.css">
  <style>
    .actived {
        display: block;
    }
    .inactive {
        display: none;
    }
    .button-actived {
        opacity: 0.5;
        pointer-events: none;
        text-decoration: none;
    }
    .full-access.full-inactive {
        opacity: 0.5;
        pointer-events: none;
        text-decoration: none;
    }
  </style>
</head>
<body>
    <div class="container mt-3">
        <div class="d-flex justify-content-md-start">
            <a href="../" class="btn btn-sm btn-outline-dark px-3" type="button"><i class="fas fa-caret-square-left me-2"></i>Kembali</a>
        </div>
        <h2 class="mt-2"><?= $judul ?></h2>
        <p>Akun admin [<strong>admin:fikri123</strong>] hanya bisa melihat saja!</p>
        <div class="d-flex flex-column-reverse gap-2 flex-md-row justify-content-between">
            <div class="btn-group">
                <a href="javascript:void(0)" id="adminBtn" class="btn btn-secondary button-actived" type="button">Database Admin</a>
                <a href="javascript:void(0)" id="userBtn" class="btn btn-secondary" type="button">Database User</a>
                <a href="javascript:void(0)" id="msgBtn" class="btn btn-secondary" type="button">Database Message</a>
            </div>
            <div class="btn-group">
                <a href="../ADMIN/tambahdataAdmin.php" class="btn btn-secondary text-center full-access full-inactive" type="button"><strong>[+]</strong> Tambah Admin</a>
            </div>
        </div>
        <div class="database-admin actived">
            <div class="table-responsive mt-3" style="height: 450px; width: 100wh; overflow-y: auto;">
                <table class="table table-hover table-striped">
                    <thead class="position-sticky top-0" style="z-index: 999;">
                        <tr class="table-dark">
                            <th class="text-center">
                                <div class="m-2">
                                    <input type="checkbox" name="select_all" id="select_all">
                                </div>
                            </th>
                            <th><div class="m-2">ID Admin</div></th>
                            <th><div class="m-2">Username</div></th>
                            <th><div class="m-2">Password</div></th>
                            <th><div class="m-2">Full Akses</div></th>
                            <th><div class="m-2">Aksi</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../koneksi/koneksi.php';

                        $sql = "SELECT * FROM $tabelAdmin ORDER BY id_admin";
                        $result = $conn->query($sql);

                        // Cek apakah ada data
                        if ($result->num_rows == 0) {
                            echo '
                            <tr>
                                <td colspan="5"><div class="m-2">Data Kosong</div></td>
                            </tr>';

                        } else {
                            while ($row = $result->fetch_assoc()) {
                                $hiddenPassword = str_repeat("*", strlen($row["password"]));
                                echo '
                                <tr>
                                    <td class="text-center">
                                        <div class="m-2">
                                            <input type="checkbox" name="checklist" id="checklist">
                                        </div>
                                    </td>
                                    <td><div class="m-2">'.$row["id_admin"].'</div></td>
                                    <td><div class="m-2">'.$row["username"].'</div></td>
                                    <td><div class="m-2">'.$hiddenPassword.'</div></td>
                                    <td><div class="m-2">'.$row["full_access"].'</div></td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="edit mx-1">
                                                <a class="btn btn-primary px-4 full-access full-inactive" href="../ADMIN/editdataAdmin.php?id_admin='.$row["id_admin"].'" type="button">Edit</a>
                                            </div>
                                            <div class="remove mx-1">
                                                <a class="btn btn-danger full-access full-inactive" href="../ADMIN/hapusdataAdmin.php?id_admin='.$row["id_admin"].'" type="button" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\')">Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                ';
                            }
                        }      
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="database-user inactive">
            <div class="table-responsive mt-3" style="height: 400px; overflow-y: auto;">
                <table class="table table-hover table-striped">
                    <thead class="position-sticky top-0" style="z-index: 999;">
                        <tr class="table-dark">
                            <th class="text-center">
                                <div class="m-2">
                                    <input type="checkbox" name="select_all" id="select_all">
                                </div>
                            </th>
                            <th><div class="m-2">ID User</div></th>
                            <th><div class="m-2">Name</div></th>
                            <th><div class="m-2">Email</div></th>
                            <th><div class="m-2">Password</div></th>
                            <th><div class="m-2">Datetime Signup</div></th>
                            <th><div class="m-2 ">Aksi</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../koneksi/koneksi.php';

                        $sql = "SELECT * FROM $tabelUser ORDER BY id_user";
                        $result = $conn->query($sql);

                        // Cek apakah ada data
                        if ($result->num_rows == 0) {
                            echo '
                            <tr>
                                <td colspan="5"><div class="m-2">Data Kosong</div></td>
                            </tr>';

                        } else {
                            while ($row = $result->fetch_assoc()) {
                            $hiddenPassword = str_repeat("*", strlen($row["password"]));
                            echo '
                            <tr>
                                <td class="text-center">
                                    <div class="m-2">
                                        <input type="checkbox" name="checklist" id="checklist">
                                    </div>
                                </td>
                                <td><div class="m-2">'.$row["id_user"].'</div></td>
                                <td><div class="m-2">'.$row["name"].'</div></td>
                                <td><div class="m-2">'.$row["email"].'</div></td>
                                <td><div class="m-2">'.$hiddenPassword.'</div></td>
                                <td><div class="m-2">'.$row["datetime_signup"].'</div></td>
                                <td>
                                    <div class="d-flex">
                                        <div class="edit mx-1">
                                            <a class="btn btn-primary px-4 full-access full-inactive" href="../ADMIN/editdataUser.php?id_user='.$row["id_user"].'" type="button">Edit</a>
                                        </div>
                                        <div class="remove mx-1">
                                            <a class="btn btn-danger full-access full-inactive" href="../ADMIN/hapusdataUser.php?id_user='.$row["id_user"].'" type="button" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\')">Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="database-message inactive">
            <div class="table-responsive mt-3" style="height: 400px; overflow-y: auto;">
                <table class="table table-hover table-striped">
                    <thead class="position-sticky top-0" style="z-index: 999;">
                        <tr class="table-dark">
                            <th class="text-center">
                                <div class="m-2">
                                    <input type="checkbox" name="select_all" id="select_all">
                                </div>
                            </th>
                            <th><div class="m-2">ID Message</div></th>
                            <th><div class="m-2">Name</div></th>
                            <th><div class="m-2">Email</div></th>
                            <th><div class="m-2">Message</div></th>
                            <th><div class="m-2">Datetime Create</div></th>
                            <th><div class="m-2 ">Aksi</div></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include '../koneksi/koneksi.php';

                        $sql = "SELECT * FROM $tabelMessage ORDER BY id_message";
                        $result = $conn->query($sql);

                        // Cek apakah ada data
                        if ($result->num_rows == 0) {
                            echo '
                            <tr>
                                <td colspan="5"><div class="m-2">Data Kosong</div></td>
                            </tr>';

                        } else {
                            while ($row = $result->fetch_assoc()) {
                            echo '
                            <tr>
                                <td class="text-center">
                                    <div class="m-2">
                                        <input type="checkbox" name="checklist" id="checklist">
                                    </div>
                                </td>
                                <td><div class="m-2">'.$row["id_message"].'</div></td>
                                <td><div class="m-2">'.$row["name"].'</div></td>
                                <td><div class="m-2">'.$row["email"].'</div></td>
                                <td><div class="m-2">'.$row["message"].'</div></td>
                                <td><div class="m-2">'.$row["datetime_create"].'</div></td>
                                <td>
                                    <div class="d-flex">
                                        <div class="edit mx-1">
                                            <a class="btn btn-primary px-4 full-access full-inactive" href="../ADMIN/editdataMessage.php?id_message='.$row["id_message"].'" type="button">Edit</a>
                                        </div>
                                        <div class="remove mx-1">
                                            <a class="btn btn-danger full-access full-inactive" href="../ADMIN/hapusdataMessage.php?id_message='.$row["id_message"].'" type="button" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\')">Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>

<?php
include "../koneksi/koneksi.php";
if (isset($_SESSION['username_admin']) && isset($_SESSION['password_admin'])) {
    $username_sess = $_SESSION['username_admin'];
    $password_sess = $_SESSION['password_admin'];
    
    $cek_full_access = $conn->query("SELECT full_access FROM $tabelAdmin WHERE username = '$username_sess' AND password = '$password_sess'");

    if ($cek_full_access->num_rows > 0) {
        $row = $cek_full_access->fetch_assoc();
        $full_access = $row['full_access'];
        if ($full_access != 1) {
            echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var fullAccessButtons = document.querySelectorAll(".full-access");
                        fullAccessButtons.forEach(function(button) {
                            button.classList.add("full-inactive");
                        });
                    });
                </script>';
        } else {
            echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var fullAccessButtons = document.querySelectorAll(".full-access");
                        fullAccessButtons.forEach(function(button) {
                            button.classList.remove("full-inactive");
                        });
                    });
                </script>';
        }
    }                              
}
?>