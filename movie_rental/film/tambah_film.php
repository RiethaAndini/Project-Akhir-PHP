<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Rental | Tanjungpinang</title>
</head>
<body>
    <h3>Tambah Data film</h3>
    <form action="proses_tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>Judul Film</td>
                <td><input type="text" name="judul_film" required></td>
            </tr>
            <tr>
                <td>Genre</td>
                <td><input type="text" name="genre" required></td>
            </tr>
            <tr>
                <td>Tahun Rilis</td>
                <td><input type="text" name="tahun_rilis" required></td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>