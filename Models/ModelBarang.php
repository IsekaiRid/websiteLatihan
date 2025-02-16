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
    public function GetbarangAll()
    {
        $query = 'SELECT * FROM Logistik_Barang;';
        $result = mysqli_query($this->con, $query);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
}
