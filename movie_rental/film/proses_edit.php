<?php 

session_start(); //mulai sesi
include("../koneksi.php");

//Periksa apakah tombol "simpan" pada form edit ditekan
if (isset($_POST['simpan'])) {
    //ambil data dari form
    $film_id = $_POST['film_id'];
    $judul_film = $_POST['judul_film'];
    $genre = $_POST['genre'];
    $tahun_rilis = $_POST['tahun_rilis'];

    //buat query untuk memperbarui data film
    $sql = "UPDATE film SET
        judul_film='$judul_film',
        genre='$genre',
        tahun_rilis='$tahun_rilis'
        WHERE film_id=$film_id";
        $query = mysqli_query($db, $sql);
        //simpan pesannontifikasi dalam sesi berdasarkan hasil query
        if ($query) {
            $_SESSION['nontifikasi'] = "Data film berhasil diperbarui!";
        } else {
            $_SESSION['nontifikasi'] = "Data film gagal diperbarui!";
        }

        //alihkan ke halaman index.php
        header('Location: index.php');
    } else {
        die("akses ditolak...");
    }
    ?>