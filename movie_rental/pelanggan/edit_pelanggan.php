<?php
// Termasuk file konfigurasi
include("../koneksi.php");

// Periksa apakah ID ada dalam URL
if (isset($_GET['pelanggan_id'])) {
    // Mengambil id film dari parameter URL
    $id = $_GET['pelanggan_id'];

    // Mengambil data siswa dari database berdasarkan id
    $query = $db->query("SELECT * FROM pelanggan WHERE pelanggan_id = '$id'");
    // Cek apakah data ditemukan
    if ($query->num_rows > 0) {
        $pelanggan = $query->fetch_assoc();
    } else {
        die("Data pelanggan tidak ditemukan.");
    }
} else {
    die("ID tidak ditemukan dalam URL.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Movie Rental | Tanjungpinang</title>
</head>
<body>
    <h3>Edit Data pelanggan</h3>
    <form action="proses_edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="pelanggan_id" value="<?php echo $pelanggan['pelanggan_id']; ?>">
        <table border="0">
            <tr>
                <td>Nama Lengkap</td>
                <td>
                    <input type="text" name="nama" 
                    value="<?php echo $pelanggan['nama']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>email</td>
                <td>
                    <input type="text" name="email" 
                    value="<?php echo $pelanggan['email']; ?>" required>
                </td>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>
