<?php
session_start();
include '../koneksi/koneksi.php';

if (isset($_SESSION["email"]) && $_SESSION["password"]) {
    $email = $_SESSION["email"];
    $password = $_SESSION["password"];

    $query = "SELECT name FROM $tabelUser WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
    } else {

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
        <a href="../" class="btn btn-sm btn-outline-dark px-3" type="button"><i class="fas fa-caret-square-left me-2"></i>&nbsp;Kembali</a>
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
                        <label for="name">Nama:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" id="password" name="password" value="<?php echo $password; ?>" required>
                    </div>
                    <div class="mt-4">
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        <a href="../" class="btn btn-secondary">Kembali</a>
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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "UPDATE $tabelUser SET name = '$name', email = '$email', password = '$password' WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result) {
        echo "<script>
                loadAlert('Update Success', 'Your Data Has Been Updated', true);
                setTimeout(function() {
                    window.location.href = './edit.php';
                }, 2000);
            </script>";
    }
    else {
        echo "<script>
                loadAlert('Update Failed', 'System Error', false);
                setTimeout(function() {
                    window.location.href = '../';
                }, 2000);
            </script>";
    }
}
?>
