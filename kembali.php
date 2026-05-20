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
AND p.status='Dipinjam'");

if(isset($_POST['kembali'])){

    $id_pinjam = $_POST['id_pinjam'];
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];

    mysqli_query($conn,
    "CALL kembali_barang(
    '$id_pinjam',
    '$id_barang',
    '$jumlah'
    )");

    echo "
    <script>
        alert('Barang berhasil dikembalikan');
        window.location='riwayat.php';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Pengembalian Barang</title>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow border-0 rounded-4">
        <div class="card-body">
            <h3 class="fw-bold mb-4">Pengembalian Barang</h3>
            <table class="table table-hover">
                <tr class="table-primary">
                    <th>No</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>

                <?php
                $no = 1;

                while($d = mysqli_fetch_array($data)){
                ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama_barang']; ?></td>
                    <td><?= $d['jumlah_pinjam']; ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="id_pinjam" value="<?= $d['id_pinjam']; ?>">
                            <input type="hidden" name="id_barang" value="<?= $d['id_barang']; ?>">
                            <input type="hidden" name="jumlah" value="<?= $d['jumlah_pinjam']; ?>">
                            <button type="submit" name="kembali" class="btn btn-success btn-sm">Kembalikan</button>
                        </form>
                    </td>
                </tr>

                <?php } ?>

            </table>
        </div>
    </div>
</div>

</body>
</html>