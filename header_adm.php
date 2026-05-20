<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../assets/img/icon.png">
    <title>Dashboard Admin</title>

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

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow py-3">
    <div class="container">
        <a class="navbar-brand fw-bold fs-2" href="dashboard.php">INVENTARIS</a>
        <button class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="dashboard.php">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="barang.php">Data Barang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="tambah_barang.php">Tambah Barang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="peminjaman.php">Peminjaman</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="laporan.php">Laporan Peminjaman</a>
                </li>

                <li class="nav-item ms-2 mt-1">
                    <a class="btn btn-light btn-sm" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>