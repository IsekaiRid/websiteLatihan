<?php
require_once('./Views/Layout/Auth/Layout.php');
require_once('./Controller/ControllerAuth.php');

$Auth = new ControllerAuth;

if (!isset($_GET['page']) || $_GET['page'] == null) {
    header('Location:Auth.php?page=login');
    exit;
}

if (isset($_GET['page'])) {
    if ($_GET['page'] == 'login') {
        render('Login');
    } elseif ($_GET['page'] == 'register') {
        render('Register');
    } elseif ($_GET['page'] == 'regisproses') {
        $data['username'] = $_POST['username'];
        $data['email'] = $_POST['email'];
        $data['password'] = $_POST['password'];
        $Auth->ProsesRegister($data);
    } elseif ($_GET['page'] == 'proseslogin') {
        $data['email'] = $_POST['email'];
        $data['password'] = $_POST['password'];
        $Auth->ProsesLogin($data);
    } else {
        header("Location: /404.php");
    }
}
