<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_web2";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
// $host = "sql104.infinityfree.com";
// $username = "if0_42239747";
// $password = "olSNSpLRiw0HDOz";
// $database = "if0_42239747_pwl";

// $conn = mysqli_connect($host, $username, $password, $database);
?>