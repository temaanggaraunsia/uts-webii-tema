<?php
include 'includes/db.php';
include 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Validasi ID
    if (!is_numeric($id)) {
        echo "ID tidak valid.";
        exit;
    }

    $sql = "DELETE FROM products WHERE id_barang = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?message=Barang berhasil dihapus&status=success");
    } else {
        header("Location: index.php?message=Error: " . $conn->error . "&status=error");
    }

    $conn->close();
} else {
    echo "Permintaan tidak valid.";
}
