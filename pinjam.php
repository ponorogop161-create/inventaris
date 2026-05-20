<?php
session_start();
include "../koneksi.php";
include "../inc/header_user.php";

if($_SESSION['role'] != 'peminjam'){
    header("Location: ../login.php");
}

// PROSES PINJAM
if(isset($_POST['pinjam'])){

    $id_user = $_SESSION['id_user'];
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];

    // MEMANGGIL STORED PROCEDURE
    mysqli_query($conn,
    "CALL pinjam_barang(
    '$id_user',
    '$id_barang',
    '$jumlah'
    )");

    echo "
    <script>
        alert('Barang berhasil dipinjam');
        window.location='barang.php';
    </script>
    ";
}

$barang = mysqli_query($conn,
"SELECT * FROM barang
WHERE jumlah > 0");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Pinjam Barang</title>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4">Pinjam Barang</h3>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Pilih Barang</label>
                            <select name="id_barang" class="form-control" required>
                                <option value="">-- Pilih Barang --</option>
                                
                                <?php
                                while($b = mysqli_fetch_array($barang)){
                                ?>

                                <option value="<?= $b['id_barang']; ?>">
                                    <?= $b['nama_barang']; ?>
                                    (Stok: <?= $b['jumlah']; ?>)
                                </option>

                                <?php } ?>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jumlah Pinjam</label>
                            <input type="number" name="jumlah" class="form-control" required>
                        </div>

                        <button type="submit" name="pinjam" class="btn btn-success w-100">Pinjam Barang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>