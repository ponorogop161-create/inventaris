<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="assets/img/icon.png">
    <title>Login Inventaris</title>
    <style>

        body{
            background: linear-gradient(135deg, #0d6efd, #4f8cff);
            height: 100vh;
            overflow: hidden;
        }

        .login-card{
            border: none;
            border-radius: 25px;
            overflow: hidden;
        }

        .left-side{
            background: #0d6efd;
            color: white;
            padding: 50px;
        }

        .right-side{
            padding: 50px;
        }

        .form-control{
            height: 50px;
            border-radius: 12px;
        }

        .btn-login{
            height: 50px;
            border-radius: 12px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-login:hover{
            transform: scale(1.03);
        }

        .icon-box{
            width: 90px;
            height: 90px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-10">
            <div class="card login-card shadow-lg">
                <div class="row g-0">
                    <!-- Kiri -->
                    <div class="col-md-6 left-side d-flex flex-column justify-content-center text-center">
                        <div class="icon-box">
                            <i class="bi bi-box-seam fs-1"></i>
                        </div>
                        <h1 class="fw-bold">INVENTARIS</h1>
                        <p class="mt-3">Sistem Pengelolaan Barang Inventaris Sekolah</p>
                    </div>

                    <!-- Kanan -->
                    <div class="col-md-6 bg-white right-side">
                        <h2 class="fw-bold mb-2 text-center">Selamat Datang</h2>
                        <p class="text-muted text-center mb-4">Silakan login untuk melanjutkan</p>
                        <form method="POST" action="cek_login.php">
                            <!-- Username -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" class="form-control" name="username" placeholder="Masukkan username" required>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold"> Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-login"><i class="bi bi-box-arrow-in-right"></i>Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>