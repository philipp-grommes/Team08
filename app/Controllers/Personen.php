<?php

namespace App\Controllers;

use App\Models\PersonenModel;

class Personen extends BaseController
{
    public function __construct(){
        $this->PersonenModel = new PersonenModel();
}
    public function getIndex(): void
    {

        $data['personen'] = $this->PersonenModel->getPersonen();

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('pages/personen', $data);
        echo view('templates/footer');
    }

    public function getPersonenerstellen(): void{

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('pages/personen_erstellen');
        echo view('templates/footer');

    }
    public function postStore(){
        if (isset($_POST['btnStore'])){


            $passwort = $_POST['passwort'];

            $gehashtesPasswort = password_hash($passwort, PASSWORD_DEFAULT);
            $person= [
                'vorname'=>$_POST['vorname'],
                'name'=>$_POST['name'],
                'email'=>$_POST['email'],
                'passwort'=>$gehashtesPasswort,
            ];
            $this->PersonenModel->createPerson($person);
            return redirect()->to(base_url('personen/'));
        }
    }
}
