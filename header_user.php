<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../assets/img/icon.png">
    <title>Dashboard User</title>
</head>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow py-3">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php">INVENTARIS</a>

        <button class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="barang.php">Daftar Barang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="pinjam.php">Pinjam Barang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="kembali.php">Kembalikan Barang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="riwayat.php">Riwayat</a>
                </li>

                <li class="nav-item ms-2 mt-1">
                    <a class="btn btn-light btn-sm" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>