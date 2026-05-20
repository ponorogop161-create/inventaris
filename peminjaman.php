<?php
include "../koneksi.php";
include "../inc/header_adm.php"; 

$data = mysqli_query($conn,
"SELECT *
FROM peminjaman p
JOIN user u ON p.id_user = u.id_user
JOIN barang b ON p.id_barang = b.id_barang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../assets/img/icon.png">
    <title>Data Peminjaman</title>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow border-0">
        <div class="card-body">
            <h3 class="mb-4">Data Peminjaman</h3>
            <table class="table table-bordered table-hover">
                <tr class="table-success">
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Barang</th>
                    <th>Jumlah Pinjam</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>

                <?php
                $no = 1;

                while($d = mysqli_fetch_array($data)){
                ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama']; ?></td>
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