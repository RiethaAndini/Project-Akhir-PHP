<?php 

session_start(); //mulai sesi
include("../koneksi.php");

//Periksa apakah tombol "simpan" pada form edit ditekan
if (isset($_POST['simpan'])) {
    //ambil data dari form
    $pelanggan_id = $_POST['pelanggan_id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    //buat query untuk memperbarui data pelanggan
    $sql = "UPDATE pelanggan SET 
        nama='$nama',
        email='$email'
        WHERE pelanggan_id=$pelanggan_id";
        $query = mysqli_query($db, $sql);
        //simpan pesannontifikasi dalam sesi berdasarkan hasil query
        if ($query) {
            $_SESSION['nontifikasi'] = "Data pelanggan berhasil diperbarui!";
        } else {
            $_SESSION['nontifikasi'] = "Data pelanggan gagal diperbarui!";
        }

        //alihkan ke halaman index.php
        header('Location: index.php');
    } else {
        die("akses ditolak...");
    }
    ?>