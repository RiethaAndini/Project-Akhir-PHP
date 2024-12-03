<?php
session_start(); // Mulai sesi
include("../koneksi.php"); // Menghubungkan file config

// Periksa apakah ada ID yang dikirim melalui URL
if (isset($_GET['film_id'])) {
    // Ambil ID dari URL
    $film_id = $_GET['film_id'];

    // Buat query untuk menghapus data siswa berdasarkan ID
    $sql = "DELETE FROM film WHERE film_id = $film_id"; // Perbaiki nama tabel dan gunakan variabel $id
    $query = mysqli_query($db, $sql);

    // Simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Data siswa berhasil dihapus!";
    } else {
        $_SESSION['notifikasi'] = "Data siswa gagal dihapus!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa ID, tampilkan pesan error
    die("Akses ditolak...");
}
?>