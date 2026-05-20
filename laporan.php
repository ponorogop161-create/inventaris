<?php
include "../koneksi.php";
include "../inc/header_adm.php"; 

$data = mysqli_query($conn,
"SELECT
p.id_pinjam,
u.nama,
b.nama_barang,
p.jumlah_pinjam,
p.tanggal_pinjam
FROM peminjaman p
JOIN user u ON p.id_user = u.id_user
JOIN barang b ON p.id_barang = b.id_barang");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card shadow border-0 rounded-4">
        <div class="card-body">
            <h3 class="fw-bold mb-4">Laporan Peminjaman</h3>
            <table class="table table-bordered">
                <tr class="table-primary">
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
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
                </tr>

                <?php } ?>

            </table>
        </div>
    </div>
</div>

</body>
</html>