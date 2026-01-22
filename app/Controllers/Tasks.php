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
        $data['personen'] = $this->TasksModel->getPersonen();
        $data['taskarten'] = $this->TasksModel->getTaskarten();
        $data['spalten'] = $this->TasksModel->getSpalten();
        $data['boards'] = $this->TasksModel->getBoards();
        $data['todo'] = $todo;
        if($id > 0 && ($todo == 1 || $todo == 2 ))
            $data['tasks'] = $this->TasksModel->getTasks($id);

        echo view( 'templates/head');
        echo view( 'templates/navbar');
        echo view( 'pages/tasks_edit', $data);
        echo view( 'templates/footer');

    }

    public function postSubmit() {
            $validation = \Config\Services::validation();
            if (isset($_POST['btnSpeichern'])) {

                if ($validation->run($_POST, 'tasksBearbeiten')) {
                    if (isset($_POST['id']) && $_POST['id'] != '') {
                        $this->TasksModel->updateTask();
                    } else {
                        $this->TasksModel->createTask();
                    }
                    return redirect()->to(base_url('tasks/'));

                } else {

                    $id = $this->request->getPost('id') ?: 0;
                    $todo = ($id > 0) ? 1 : 0;

                    $data['todo'] = $todo;
                    $data['tasks'] = $_POST;
                    $data['error'] = $validation->getErrors();
                    $data['personen'] = $this->TasksModel->getPersonen();
                    $data['taskarten'] = $this->TasksModel->getTaskarten();
                    $data['spalten'] = $this->TasksModel->getSpalten();
                    $data['boards'] = $this->TasksModel->getBoards();

                    echo view('templates/head');
                    echo view('templates/navbar');
                    echo view('pages/tasks_edit', $data);
                    echo view('templates/footer');
                    return;
                }
            }
            elseif (isset($_POST['btnLoeschen'])) {
                $this->TasksModel->deleteTask();
                return redirect()->to(base_url('tasks/'));
            }
            return redirect()->to(base_url('tasks/'));
        }

        public function getDelete($id = 0) {
        $this->TasksModel->deleteTask($id);
            return redirect()->to(base_url('tasks/'));
        }
}