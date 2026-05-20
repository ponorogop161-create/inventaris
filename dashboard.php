<?php
session_start();
include "../koneksi.php";
include "../inc/header_user.php";

if($_SESSION['role'] != 'peminjam'){
    header("Location: ../login.php");
}

// TOTAL BARANG
$barang = mysqli_query($conn,
"SELECT * FROM barang");

$total_barang = mysqli_num_rows($barang);

// TOTAL PEMINJAMAN USER
$id_user = $_SESSION['id_user'];

$pinjam = mysqli_query($conn,
"SELECT * FROM peminjaman
WHERE id_user='$id_user'");

$total_pinjam = mysqli_num_rows($pinjam);

// DATA BARANG
$data_barang = mysqli_query($conn,
"SELECT * FROM barang
ORDER BY id_barang DESC
LIMIT 5");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../assets/img/icon.png">
    <title>Dashboard User</title>
    <style>
        body{
            background: #f4f6f9;
        }

        .card-dashboard{
            border: none;
            border-radius: 20px;
            color: white;
        }

        .menu-card{
            transition: 0.3s;
        }

        .menu-card:hover{
            transform: translateY(-5px);
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <!-- Welcome -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Dashboard User</h2>

            <p class="text-muted">Selamat datang,<b><?= $_SESSION['nama']; ?></b></p>
        </div>
    </div>

    <!-- Statistik -->
    <div class="row">
        <!-- Barang -->
        <div class="col-md-6 mb-4">
            <div class="card card-dashboard bg-success shadow">
                <div class="card-body">
                    <h5>Total Barang</h5>
                    <h1 class="fw-bold"><?= $total_barang; ?></h1>
                    <p>Barang tersedia</p>
                </div>
            </div>
        </div>

        <!-- Pinjam -->
        <div class="col-md-6 mb-4">
            <div class="card card-dashboard bg-primary shadow">
                <div class="card-body">
                    <h5>Total Peminjaman</h5>
                    <h1 class="fw-bold"><?= $total_pinjam; ?></h1>
                    <p>Barang yang pernah dipinjam</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu -->
    <div class="row">
        <!-- Barang -->
        <div class="col-md-4 mb-4">
            <div class="card menu-card shadow border-0 rounded-4">
                <div class="card-body text-center p-4">
                    <h1>📦</h1>
                    <h5 class="fw-bold">Daftar Barang</h5>
                    <p class="text-muted">Lihat barang tersedia</p>
                    <a href="barang.php" class="btn btn-success w-100">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Pinjam -->
        <div class="col-md-4 mb-4">
            <div class="card menu-card shadow border-0 rounded-4">
                <div class="card-body text-center p-4">
                    <h1>📝</h1>
                    <h5 class="fw-bold">Pinjam Barang</h5>
                    <p class="text-muted">Lakukan peminjaman</p>
                    <a href="pinjam.php" class="btn btn-primary w-100">Pinjam</a>
                </div>
            </div>
        </div>

        <!-- Riwayat -->
        <div class="col-md-4 mb-4">
            <div class="card menu-card shadow border-0 rounded-4">
                <div class="card-body text-center p-4">
                    <h1>📋</h1>
                    <h5 class="fw-bold">Riwayat</h5>
                    <p class="text-muted">Riwayat peminjaman</p>
                    <a href="riwayat.php" class="btn btn-dark w-100">Lihat</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Barang Terbaru -->
    <div class="card shadow border-0 rounded-4">
        <div class="card-body">
            <h4 class="fw-bold mb-4">Barang Terbaru</h4>
            <table class="table table-hover">
                <tr class="table-success">
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                </tr>

                <?php
                $no = 1;

                while($d = mysqli_fetch_array($data_barang)){
                ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama_barang']; ?></td>
                    <td><?= $d['jumlah']; ?></td>
                    <td>
                        <?php
                        if($d['kondisi_barang'] == "Baik"){
                            echo "<span class='badge bg-success'>Baik</span>";
                        }else{
                            echo "<span class='badge bg-danger'>Rusak</span>";
                        }
                        ?>
                    </td>
                </tr>

                <?php } ?>

            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>