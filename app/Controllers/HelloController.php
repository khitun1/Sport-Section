<?php

namespace App\Controllers;

class HelloController extends \Framework\Controller
{
    public function hello(){
        return $this->view('header.php');
    }
}