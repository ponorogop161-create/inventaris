<?php
include "../koneksi.php";
include "../inc/header_adm.php"; 

if(isset($_POST['simpan'])){

    $nama = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi_barang'];

    mysqli_query($conn,
    "INSERT INTO barang
    VALUES(
    '',
    '$nama',
    '$jumlah',
    '$kondisi'
    )");

    header("Location: barang.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../assets/img/icon.png">
    <title>Tambah Barang</title>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow border-0">
        <div class="card-body">
            <h3 class="mb-4">Tambah Barang</h3>

            <form method="POST">
                <div class="mb-3">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Kondisi Barang</label>
                    <select name="kondisi_barang" class="form-control">
                        <option>Baik</option>
                        <option>Rusak</option>
                    </select>
                </div>

                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="barang.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>