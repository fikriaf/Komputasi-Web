<?php
$servername = "localhost";
$username = "root";
$password = "fikri";
$db = "web-senin";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($servername, $username, $password, $db);
} catch (\Throwable $th) {
    echo "Koneksi Gagal: ", error->getMessage();
}

?>