<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Tasks extends BaseController {
    public function getIndex(): void
    {
        $TasksModel = new TasksModel();
        $data['tasks'] = $TasksModel->getTasks();

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('pages/tasks', $data);
        echo view('templates/footer');
    }

    public function __construct() {

        $this->TasksModel = new TasksModel();

    }

    public function getEdit($id = 0, $todo = 0) {

        $data['todo'] = $todo;
        // Person bearbeiten oder löschen
        if($id > 0 && ($todo == 1 || $todo == 2 ))
            $data['tasks'] = $this->TasksModel->getTasks($id);

        echo view( 'templates/head');
        echo view( 'templates/navbar');
        echo view( 'pages/tasks_edit', $data);
        echo view( 'templates/footer');

    }

    public function postSubmit() {

        if(isset($_POST['btnSpeichern'] )) {

            // Daten speichern
            if(isset($_POST['id']) && $_POST['id'] != '') {
                $this->TasksModel->updateTask();
            }
            else {
                $this->TasksModel->createTask();
            }
            return redirect()->to(base_url('tasks/'));
        }
        // Person löschen
        elseif (isset($_POST['btnLoeschen'])) {
            $this->TasksModel->deleteTask();
            return redirect()->to(base_url('tasks/'));
        }
        // Abbrechen
        elseif (isset($_POST['btnAbbrechen'])) {
            return redirect()->to(base_url('tasks/'));
        }
    }
}
