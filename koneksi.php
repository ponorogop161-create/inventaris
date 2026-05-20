<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "inventaris_db"
);

if(!$conn){
    die("Koneksi gagal : " . mysqli_connect_error());
}

?>