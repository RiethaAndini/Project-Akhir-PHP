<?php
// menghubungkan file koneksi dengan index
include("../koneksi.php");
session_start(); // Mulai sesi
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Movie_rental | Tanjungpinang</title>
    <style>
        /* membuat styling pada table*/
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>
</head>
<body>
    <ul>
        <li><a href = "../pelanggan/index.php">Data Pelanggan</a></li>
        <li><a href = "film/index.php">Data film</a></li>
    </ul>

    <h2>Data film</h2>
    <!-- Tampilan notifikasi jika ada -->
     <?php if (isset($_SESSION['notifikasi'])):?>
        <p><?php echo $_SESSION['notifikasi'];?></p>
        <!-- Hapus notifikasi setelah ditampilkan -->
         <?php unset($_SESSION['notifikasi']); ?>
         <?php endif; ?>
<table>
    <thead>
        <tr align="center">
            <th>#</th>
            <th>Judul Film</th>
            <th>Genre</th>
            <th>Tahun Rilis</th>
            <th><a href="tambah_film.php" class="btn btn-primay">Tambah Film</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // membuat penomoran data dari 1
        // membuat variable untuk menjalankan query SQL
        $query = $db->query("SELECT * FROM film");
        /* perulangan while akan terus berjalan (menampilkan data) 
        selama kondisi $query bernilai true (adanya data pada tabel 
        film) */
        while ($film = $query->fetch_assoc()){
        /* fungsi fetch_assoc digunakan untuk  mengambil 
        data perulangan dalam bentuk array */
        ?> <!-- Kode php ditutup untuk menyisipkan kode html yang 
        akan di looping menggunakan while loop -->
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $film['judul_film'] ?></td>
            <td><?php echo $film['genre'] ?></td>
            <td><?php echo $film['tahun_rilis'] ?></td>
            <td align="center">
                <!-- URL ke halaman edit data menggunakan 
                    parameter id pada kolom table -->
                <a href="edit_film.php?film_id=<?php echo $film['film_id'] ?>">Edit</a>
                <!-- URL untuk menghapus data dengan menggunakan parameter id 
                pada kolom table dan alert konfirmasi hapus data -->
                <a onclick="return confirm('Anda yakin ingin menghapus data?')"
                href="hapus_film.php?film_id=<?php echo $film['film_id'] ?>">Hapus</a>
            </td>
        </tr>
        <?php
        } /* Mengakhiri proses perulangan while yang dimulai pada baris 48 */
        ?>
    </tbody>
    </table>
    <!-- menghitung jumlah baris yang ada pada tabel (film) -->
     <p>Total: <?php echo mysqli_num_rows($query); ?></p>
</body>
</html>