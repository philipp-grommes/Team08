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
    public function getEdit($id = 0, $todo = 0) {
        $data['todo'] = $todo;
        $data['boards'] = $this->spaltenModel->getBoards();
        $data['validation'] = \Config\Services::validation();

        if ($id > 0 && ($todo == 1 || $todo == 2)) {
            $data['spalten'] = $this->spaltenModel->getSpalten($id);

            if (isset($data['spalten']['boardsid'])) {
                $sortIds = $this->spaltenModel->getSortidsByBoard($data['spalten']['boardsid']);

                // Beim Bearbeiten: Nur die existierenden IDs nehmen
                $data['availableSortIds'] = $sortIds;
            }
        } else {
            $data['spalten'] = [];
            // Beim Erstellen: Bestehende IDs + die nächste freie Nummer am Ende
            $data['availableSortIds'] = [];
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
                $boardsid = $this->request->getPost('boardsid'); // Ausgewähltes Board holen

                $data['todo'] = $todo;
                $data['boards'] = $this->spaltenModel->getBoards();
                $data['spalten'] = $_POST;
                $data['error'] = $validation->getErrors();
                $data['validation'] = $validation;

                //Die Sort-IDs für das aktuell gewählte Board neu laden!
                if (!empty($boardsid)) {
                    $sortIds = $this->spaltenModel->getSortidsByBoard($boardsid);

                    if ($todo == 0) {
                        $max = empty($sortIds) ? 0 : max($sortIds);
                        $sortIds[] = $max + 1;
                    }
                    $data['availableSortIds'] = array_unique($sortIds);
                } else {
                    $data['availableSortIds'] = [];
                }

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

// Funktion, um die auswählbaren SortIDs für eine Spalte zu bekommen
    public function getSortids($boardId, $todo = 0)
    {
        $sortIds = $this->spaltenModel->getSortidsByBoard($boardId);

        if ($todo == 0) {
            $max = empty($sortIds) ? 0 : max($sortIds);
            $sortIds[] = $max + 1;
        }

        return $this->response->setJSON(array_unique($sortIds));
    }
}