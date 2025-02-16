<?php
session_start();
require_once('./Views/Layout/Layout.php');
require_once('./Models/ModelBarang.php');
require_once('./Models/ModelGudang.php');

$modelbarang = new ModelBarang;
$modelGudang = new ModelGudang;

if (!isset($_GET['page'])) {
    // header('Location:Auth.php?page=login');
    exit;
}

if (!isset($_SESSION['StatusUset'])) {
    header('Location:https://i.pinimg.com/736x/a5/95/fa/a595fa98e47c118b6922af248f8cb652.jpg');
}

if (isset($_SESSION['StatusUset'])) {
    if (isset($_GET['page'])) {
        if ($_GET['page'] == 'logistik') {
            render('LogistikTabel');
        } elseif ($_GET['page'] == 'welcome') {
            render('Welcome');
        } elseif ($_GET['page'] == 'gudang') {
            render('Gudang');
        } elseif ($_GET['page'] == 'prosesEdit') {
           
        } else {
            header("Location: /404.php");
        }
    }
}
