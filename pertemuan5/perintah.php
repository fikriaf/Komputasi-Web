<?php

$host = "127.0.0.1";
$username = "root";
$password = "fikri";
$koneksi = new mysqli($host, $username, $password);

echo "KETERANGAN:<br>";
# Membuat Database
$namaDatabase = "kbwp5";
$membuat_database = $koneksi->query("CREATE DATABASE IF NOT EXISTS $namaDatabase");
if ($membuat_database === TRUE) {
    echo "Pembuatan database berhasil atau sudah ada";
} else {
    echo "<br>Gagal membuat database: " . $koneksi->error;
}


# Hubungkan ke database
$koneksi = new mysqli($host, $username, $password, $namaDatabase);
if ($koneksi->connect_error) {
    die("<br>Koneksi ke database gagal: " . $koneksi->connect_error);
}


# Membuat Table
$namaTabel = "biodata";
$membuat_table = $koneksi->query("CREATE TABLE IF NOT EXISTS $namaTabel(id INT, nama varchar(50), nim varchar(50), angkatan INT)");
if ($membuat_table == TRUE) {
    echo "<br>Membuat table berhasil atau sudah ada";
} else {
    echo "<br>Gagal membuat database: " . $koneksi->error;
}


# Insert Database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $angkatan = $_POST["angkatan"];
    $menginsertIsi = $koneksi->prepare("INSERT INTO $namaTabel (id, nama, nim, angkatan) VALUES (?, ?, ?, ?)");
    $menginsertIsi->bind_param("issi", $id, $nama, $nim, $angkatan);
    if ($menginsertIsi->execute()) {
        echo "<br><h1>Berhasil Insert Data</h1>";
    } else {
        echo "";
    }
}


# Select Tabel
function tampilkan() {
    GLOBAL $koneksi, $namaTabel;
    $selectTable = $koneksi->query("SELECT * FROM $namaTabel");
    if ($selectTable->num_rows > 0) {
        // Menampilkan data setiap baris
        echo "===============================<br>";
        echo "         Data Terbaru<br>";
        echo "===============================<br>";
        echo "| id | nama |  nim  | angkatan |<br>";
        echo "===============================<br>";
        while($row = $selectTable->fetch_assoc()) {
            if (isset($row["id"])) {
                echo "{ " . $row["id"] . ", " . $row["nama"] . ", " . $row["nim"] . ", " . $row["angkatan"] . " } <br>";
            }
        }
        echo "===============================<br>";
    } else {
        echo "Tidak ada data yang ditemukan.";
    }
}


if (isset($_GET["delete"])) {
    # Delete Data
    $where_id = $_GET['where_id'] ?? null;
    $where_nama = $_GET['where_nama'] ?? null;
    $where_nim = $_GET['where_nim'] ?? null;
    $where_angkatan = $_GET['where_angkatan'] ?? null;
    if ($where_id) {
        $deleteData = $koneksi->query("DELETE FROM $namaTabel WHERE id = $where_id");
    } elseif ($where_nama) {
        $deleteData = $koneksi->query("DELETE FROM $namaTabel WHERE nama = '$where_nama'");
    } elseif ($where_nim) {
        $deleteData = $koneksi->query("DELETE FROM $namaTabel WHERE nim = '$where_nim'");
    } elseif ($where_angkatan) {
        $deleteData = $koneksi->query("DELETE FROM $namaTabel WHERE angkatan = $where_angkatan");
    } else {
        echo "<br><h1>Tidak ada parameter yang terisi!</h1>";
        exit;
    }
    if ($deleteData === TRUE) {
        echo "<br><h1>Berhasil Delete</h1>";
    } else {
        echo "<br><h1>Gagal Delete</h1>";
    }
} elseif (isset($_GET["update"])) {
    # Update Data
    $set_id = $_GET['set_id'] ?? null;
    $set_nama = $_GET['set_nama'] ?? null;
    $set_nim = $_GET['set_nim'] ?? null;
    $set_angkatan = $_GET['set_angkatan'] ?? null;

    $where_id = $_GET['where_id'];

    $query = "UPDATE $namaTabel SET ";
    
    if (isset($_GET['set_id'])) {
        $set_id = $_GET['set_id'];
        $query .= "id='$set_id'";
    }
    if (isset($_GET['set_nama'])) {
        $set_nama = $_GET['set_nama'];
        if (strpos($query, "=") !== false) {
            $query .= ", ";
        }
        $query .= "nama='$set_nama'";
    }
    if (isset($_GET['set_nim'])) {
        $set_nim = $_GET['set_nim'];
        if (strpos($query, "=") !== false) {
            $query .= ", ";
        }
        $query .= "nim='$set_nim'";
    }
    if (isset($_GET['set_angkatan'])) {
        $set_angkatan = $_GET['set_angkatan'];
        if (strpos($query, "=") !== false) {
            $query .= ", ";
        }
        $query .= "angkatan='$set_angkatan'";
    }

    $query .= " WHERE id='$where_id'";

    $updateData = $koneksi->query($query);
    if ($updateData === TRUE) {
        echo "<br><h1>Berhasil Update</h1>";
    } else {
        echo "<br><h1>Gagal Update</h1>";
    }
}

tampilkan();



