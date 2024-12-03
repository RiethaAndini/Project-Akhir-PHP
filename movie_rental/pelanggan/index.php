<?php
// menghubungkan file config dengan index
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
        <li><a href = "../film/index.php">Data Film</a></li>
        <li><a href = "pelanggan/index.php">Data Pelanggan</a></li>
</ul>

    <h2>Data Pelanggan</h2>
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
            <th>Nama Lengkap</th>
            <th>email</th>
            <th><a href="tambah_pelanggan.php" class="btn btn-primay">Tambah pelanggan</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // membuat penomoran data dari 1
        // membuat variable untuk menjalankan query SQL
        $query = $db->query("SELECT * FROM pelanggan");
        /* perulangan while akan terus berjalan (menampilkan data) 
        selama kondisi $query bernilai true (adanya data pada tabel 
        pelanggan) */
        while ($pelanggan = $query->fetch_assoc()){
        /* fungsi fetch_assoc digunakan untuk  mengambil 
        data perulangan dalam bentuk array */
        ?> <!-- Kode php ditutup untuk menyisipkan kode html yang 
        akan di looping menggunakan while loop -->
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $pelanggan['nama'] ?></td>
            <td><?php echo $pelanggan['email'] ?></td>
            <td align="center">
                <!-- URL ke halaman edit data menggunakan 
                    parameter id pada kolom table -->
                <a href="edit_pelanggan.php?pelanggan_id=<?php echo $pelanggan['pelanggan_id'] ?>">Edit</a>
                <!-- URL untuk menghapus data dengan menggunakan parameter id 
                pada kolom table dan alert konfirmasi hapus data -->
                <a onclick="return confirm('Anda yakin ingin menghapus data?')"
                href="hapus_pelanggan.php?pelanggan_id=<?php echo $pelanggan['pelanggan_id'] ?>">Hapus</a>
            </td>
        </tr>
        <?php
        } /* Mengakhiri proses perulangan while yang dimulai pada baris 48 */
        ?>
    </tbody>
    </table>
    <!-- menghitung jumlah baris yang ada pada tabel (pelaggan) -->
     <p>Total: <?php echo mysqli_num_rows($query); ?></p>
</body>
</html>
