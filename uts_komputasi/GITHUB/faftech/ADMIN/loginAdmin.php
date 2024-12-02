<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAF-Tech</title>
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body style="font-family: Heebo;">
    <div class="d-flex" style="position: absolute; top: 1%; left: 3%;">
        <a href="../" class="btn btn-sm btn-outline-light px-3" type="button"><i class="fas fa-caret-square-left me-2"></i>&nbsp;Kembali</a>
    </div>
    <div class="overlay-container" id="alertOverlay" style="position: fixed; top: 0; right: 0; width: 300px; height: 100%; z-index: 1000; display: none;"></div>
    <div class="container">
        <div class="d-flex flex-column itemnya flex-md-row justify-content-center align-items-center">
            <div class="d-flex justify-content-center align-items-center">
                <div class="icon">
                    <img src="../src/logo-no-bg.png" alt="">
                    <h1>FAF-Tech</h1>
                </div>
            </div>
            <div class="card flex-column h-100">
                <div class="card-header pt-3">
                    <div class="d-flex w-100 justify-content-center align-items-center">
                        <h3>Login Admin</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control" placeholder="Username Admin" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Password Admin" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-body text-warning py-0 text-center">
                    <p>Harap berhati-hati dan amankan data akun admin!</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links text-light">
                        Don't have admin account?
                    </div>
                    <div class="d-flex justify-content-center flex-grow-1 text-warning text-center">
                        <p>
                            Masukkan akun ini -> <strong>admin:fikri123</strong><br>(akun ini hanya bisa melihat saja)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    <?php
    include '../koneksi/koneksi.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $sql = "SELECT * FROM $tabelAdmin WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $_SESSION['username_admin'] = $username;
            $_SESSION['password_admin'] = $password;
            if (isset($_SESSION['username_admin'])) {
                echo "<script>
                    loadAlert('Login Success', 'Go to CRUD system...', true);
                    setTimeout(function() {
                        window.location.href = '../CRUD/viewdata.php';
                    }, 2000);
                </script>";
            }
            exit();
        } else {
            echo "<script>
                loadAlert('Login Failed', 'Username atau password salah!', false);
                setTimeout(function() {
                    window.location.href = './loginAdmin.php';
                }, 2000);
            </script>";
        }
    }
    ?>
</body>
</html>

