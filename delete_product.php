<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM products WHERE id_barang = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Barang berhasil dihapus";
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
    <title>Hapus Barang</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1>Hapus Barang</h1>
        <nav>
            <a href="index.php">Beranda</a> |
            <a href="add_product.php">Tambah Barang</a> |
            <a href="increase_quantity.php">Tambah Jumlah Barang</a> |
            <a href="use_product.php">Gunakan Barang</a> |
            <a href="delete_product.php">Hapus Barang</a>
        </nav>
        <form method="POST" action="">
            <label for="id">Pilih Barang:</label><br>
            <select id="id" name="id" required>
                <option value="">Pilih Barang</option>
                <?php foreach ($products as $product) : ?>
                    <option value="<?php echo $product['id_barang']; ?>">
                        <?php echo $product['nama_barang']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>
            <input type="submit" value="Hapus">
        </form>
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
                                <input type="submit" value="Hapus">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>