<?php
require_once "app/Mhsw.php";

$mhsw = new Mhsw();

// Cek apakah ID data telah diberikan
if (!isset($_GET['id'])) {
    echo "ID tidak diberikan.";
    exit;
}

$id = $_GET['id'];

// Proses penghapusan data
if ($mhsw->hapus($id)) {
    // Redirect ke halaman index.php setelah penghapusan berhasil
    header("Location: index.php");
    exit;
} else {
    echo "Gagal menghapus data mahasiswa.";
}
?>
