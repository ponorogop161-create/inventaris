<?php
session_start();
include "../koneksi.php";
include "../inc/header_user.php";

if($_SESSION['role'] != 'peminjam'){
    header("Location: ../login.php");
}

$data = mysqli_query($conn,
"SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Daftar Barang</title>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow border-0 rounded-4">
        <div class="card-body">
            <h3 class="fw-bold mb-4">Daftar Barang</h3>
            <table class="table table-hover">
                <tr class="table-success">
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Status</th>
                </tr>

                <?php
                $no = 1;
                while($d = mysqli_fetch_array($data)){
                ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama_barang']; ?></td>
                    <td><?= $d['jumlah']; ?></td>
                    <td><?= $d['kondisi_barang']; ?></td>
                    <td>
                        <?php
                        if($d['jumlah'] > 0){
                            echo "<span class='badge bg-success'>Tersedia</span>";
                        }else{
                            echo "<span class='badge bg-danger'>Habis</span>";
                        }
                        ?>
                    </td>
                </tr>

                <?php } ?>

            </table>
        </div>
    </div>
</div>

</body>
</html>