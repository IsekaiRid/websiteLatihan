<?php
require_once './config/Database.php';
class ModelUsert
{
    private $con;
    private $kon;

    public function __construct()
    {
        //dua koneksi tugas yang sama sedikit beda penggunaan
        $this->kon = new Database;
        $this->con = $this->kon->koneksi();
    }

    public function RegisterCreate($d)
    {
        session_start();
        $duplikasi = "SELECT * FROM user WHERE email = '{$d['email']}'";
        $cek =  mysqli_query($this->con, $duplikasi);

        if (!$cek) {
            $_SESSION['Status_Alert'] = "Email Sudah di gunakan";
            $_SESSION['Type_Alert'] = "error";
            echo "<script>window.location.href = 'Auth.php?page=register';</script>";
        } else {
            $query = "INSERT INTO user VALUES (NULL, '{$d['username']}', '{$d['email']}','{$d['password']}', 'user')";
            $result = mysqli_query($this->con, $query);

            if (!$result) {
                $_SESSION['Status_Alert'] = "Terjadi kesalahan! Silakan coba lagi.";
                $_SESSION['Type_Alert'] = "error";
                echo "<script>window.location.href = 'Auth.php?page=register';</script>";
            } else {
                $_SESSION['Status_Alert'] = "Aman";
                $_SESSION['Type_Alert'] = "berhasil";
                echo "<script>window.location.href = 'Auth.php?page=login';</script>";
            }
        }
    }

    public function Auth($d)
    {
        session_start();
        $duplikasi = "SELECT * FROM user WHERE email = '{$d['email']}'";
        $query =  mysqli_query($this->con, $duplikasi);
        $data = mysqli_fetch_assoc($query);
        if (password_verify($d['password'], $data['password'] ?? "")) {
            // $_SESSION['Status_Alert'] = "Aman";
            // $_SESSION['Type_Alert'] = "berhasil";
            $_SESSION['StatusUset'] = $data;
            echo "<script>window.location.href = 'index.php?page=welcome';</script>";
        } else {
            $_SESSION['Status_Alert'] = "erro terjadi masalah saat anda login";
            $_SESSION['Type_Alert'] = "error";
            echo "<script>window.location.href = 'Auth.php?page=register';</script>";
        }
    }
}
