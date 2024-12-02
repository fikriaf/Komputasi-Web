<?php
$servername = "localhost";
$username_db = "root";
$password_db = "fikri";
$db = "faftech";
$tabelAdmin = "admin";
$tabelUser = "user";
$tabelMessage = "message";
$tabelAbout = "about";
$tabelProject = "project";

$conn = new mysqli($servername, $username_db, $password_db, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
