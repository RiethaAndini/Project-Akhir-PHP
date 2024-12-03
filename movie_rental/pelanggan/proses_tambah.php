<?php

session_start(); // Mulai sesi
//Menghubungkan file tot dengan tele konfigurasi database
include("../koneksi.php");

// Mengecek apakah tombol 'simpan telah ditekan
if(isset($_POST['simpan'])){
/* Mengambil nilai dari fore input
    dan menyimpannya ke dalas vartabel */
$nama = $_POST['nama'];
$email = $_POST['email'];
    

/* Menyusun query SQL untuk menambahkandata 
ke tabel 'pelanggan' */
$sql = "INSERT INTO pelanggan 
(nama, email) 
VALUES ('$nama', '$email')";

// Menjalankan query dan menyimpan hasilnya dalam variabel $query
$query = mysqli_query($db, $sql);

// Simpan pesan di sesi
if ($query) {
    $_SESSION['notifikasi'] = "Data pelanggan berhasil ditambahkan!";
} else{
    $_SESSION['notifikasi'] = "Data pelanggan gagal ditambahkan!";
}
//Alihkan ke halaman index.php
header('Location: index.php');
} else{
    //jika akses langsung tanpa form, tampilkan pesann error
    die("Akses ditolak...");
}
?>