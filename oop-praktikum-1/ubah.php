<?php
require_once "app/Mhsw.php";

$mhsw = new Mhsw();

// Cek jika ID data telah diberikan
if (!isset($_GET['id'])) {
    echo "ID tidak diberikan.";
    exit;
}

$id = $_GET['id'];

// Dapatkan data mahasiswa berdasarkan ID
$mahasiswa = $mhsw->getById($id);

// Jika data tidak ditemukan, tampilkan pesan kesalahan
if (!$mahasiswa) {
    echo "Data tidak ditemukan.";
    exit;
}

// Proses ketika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    // Lakukan proses perubahan data
    if ($mhsw->ubah($id, $nim, $nama, $alamat)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengubah data mahasiswa.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
    <link rel="stylesheet" href="./layout/assets/css/style.css">
</head>

<body>
    <h1>UBAH DATA MAHASISWA</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>" method="POST">
        <table>
            <tr>
                <td><label for="nim">NIM</label></td>
                <td>:</td>
                <td><input type="text" id="nim" name="nim" value="<?php echo $mahasiswa['mhsw_nim']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" id="nama" name="nama" value="<?php echo $mahasiswa['mhsw_nama']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td>:</td>
                <td><input type="text" id="alamat" name="alamat" value="<?php echo $mahasiswa['mhsw_alamat']; ?>" required></td>
            </tr>
        </table>
        <button type="submit" name="submit" class="btn-tambah">Simpan Perubahan</button>
    </form>
</body>

</html>