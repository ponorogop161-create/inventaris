<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM user 
WHERE username='$username' 
AND password='$password'");

$cek = mysqli_num_rows($query);

if($cek > 0){

    $data = mysqli_fetch_assoc($query);

    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = $data['role'];

    // LOGIN ADMIN
    if($data['role'] == 'admin'){
        header("Location: admin/dashboard.php");
    }

    // LOGIN USER / PEMINJAM
    else if($data['role'] == 'peminjam'){
        header("Location: user/dashboard.php");
    }

}else{
    echo "
    <script>
        alert('Username atau Password salah!');
        window.location='login.php';
    </script>
    ";
}
?>