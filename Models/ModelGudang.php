<?php
require_once './config/Database.php';
class ModelGudang
{
    private $con;
    private $kon;

    public function __construct()
    {
        //dua koneksi tugas yang sama sedikit beda penggunaan
        $this->kon = new Database;
        $this->con = $this->kon->koneksi();
    }
    
    public function GetGudangAll()
    {
        $query = 'SELECT * FROM gudang g JOIN Logistik_Barang lb ON g.id_barang = lb.id_barang;';
        $result = mysqli_query($this->con, $query);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
}
