<?php
session_start(); // Mulai sesi
include("../koneksi.php"); // Menghubungkan file config

// Periksa apakah ada ID yang dikirim melalui URL
if (isset($_GET['pelanggan_id'])) {
    // Ambil ID dari URL
    $id = $_GET['pelanggan_id'];

    // Buat query untuk menghapus data siswa berdasarkan ID
    $sql = "DELETE FROM pelanggan WHERE pelanggan_id = $id"; // Perbaiki nama tabel dan gunakan variabel $id
    $query = mysqli_query($db, $sql);

    // Simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Data pelanggan berhasil dihapus!";
    } else {
        $_SESSION['notifikasi'] = "Data pelanggan gagal dihapus!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa ID, tampilkan pesan error
    die("Akses ditolak...");
}
?>