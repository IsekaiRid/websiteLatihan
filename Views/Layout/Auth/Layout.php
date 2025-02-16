<?php
function render($content)
{
    require __DIR__ . '/../Header.php';
    require "../gudang_beku/Views/$content.php";
    require __DIR__ . '/../Fooder.php';
}
