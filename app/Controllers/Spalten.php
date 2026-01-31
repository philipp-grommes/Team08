<?php

namespace App\Controllers;

use App\Models\SpaltenModel;

class Spalten extends BaseController{
    protected $spaltenModel;

//Konstruktor für das SpaltenModel
    public function __construct(){
        $this->spaltenModel = new SpaltenModel();
    }

//Index-Methode bei Aufruf der Seite
    public function getIndex(): void{
        $data['spalten'] = $this->spaltenModel->getSpalten();

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('pages/spalten', $data);
        echo view('templates/footer');
    }

//Editfunktion für die Spalten
    public function getEdit($id = 0, $todo = 0){
        $data['todo'] = $todo;
        $data['boards'] = $this->spaltenModel->getBoards();
        $data['validation'] = \Config\Services::validation();

        // Daten aus Model laden, wenn ID vorhanden
        if ($id > 0 && ($todo == 1 || $todo == 2)) {
            $data['spalten'] = $this->spaltenModel->getSpalten($id);
        } else {
            $data['spalten'] = []; // Leeres Array für "Erstellen"
        }

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('pages/spalten_edit', $data);
        echo view('templates/footer');
    }

//Speicherfunktion für neue Spalten
    public function postSpeichern(){
        $validation = \Config\Services::validation();

        if (isset($_POST['btnSpeichern'])) {
            if ($validation->run($_POST, 'spaltenBearbeiten')) {
                if ($this->request->getPost('id') != '') {
                    $this->spaltenModel->updateSpalte();
                } else {
                    $this->spaltenModel->createSpalte();
                }
            } else {
                $id = $this->request->getPost('id') ?: 0;
                $todo = ($id > 0) ? 1 : 0;
                $data['todo'] = $todo;
                $data['boards'] = $this->spaltenModel->getBoards();
                $data['spalten'] = $_POST;
                $data['error'] = $validation->getErrors();
                $data['validation'] = $validation;

                echo view('templates/head');
                echo view('templates/navbar');
                echo view('pages/spalten_edit', $data);
                echo view('templates/footer');
                return;
            }
        } elseif (isset($_POST['btnLoeschen'])) {
            $this->spaltenModel->deleteSpalte();
        }
        return redirect()->to(base_url('spalten'));
    }
}