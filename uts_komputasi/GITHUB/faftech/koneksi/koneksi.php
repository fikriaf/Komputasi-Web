<?php
$servername = "localhost";
$username_db = "wzdpjjqm_faftech27";
$password_db = "Fikriarmia27@";
$db = "wzdpjjqm_faftech_db";
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
