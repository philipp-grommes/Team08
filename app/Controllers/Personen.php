<?php namespace App\Controllers;

use App\Models\PersonenModel;

class Personen extends BaseController {

    public function __construct() {

        $this->PersonenModel = new PersonenModel();

    }


    public function getIndex_edit() {

        $data['title'] = "Personendaten bearbeiten";
        $data['personen'] = $this->PersonenModel->getpersonen();

        echo view( 'templates/head');
        echo view( 'templates/navbar');
        echo view('pages/list_edit', $data);
        echo view( 'templates/footer');

    }

    public function getCed_edit($id = 0, $todo = 0) {

        // Todo: 0 = create, 1 = Bearbeiten, 2 = löschen
        $data['todo'] = $todo;
        // Person bearbeiten oder löschen
        if($id > 0 && ($todo == 1 || $todo == 2 ))
            $data['personen'] = $this->PersonenModel->getpersonen($id);

        echo view( 'templates/head');
        echo view( 'templates/navbar');
        echo view( 'pages/edit', $data);
        echo view( 'templates/footer');

    }

    public function postSubmit_edit() {

        // Person ändern
        if(isset($_POST['btnSpeichern'] )) {

            // Daten speichern
            if(isset($_POST['id']) && $_POST['id'] != '') {
                $this->PersonenModel->updatePerson();
            }
            else {
                $this->PersonenModel->createPerson();
            }
            return redirect()->to(base_url('personen/index_edit/'));
        }
        // Person löschen
        elseif (isset($_POST['btnLoeschen'])) {
            $this->PersonenModel->deletePerson();
            return redirect()->to(base_url('personen/index_edit/'));
        }
        // Abbrechen
        elseif (isset($_POST['btnAbbrechen'])) {
            return redirect()->to(base_url('personen/index_edit/'));
        }

    }

}


