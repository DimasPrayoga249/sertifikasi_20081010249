<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "toko_online1";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Koneksi database gagal: " . $mysqli->connect_error);
}
?>