<?php

namespace App\Config;

class Config
{

    public static function view($addrs, $data)
    {
        
        require_once $_SERVER['DOCUMENT_ROOT'].'/App/view/'.$addrs.'.php';

    }
}
