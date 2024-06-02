<?php
include 'includes/db.php';
include 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $jumlah_tambah = $_POST['jumlah_tambah'];

    $sql = "UPDATE products SET jumlah_barang = jumlah_barang + $jumlah_tambah WHERE id_barang = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Jumlah barang berhasil ditambahkan";
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
    <title>Tambah Jumlah Barang</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1>Tambah Jumlah Barang</h1>
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
                                <input type="number" name="jumlah_tambah" placeholder="Jumlah" required>
                                <input type="submit" value="Tambah">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>