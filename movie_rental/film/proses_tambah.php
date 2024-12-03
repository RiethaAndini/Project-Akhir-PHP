<?php

session_start(); // Mulai sesi
//Menghubungkan file tot dengan tele konfigurasi database
include("../koneksi.php");

// Mengecek apakah tombol 'simpan telah ditekan
if(isset($_POST['simpan'])){
/* Mengambil nilai dari fore input
    dan menyimpannya ke dalas vartabel */
$judul_film = $_POST['judul_film'];
$genre = $_POST['genre'];
$tahun_rilis = $_POST['tahun_rilis'];
    

/* Menyusun query SQL untuk menambahkandata 
ke tabel 'film' */
$sql = "INSERT INTO film 
(judul_film, genre, tahun_rilis) 
VALUES ('$judul_film', '$genre', '$tahun_rilis')";

// Menjalankan query dan menyimpan hasilnya dalam variabel $query
$query = mysqli_query($db, $sql);

// Simpan pesan di sesi
if ($query) {
    $_SESSION['notifikasi'] = "Data film berhasil ditambahkan!";
} else{
    $_SESSION['notifikasi'] = "Data film gagal ditambahkan!";
}
//Alihkan ke halaman index.php
header('Location: index.php');
} else{
    //jika akses langsung tanpa form, tampilkan pesann error
    die("Akses ditolak...");
}
?>