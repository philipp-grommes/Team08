<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Home extends BaseController
{
    public function getIndex(): void
    {
       echo view('templates/head');
       echo view('templates/navbar');
       echo view('pages/taskboard');
       echo view('templates/footer');
    }
}
