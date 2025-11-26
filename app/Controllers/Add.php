<?php

namespace App\Controllers;

class Add extends BaseController
{
    public function index()
    {
        echo view('templates/head');
        echo view('templates/navbar');
        echo view('add');
        echo view('templates/footer');
    }
}

