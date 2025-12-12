<?php

namespace App\Controllers;

class Tables extends BaseController
{
    public function getIndex(): void
    {
        echo view('templates/head');
        echo view('templates/navbar');
        echo view('tables');
        echo view('templates/footer');
    }

    public function getAdd(): void
    {
        echo view('templates/head');
        echo view('templates/navbar');
        echo view('add');
        echo view('templates/footer');
    }
}
