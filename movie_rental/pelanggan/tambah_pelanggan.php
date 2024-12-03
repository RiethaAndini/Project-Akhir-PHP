<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Rental | Tanjungpinang</title>
</head>
<body>
    <h3>Tambah Data pelanggan</h3>
    <form action="proses_tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>Nama lengkap</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="text" name="email" required></td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>