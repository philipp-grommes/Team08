<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Personen extends BaseController
{
    public function getIndex(): void
    {
        $tasksmodel= new TasksModel();
        $data['personen'] = $tasksmodel->getData();

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('pages/personen', $data);
        echo view('templates/footer');
    }
}
