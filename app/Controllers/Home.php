<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Home extends BaseController
{
    public function getIndex(): void
    {
       echo view('templates/head');
       echo view('templates/navbar');
       echo view('startseite');
       echo view('templates/footer');
    }
}
