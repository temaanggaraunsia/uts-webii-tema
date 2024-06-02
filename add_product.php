<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $satuan_barang = $_POST['satuan_barang'];
    $harga_beli = $_POST['harga_beli'];
    $status_barang = isset($_POST['status_barang']) ? 1 : 0;

    $sql = "INSERT INTO products (kode_barang, nama_barang, satuan_barang, harga_beli, status_barang) 
            VALUES ('$kode_barang', '$nama_barang', '$satuan_barang', $harga_beli, $status_barang)";

    if ($conn->query($sql) === TRUE) {
        echo "Barang berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Barang</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1>Tambah Barang</h1>
        <nav>
            <a href="index.php">Beranda</a> |
            <a href="add_product.php">Tambah Barang</a> |
            <a href="increase_quantity.php">Tambah Jumlah Barang</a> |
            <a href="use_product.php">Gunakan Barang</a> |
            <a href="delete_product.php">Hapus Barang</a>
        </nav>
        <form method="POST" action="">
            <label for="kode_barang">Kode Barang:</label><br>
            <input type="text" id="kode_barang" name="kode_barang" required><br>
            <label for="nama_barang">Nama Barang:</label><br>
            <input type="text" id="nama_barang" name="nama_barang" required><br>
            <label for="satuan_barang">Satuan:</label><br>
            <select id="satuan_barang" name="satuan_barang">
                <option value="kg">Kg</option>
                <option value="pcs">Pcs</option>
                <option value="liter">Liter</option>
                <option value="meter">Meter</option>
            </select><br>
            <label for="harga_beli">Harga Beli:</label><br>
            <input type="number" step="0.01" id="harga_beli" name="harga_beli" required><br>
            <label for="status_barang">Status:</label><br>
            <input type="checkbox" id="status_barang" name="status_barang" value="1"><br><br>
            <input type="submit" value="Tambah">
        </form>
    </div>
</body>

</html>