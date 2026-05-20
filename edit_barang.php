<?php
include "../koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM barang
WHERE id_barang='$id'");

$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../assets/img/icon.png">
    <title>Edit Barang</title>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow border-0">
        <div class="card-body">
            <h3 class="mb-4">Edit Barang</h3>
            <form method="POST" action="update_barang.php">
                <input type="hidden" name="id_barang" value="<?= $d['id_barang']; ?>">

                <div class="mb-3">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" value="<?= $d['nama_barang']; ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" value="<?= $d['jumlah']; ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Kondisi Barang</label>
                    <select name="kondisi_barang" class="form-control">
                        <option <?= $d['kondisi_barang']=='Baik' ? 'selected' : ''; ?>>
                            Baik
                        </option>
                        <option <?= $d['kondisi_barang']=='Rusak' ? 'selected' : ''; ?>>
                            Rusak
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="barang.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>