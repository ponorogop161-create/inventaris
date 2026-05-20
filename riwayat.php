<?php
session_start();
include "../koneksi.php";
include "../inc/header_user.php";

if($_SESSION['role'] != 'peminjam'){
    header("Location: ../login.php");
}

$id_user = $_SESSION['id_user'];

$data = mysqli_query($conn,
"SELECT *
FROM peminjaman p
JOIN barang b ON p.id_barang = b.id_barang
WHERE p.id_user='$id_user'
ORDER BY p.id_pinjam DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Riwayat Peminjaman</title>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow border-0 rounded-4">
        <div class="card-body">
            <h3 class="fw-bold mb-4">Riwayat Peminjaman</h3>
            <table class="table table-hover">
                <tr class="table-success">
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Pinjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Status</th>
                </tr>

                <?php
                $no = 1;

                while($d = mysqli_fetch_array($data)){
                ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama_barang']; ?></td>
                    <td><?= $d['jumlah_pinjam']; ?></td>
                    <td><?= $d['tanggal_pinjam']; ?></td>
                    <td><?= $d['status']; ?></td>
                </tr>

                <?php } ?>
            </table>
        </div>
    </div>
</div>

</body>
</html>