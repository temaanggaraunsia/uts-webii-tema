<?php
$servername = "db"; // Nama service di docker-compose.yml
$username = "myuser"; // Username yang diatur di docker-compose.yml
$password = "mypassword"; // Password yang diatur di docker-compose.yml
$dbname = "mydatabase"; // Nama database yang diatur di docker-compose.yml

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
