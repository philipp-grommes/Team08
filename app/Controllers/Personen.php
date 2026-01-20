<?php

namespace App\Controllers;

use App\Models\PersonenModel;

class Personen extends BaseController
{
    public function getIndex(): void
    {
        $personenModel= new PersonenModel();
        $data['personen'] = $personenModel->getPersonen();

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('pages/personen', $data);
        echo view('templates/footer');
    }
}
