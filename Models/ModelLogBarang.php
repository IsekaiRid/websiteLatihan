<?php
require_once './config/Database.php';
class ModelLogBarang
{
    private $con;
    private $kon;

    public function __construct()
    {
        //dua koneksi tugas yang sama sedikit beda penggunaan
        $this->kon = new Database;
        $this->con = $this->kon->koneksi();
    }

    public function GetLog()
    {
        $query = 'SELECT * FROM log_gudang lg LEFT JOIN barang b ON lg.Id_barang = b.id_barang LEFT JOIN user u ON lg.Id_konfirmasi = u.id_usert;';
        $result = mysqli_query($this->con, $query);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return NULL;
        }
    }
}
