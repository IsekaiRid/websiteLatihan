<?php

require_once('./Models/ModelUsert.php');

class ControllerAuth
{

    public function ProsesRegister($d)
    {
        $modelUsert = new ModelUsert;
        if (in_array(null, $d)) {
            echo 'semua data harus ada';
        } else {
            $hashPaswword = password_hash($d['password'], PASSWORD_BCRYPT);
            $d['password'] = $hashPaswword;
            $modelUsert->RegisterCreate($d);
        }
    }

    public function ProsesLogin($d)
    {
        $modelUsert = new ModelUsert;
        if (in_array(null, $d)) {
            echo 'semua data harus ada';
        } else {
            $modelUsert->Auth($d);
        }
    }
}
