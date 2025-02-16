<?php
class Database
{
    private $serve = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db = 'frozen_storage';

    public function koneksi()
    {
        $conn = mysqli_connect($this->serve, $this->username, $this->password, $this->db);
        if (!$conn) {
            echo 'erro database tidak terkoneksi dengan baik' . mysqli_connect_error();
        } else {
            // echo 'aman';
            return $conn;
        }
    }
}
