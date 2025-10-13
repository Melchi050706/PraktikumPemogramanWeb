<?php
$host = "localhost";
$user = "root";     // sesuaikan dengan user Laragon-mu
$pass = "";         // biasanya kosong di Laragon
$db   = "hsr_cms";  // nama database

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
