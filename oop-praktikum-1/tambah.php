<?php
require_once "app/Mhsw.php";

$mhsw = new Mhsw();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];

	if ($mhsw->tambah($nim, $nama, $alamat)) {
		header("Location: index.php");
		exit;
	} else {
		echo "Gagal menambahkan data mahasiswa.";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Data Mahasiswa</title>
	<link rel="stylesheet" href="./layout/assets/css/style.css">
</head>

<body>
	<h1>TAMBAH DATA MAHASISWA</h1>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
		<table>
			<tr>
				<td><label for="nim">NIM</label></td>
				<td>:</td>
				<td><input type="text" id="nim" name="nim" required></td>
			</tr>
			<tr>
				<td><label for="nama">Nama</label></td>
				<td>:</td>
				<td><input type="text" id="nama" name="nama" required></td>
			</tr>
			<tr>
				<td><label for="alamat">Alamat</label></td>
				<td>:</td>
				<td><input type="text" id="alamat" name="alamat" required></td>
			</tr>
		</table>
		<button type="submit" name="submit" class="btn-tambah">Tambah Data</button>
	</form>
</body>

</html>