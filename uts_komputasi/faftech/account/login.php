<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FAF-Tech</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	<!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div style="position: absolute; top: 1%; left: 3%;">
        <a href="../" class="btn btn-sm btn-outline-dark px-3 kembali" type="button"><i class="fas fa-caret-square-left"></i>&nbsp;Kembali</a>
    </div>
	<div class="overlay-container" id="alertOverlay" style="position: fixed; top: 0; right: 0; width: 300px; height: 100%; z-index: 1000; display: none;"></div>
	<div class="icon">
		<img src="../src/logo-no-bg.png" alt="logo">
		<h1>FAF-Tech</h1>
	</div>
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">
		<div class="signup">
			<form method="post" action="">
				<label for="chk" aria-hidden="true">Signup</label>
				<input type="text" name="name" placeholder="Name" required="">
				<input type="email" name="email_signup" placeholder="Email" required="">
				<input type="password" name="password_signup" placeholder="Password" required="">
				<button type="submit" name="action" value="signup">Sign up</button>
			</form>
		</div>
		<div class="login">
			<form method="post" action="">
				<label for="chk" aria-hidden="true">Login</label>
				<input type="email" name="email_login" placeholder="Email" required="">
				<input type="password" name="password_login" placeholder="Password" required="">
				<button type="submit" name="action" value="login">Login</button>
			</form>
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
include "../koneksi/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	//SIGNUP
    if (isset($_POST['action']) && $_POST['action'] === 'signup') {
		$name = $_POST["name"];
		$email = $_POST["email_signup"];
		$password = $_POST["password_signup"];
		$datetimenow = date('Y-m-d H:i:s');
	
		$name_ = mysqli_real_escape_string($conn, $name);
		$email_ = mysqli_real_escape_string($conn, $email);
		$password_ = mysqli_real_escape_string($conn, $password);
	
		$sql = "INSERT INTO $tabelUser (name, email, password, datetime_signup) VALUES ('$name_', '$email_', '$password_', '$datetimenow')";
		$result = $conn->query($sql);
	
		if ($result) {
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
			echo "<script>
					loadAlert('Signup Success', 'Go to homepage...', true);
					setTimeout(function() {
						window.location.href = '../';
					}, 2000);
            	</script>";
		} else {
			echo "<script>loadAlert('Signup Failed', 'Server System Error!', false);</script>";
		}
    }

	// LOGIN
    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        $email = $_POST['email_login'];
        $password = $_POST['password_login'];

		$sql = "SELECT * FROM $tabelUser WHERE email = '$email' AND password = '$password'";
    	$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
			
			echo "<script>
					loadAlert('Login Success', 'Go to homepage...', true);
					setTimeout(function() {
						window.location.href = '../';
					}, 2000);
				</script>";
		} else {
			echo "<script>
				loadAlert('Login Failed', 'Username or password is wrong!', false);
				setTimeout(function() {
					window.location.href = './login.php';
				}, 2000);
			</script>";
		}
    }
}

?>