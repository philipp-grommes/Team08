<?php

namespace App\Controllers;


use App\Models\BoardsModel;

class Boards extends BaseController
{
    protected $boardsModel;

    public function __construct()
    {
        $this->boardsModel = new BoardsModel();
    }

    public function getIndex(): void
    {
        $data['boards'] = $this->boardsModel->getBoards();

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('pages/boards', $data);
        echo view('templates/footer');
    }

    public function getEdit($id = 0, $todo = 0)
    {
        $data['todo'] = $todo;
        $data['validation'] = \Config\Services::validation();

        // Daten aus Model laden, wenn ID vorhanden
        if ($id > 0 && ($todo == 1 || $todo == 2)) {
            $data['boards'] = $this->boardsModel->getBoards($id);
        } else {
            $data['boards'] = []; // Leeres Array für "Erstellen"
        }

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('pages/boards_edit', $data);
        echo view('templates/footer');
    }

    public function postSpeichern()
    {
        $validation = \Config\Services::validation();

        if (isset($_POST['btnSpeichern'])) {
            if ($validation->run($_POST, 'boardsBearbeiten')) {
                if ($this->request->getPost('id') != '') {
                    $this->boardsModel->updateBoard();
                } else {
                    $newID = $this->boardsModel->createBoard();
                    if($newID){
                        return redirect()->to(base_url('tasks/tasksfromboards/'.$newID));
                    }
                }

            } else {
                $id = $this->request->getPost('id') ?: 0;
                $todo = ($id > 0) ? 1 : 0;
                $data['todo'] = $todo;
                $data['boards'] = $_POST;
                $data['error'] = $validation->getErrors();
                $data['validation'] = $validation;

                echo view('templates/head');
                echo view('templates/navbar');
                echo view('pages/boards_edit', $data);
                echo view('templates/footer');
                return;
            }

        } elseif (isset($_POST['btnLoeschen'])) {
            $this->boardsModel->deleteBoard();
        }

        return redirect()->to(base_url('boards'));
    }
}

