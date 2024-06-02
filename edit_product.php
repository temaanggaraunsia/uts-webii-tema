<?php
include 'includes/db.php';
include 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $satuan_barang = $_POST['satuan_barang'];
    $harga_beli = $_POST['harga_beli'];
    $status_barang = isset($_POST['status_barang']) ? 1 : 0;

    $sql = "UPDATE products SET kode_barang='$kode_barang', nama_barang='$nama_barang', satuan_barang='$satuan_barang', harga_beli=$harga_beli, status_barang=$status_barang WHERE id_barang=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Barang berhasil diupdate";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $id = $_GET['id'];
    $product = getProductById($conn, $id);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Barang</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1>Edit Barang</h1>
        <nav>
            <a href="index.php">Beranda</a> |
            <a href="add_product.php">Tambah Barang</a> |
            <a href="increase_quantity.php">Tambah Jumlah Barang</a> |
            <a href="use_product.php">Gunakan Barang</a> |
            <a href="delete_product.php">Hapus Barang</a>
        </nav>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $product['id_barang']; ?>">
            <label for="kode_barang">Kode Barang:</label><br>
            <input type="text" id="kode_barang" name="kode_barang" value="<?php echo $product['kode_barang']; ?>" required><br>
            <label for="nama_barang">Nama Barang:</label><br>
            <input type="text" id="nama_barang" name="nama_barang" value="<?php echo $product['nama_barang']; ?>" required><br>
            <label for="satuan_barang">Satuan:</label><br>
            <select id="satuan_barang" name="satuan_barang">
                <option value="kg" <?php if ($product['satuan_barang'] == 'kg') echo 'selected'; ?>>Kg</option>
                <option value="pcs" <?php if ($product['satuan_barang'] == 'pcs') echo 'selected'; ?>>Pcs</option>
                <option value="liter" <?php if ($product['satuan_barang'] == 'liter') echo 'selected'; ?>>Liter</option>
                <option value="meter" <?php if ($product['satuan_barang'] == 'meter') echo 'selected'; ?>>Meter</option>
            </select><br>
            <label for="harga_beli">Harga Beli:</label><br>
            <input type="number" step="0.01" id="harga_beli" name="harga_beli" value="<?php echo $product['harga_beli']; ?>" required><br>
            <label for="status_barang">Status:</label><br>
            <input type="checkbox" id="status_barang" name="status_barang" value="1" <?php if ($product['status_barang']) echo 'checked'; ?>><br><br>
            <input type="submit" value="Update">
        </form>
    </div>
</body>

</html>