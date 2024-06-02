<?php
include 'includes/db.php';
include 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $jumlah_pakai = $_POST['jumlah_pakai'];

    $sql = "UPDATE products SET jumlah_barang = jumlah_barang - $jumlah_pakai WHERE id_barang = $id AND jumlah_barang >= $jumlah_pakai";

    if ($conn->query($sql) === TRUE) {
        echo "Barang berhasil digunakan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

$products = getAllProducts($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Gunakan Barang</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1>Gunakan Barang</h1>
        <nav>
            <a href="index.php">Beranda</a> |
            <a href="add_product.php">Tambah Barang</a> |
            <a href="increase_quantity.php">Tambah Jumlah Barang</a> |
            <a href="use_product.php">Gunakan Barang</a>
        </nav>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?php echo $product['id_barang']; ?></td>
                        <td><?php echo $product['nama_barang']; ?></td>
                        <td><?php echo $product['jumlah_barang']; ?></td>
                        <td>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $product['id_barang']; ?>">
                                <input type="number" name="jumlah_pakai" placeholder="Jumlah" required>
                                <input type="submit" value="Gunakan">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>