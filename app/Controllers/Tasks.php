<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Tasks extends BaseController {
    public function getIndex(): void
    {
        $tasksModel = new TasksModel();
        $data['tasks'] = $tasksModel->getTasks();

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('tasks', $data);
        echo view('templates/footer');
    }
}
