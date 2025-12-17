<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Tasks extends BaseController {
    public function getIndex(): void
    {
        $tasksModel = new TasksModel();
        $data['personen'] = $tasksModel->getData();

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('pages/personen', $data);
        echo view('templates/footer');
    }
}
