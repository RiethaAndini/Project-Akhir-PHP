<?php
// Termasuk file konfigurasi
include("../koneksi.php");

    // Mengambil id film dari parameter URL
    $film_id = $_GET['film_id'];

    // Mengambil data siswa dari database berdasarkan id
    $query = $db->query("SELECT * FROM film WHERE film_id = '$film_id'");
    // Cek apakah data ditemukan
   $query = $db->query("SELECT * FROM film WHERE film_id = '$film_id'");
$film = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Movie Rental | Tanjungpinang</title>
</head>
<body>
    <h3>Edit Data film</h3>
    <form action="proses_edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="film_id" value="<?php echo $film['film_id']; ?>">
        <table border="0">
            <tr>
                <td>Judul Film</td>
                <td>
                    <input type="text" name="judul_film"
                    value="<?php echo $film['judul_film']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Genre</td>
                <td>
                    <input type="text" name="genre"
                    value="<?php echo $film['genre']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Tahun Rilis</td>
                <td>
                    <input type="text" name="tahun_rilis" 
                    value="<?php echo $film['tahun_rilis']; ?>" required> 
                </td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>