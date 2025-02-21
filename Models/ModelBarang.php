<?php
require_once './config/Database.php';
class ModelBarang
{
    private $con;
    private $kon;

    public function __construct()
    {
        //dua koneksi tugas yang sama sedikit beda penggunaan
        $this->kon = new Database;
        $this->con = $this->kon->koneksi();
    }
    //ambil barang 
    public function GetBarangAll()
    {
        $query = 'SELECT * FROM barang';
        $result = mysqli_query($this->con, $query);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return NULL;
        }
    }
    //created barang dari tabel
    public function CreatedBarang($d)
    {
        $query = "INSERT INTO barang VALUES (NULL,'{$d['nama_barang']}', '{$d['satuan']}', '{$d['stock']}', 'belum di konfirmasi')";
        $result = mysqli_query($this->con, $query);
        if (!$result) {
            $_SESSION['Status_Alert'] = "Terjadi kesalahan!";
            $_SESSION['Type_Alert'] = "error";
            echo "<script>window.location.href = 'index.php?page=barang';</script>";
        } else {
            $_SESSION['Status_Alert'] = "Data di tambahkan";
            $_SESSION['Type_Alert'] = "berhasil";
            echo "<script>window.location.href = 'index.php?page=barang';</script>";
        }
    }
    //delete barang
    public function Deletebarang($id)
    {
        $query = "DELETE FROM barang WHERE id_barang = $id";
        $result = mysqli_query($this->con, $query);

        if (!$result) {
            $_SESSION['Status_Alert'] = "Terjadi kesalahan!";
            $_SESSION['Type_Alert'] = "error";
            echo "<script>window.location.href = 'index.php?page=barang';</script>";
        } else {
            $_SESSION['Status_Alert'] = "Data di Hapus";
            $_SESSION['Type_Alert'] = "berhasil";
            echo "<script>window.location.href = 'index.php?page=barang';</script>";
        }
    }
    //edit barang dari tabel
    public function Editbarang($d)
    {
        $query = "UPDATE barang SET Nama_barang = '{$d['nama_barang']}', Satuan = '{$d['satuan']}', Stok = '{$d['stock']}' WHERE id_barang = {$d['id_barang']}";
        $result = mysqli_query($this->con, $query);
        if (!$result) {
            $_SESSION['Status_Alert'] = "Terjadi kesalahan!";
            $_SESSION['Type_Alert'] = "error";
        } else {
            $_SESSION['Status_Alert'] = "Data edit";
            $_SESSION['Type_Alert'] = "berhasil"; 
        }
        echo "<script>window.location.href = 'index.php?page=barang';</script>";
    }

    //konfimasi status yang ada 
    public function StatusUpdate($d)
    {
        $keluar = isset($d['tanggalKeluar']) && !empty($d['tanggalKeluar']) ? "'" . $d['tanggalKeluar'] . "'" : "NULL";
        $masuk = isset($d['tanggalMasuk']) && !empty($d['tanggalMasuk']) ? "'" . $d['tanggalMasuk'] . "'" : "NULL";

        $id_usert = $_SESSION['StatusUset']['id_usert'];
        $duplikasi = "SELECT * FROM barang WHERE id_barang = '{$d['id_barang']}'";
        $cek = mysqli_query($this->con, $duplikasi);
        $data = mysqli_fetch_assoc($cek);

        $query = "UPDATE barang SET Status='{$d['status']}' WHERE id_barang = '{$d['id_barang']}'";
        $result = mysqli_query($this->con, $query);

        $log_create = "INSERT INTO `log_gudang`
                       VALUES (NULL, 'Gudang A', '$id_usert', '{$d['id_barang']}', '{$data['Satuan']}', '{$data['Stok']}', $masuk, $keluar)";
        $log_run = mysqli_query($this->con, $log_create);

        // Perbaikan pada kondisi
        if (!$result || !$log_run) {
            $_SESSION['Status_Alert'] = "Terjadi kesalahan!";
            $_SESSION['Type_Alert'] = "error";
        } else {
            $_SESSION['Status_Alert'] = "Data Update";
            $_SESSION['Type_Alert'] = "berhasil";
        }

        echo "<script>window.location.href = 'index.php?page=barang';</script>";
    }
}
