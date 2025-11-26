<?php

namespace App\Controllers;

class Tables extends BaseController
{
    public function index()
    {
        echo view('templates/head');
        echo view('templates/navbar');
        echo view('tables');
        echo view('templates/footer');
    }
}
