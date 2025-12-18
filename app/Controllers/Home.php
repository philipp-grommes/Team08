<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Home extends BaseController
{
    public function getIndex(): void
    {
        $tasksmodel= new TasksModel();
        $data['tasks'] = $tasksmodel->getTasks();

       echo view('templates/head');
       echo view('templates/navbar');
       echo view('startseite', $data);
       echo view('templates/footer');
    }
}
