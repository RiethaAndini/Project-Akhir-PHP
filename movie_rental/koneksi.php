<?php
// Mennentukan nama host, biasanya "localhost"
$server = "localhost";
// Nama pengguna Mysql (default: root)
$user = "root";
// Kata sandi untuk pengguna Mysql (dafault: kosong untuk root)
$password = "";
// Nama Basis data yang akan di hubungkan 
$nama_database = "movie_rental";

// Mencoba untuk membuat koneksi ke basis data
$db = mysqli_connect($server, $user, $password, $nama_database);

//Memeriksa apakah koneksi berhasil
if (!$db) {
    die("Gagal terhubung dengan database:" . mysqli_connect_error());
}
?>