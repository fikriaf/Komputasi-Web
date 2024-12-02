<?php
session_start();
include '../koneksi/koneksi.php';

if (isset($_SESSION["username_admin"]) && $_SESSION["password_admin"]) {
    $username = $_SESSION["username_admin"];
    $password = $_SESSION["password_admin"];

    $query = "SELECT * FROM $tabelAdmin WHERE username = '$username' and password = '$password'";
    $result = $conn->query($query);

    if ($result) {
        if (isset($_GET['id_admin'])) {
            $id_admin = $_GET['id_admin'];
            $query_edit = "SELECT * FROM $tabelAdmin WHERE id_admin = '$id_admin'";
            $result_edit = $conn->query($query_edit);
            $row_edit = $result->fetch_assoc();
        }
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
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @media (max-width: 768px) {
            h1.card-title {
                padding: 8.5px 0 !important;
            }
        }
    </style>
</head>
<body>
    <div class="d-flex" style="position: absolute; top: 1%; left: 3%;">
        <a href="../CRUD/viewdata.php" class="btn btn-sm btn-outline-dark px-3" type="button"><i class="fas fa-caret-square-left me-2"></i>&nbsp;Kembali</a>
    </div>
    <div class="overlay-container" id="alertOverlay" style="position: fixed; top: 0; right: 0; width: 300px; height: 100%; z-index: 1000; display: none;"></div>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-center">
                    <img src="../src/profile.png" class="img-fluid" width="20%" alt="">
                    <div class="h-100 w-100">
                        <h1 class="card-title text-center border border-primary h-100 w-100 mb-0" style="font-size: 10vw; padding: 25px 0;">Edit Biodata</h1>
                    </div>
                </div>
                <hr>
                <form method="post" action="">
                    <div class="form-group mb-3">
                        <label for="username">username:</label>
                        <input type="username" class="form-control" id="username" name="username" value="<?php echo $row_edit["username"]; ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" id="password" name="password" value="<?php echo $row_edit["password"]; ?>" required>
                    </div>
                    <div class="mt-4">
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        <a href="../CRUD/viewdata.php" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function loadAlert(alertHead, alertText, alertIndicator) {
            fetch('../src/alert/alert.php?head='+ encodeURIComponent(alertHead) +'&text=' + encodeURIComponent(alertText)+'&indicator='+alertIndicator)
            .then(response => response.text())
            .then(data => {
                document.getElementById('alertOverlay').innerHTML = data;
                document.getElementById('alertOverlay').style.display = 'block';
                initializeAlert();
            })
            .catch(error => console.error('Error loading alert:', error));
        }
        function closeAlert() {
            const alertBox = document.querySelector('.alert');
            alertBox.style.animation = 'slide-out 0.5s ease forwards';
        }
        function initializeAlert() {
            document.querySelector('.closebtn').addEventListener('click', closeAlert);
            setTimeout(closeAlert, 2000);
        }
    </script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "UPDATE $tabelAdmin SET username = '$username', password = '$password' WHERE id_admin = '$id_admin'";
    $result = $conn->query($query);

    if ($result) {
        echo "<script>
                loadAlert('Update Success', 'Your Data Has Been Updated', true);
                setTimeout(function() {
                    window.location.href = './editdataAdmin.php';
                }, 2000);
            </script>";
    }
    else {
        echo "<script>
                loadAlert('Update Failed', 'System Error', false);
                setTimeout(function() {
                    window.location.href = './editdataAdmin.php';
                }, 2000);
            </script>";
    }
}
?>
