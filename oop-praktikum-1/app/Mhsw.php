<?php

class Mhsw
{
    private $db;

    public function __construct()
    {
        try {
            $this->db = new pdo("mysql:host=localhost;dbname=dbakademik", "root", "");
        } catch (PDOException $e) {
            die("Error " . $e->getMessage());
        }
    }

    public function tampil()
    {
        $sql = "SELECT * FROM tb_mhsw";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }
        return $data;
    }

    public function tambah($nim, $nama, $alamat)
    {
        try {
            $sql = "INSERT INTO tb_mhsw (mhsw_nim, mhsw_nama, mhsw_alamat) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$nim, $nama, $alamat]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function ubah($id, $nim, $nama, $alamat)
    {
        try {
            $sql = "UPDATE tb_mhsw SET mhsw_nim=?, mhsw_nama=?, mhsw_alamat=? WHERE mhsw_id=?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$nim, $nama, $alamat, $id]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function hapus($id)
    {
        try {
            $sql = "DELETE FROM tb_mhsw WHERE mhsw_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT * FROM tb_mhsw WHERE mhsw_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);

            // Ambil satu baris data dari hasil query
            $mahasiswa = $stmt->fetch(PDO::FETCH_ASSOC);

            // Kembalikan data mahasiswa
            return $mahasiswa;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
