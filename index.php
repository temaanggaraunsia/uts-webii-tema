<?php
include 'includes/db.php';
include 'includes/functions.php';

$message = '';

if (isset($_GET['status']) && isset($_GET['message'])) {
    $message = $_GET['message'];
    $status = $_GET['status'];
}

$products = getAllProducts($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Inventory Barang</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
</head>

<body>
    <div class="container">
        <h1>Inventory Barang</h1>
        <nav>
            <a href="index.php">Beranda</a> |
            <a href="add_product.php">Tambah Barang</a> |
            <a href="increase_quantity.php">Tambah Jumlah Barang</a> |
            <a href="use_product.php">Gunakan Barang</a>
        </nav>
        <?php if ($message) : ?>
            <div class="message <?php echo $status === 'success' ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Harga Beli</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?php echo $product['id_barang']; ?></td>
                        <td><?php echo $product['kode_barang']; ?></td>
                        <td><?php echo $product['nama_barang']; ?></td>
                        <td><?php echo $product['jumlah_barang']; ?></td>
                        <td><?php echo $product['satuan_barang']; ?></td>
                        <td><?php echo $product['harga_beli']; ?></td>
                        <td><?php echo $product['status_barang'] ? 'Available' : 'Not Available'; ?></td>
                        <td>
                            <a href="edit_product.php?id=<?php echo $product['id_barang']; ?>">Edit</a> |
                            <a href="delete_product.php?id=<?php echo $product['id_barang']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>