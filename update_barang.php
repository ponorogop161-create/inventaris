<?php
include "../koneksi.php";

$id = $_POST['id_barang'];
$nama = $_POST['nama_barang'];
$jumlah = $_POST['jumlah'];
$kondisi = $_POST['kondisi_barang'];

mysqli_query($conn,
"UPDATE barang SET
nama_barang='$nama',
jumlah='$jumlah',
kondisi_barang='$kondisi'
WHERE id_barang='$id'");

header("Location: barang.php");
?>