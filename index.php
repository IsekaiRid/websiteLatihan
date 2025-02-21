<?php
session_start();
require_once('./Views/Layout/Layout.php');
require_once('./Models/ModelBarang.php');
require_once('./Models/ModelLogBarang.php');

// $modelbarang = new ModelBarang;
$modelbarang = new ModelBarang;
$modellog = new ModelLogBarang;

if (!isset($_GET['page'])) {
    header('Location:Auth.php?page=login');
    exit;
}

if (!isset($_SESSION['StatusUset'])) {
    header('Location:https://i.pinimg.com/736x/a5/95/fa/a595fa98e47c118b6922af248f8cb652.jpg');
}

if (isset($_SESSION['StatusUset'])) {
    if (isset($_GET['page'])) {
        if ($_GET['page'] == 'barang') {
            render('Tabel_Gudang');
        } elseif ($_GET['page'] == 'welcome') {
            render('Welcome');
            subrender('Tabel_info_log');
            //welcome tampilan
        } elseif ($_GET['page'] == 'konfimasi') {
            render('Tabel_konfirmasi');
            //tampilan konfirmasi tabel

            //proses route ke dalam modal langsung
        } elseif ($_GET['page'] == 'info_gudang') {
            render('Tabel_DidalamGudang');
        } elseif ($_GET['page'] == 'konfirmasiproses') {
            $data['status'] = $_POST['status'];
            $data['tanggalKeluar'] = $_POST['tanggalKeluar'];
            $data['tanggalMasuk'] = $_POST['tanggalMasuk'];
            $data['id_barang'] = $_POST['id'];
            $modelbarang->StatusUpdate($data);
        } elseif ($_GET['page'] == 'tambah_barang') {
            $data['nama_barang'] = $_POST['nama_barang'];
            $data['satuan'] = $_POST['satuan'];
            $data['stock'] = $_POST['stock'];
            $modelbarang->CreatedBarang($data);
        } elseif ($_GET['page'] == 'delete_barang') {
            $id = $_GET['target'];
            $modelbarang->Deletebarang($id);
        } elseif ($_GET['page'] == 'edit_barang') {
            $data['id_barang'] = $_POST['id'];
            $data['nama_barang'] = $_POST['nama_barang'];
            $data['satuan'] = $_POST['satuan'];
            $data['stock'] = $_POST['stock'];
            $modelbarang->Editbarang($data);
        } elseif ($_GET['page'] == 'logout') {
            session_destroy();
            header('Location:Auth.php?page=login');
        } else {
            header("Location: /404.php");
        }
    }
}
