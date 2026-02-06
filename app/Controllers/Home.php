<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Home extends BaseController
{
    public function getIndex()
    {
        return redirect()->to(base_url('tasks'));
    }

    public function getFooter(){
        echo view ('templates/header');
        echo view ('templates/navbar');
        echo view ('templates/footer');

    }
}
