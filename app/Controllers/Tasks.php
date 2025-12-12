<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Tasks extends BaseController {
    public function getIndex(): void
    {
        $personenModel = new TasksModel();
        $data['personen'] = $personenModel->getData();

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('pages/personen', $data);
        echo view('templates/footer');


    }
}
