<?php
function render($content)
{
    require __DIR__ . '/Header.php';
    require __DIR__ . '/Navbar.php';
    require __DIR__ . '/SideBar.php';
    require "../gudang_beku/Views/Dashboard/$content.php";
    require __DIR__ . '/Fooder.php';
};
function subrender($content)
{
    require "../gudang_beku/Views/Dashboard/$content.php";
}
