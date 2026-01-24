<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Tasks extends BaseController {

    public function __construct() {

        $this->TasksModel = new TasksModel();

    }
    // In Tasks.php

    public function getIndex(): void {
        // Standardwerte setzen, damit die View Variablen zum Arbeiten hat
        $data['activeBoardName'] = 'Alle Boards';
        $data['spalten'] = []; // Leeres Array, damit foreach nicht meckert
        $data['tasks'] = $this->TasksModel->getTasks();
        $data['allBoards'] = $this->TasksModel->getallBoards('boards');

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('pages/tasks', $data);
        echo view('templates/footer');
    }

    public function getTasksfromboards($id = 0): void {

        $rawRows = $this->TasksModel->getBoards($id);
        $viewData = [
            'currentBoardId'  => $id,
            'activeBoardName' => 'Kein Board gewählt',
            'spalten'         => [],
            'allBoards'       => $this->TasksModel->getallBoards('boards')
        ];

        foreach ($rawRows as $row) {

            if ($viewData['activeBoardName'] === 'Kein Board gewählt') {
                $viewData['activeBoardName'] = $row['board_name'];
                $viewData['currentBoardId'] = $row['board_id'];
            }

            $sId = $row['spalte_id'];
            if ($sId) {

                if (!isset($viewData['spalten'][$sId])) {
                    $viewData['spalten'][$sId] = [
                        'name'         => $row['spalte_name'],
                        'beschreibung' => $row['spaltenbeschreibung'],
                        'tasks'        => []
                    ];
                }
                if (!empty($row['task_id'])) {
                    $viewData['spalten'][$sId]['tasks'][] = $row;
                }
            }
        }

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('pages/tasks', $viewData);
        echo view('templates/footer');
    }



    public function getEdit($id = 0, $todo = 0, $boardsid = 0) {
        $data['personen'] = $this->TasksModel->getPersonen();
        $data['taskarten'] = $this->TasksModel->getTaskarten();
        $data['spalten'] = $this->TasksModel->getSpalten();
        $data['allBoards'] = $this->TasksModel->getallBoards('boards');
        $data['todo'] = $todo;
        $data['currentBoardId'] = $boardsid;

        if($id > 0 && ($todo == 1 || $todo == 2 )) {
            $data['tasks'] = $this->TasksModel->getTasks($id);
        }

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('pages/tasks_edit', $data);
        echo view('templates/footer');
    }

    public function postSpeichern()
    {
        $validation = \Config\Services::validation();

        $boardId = $this->request->getPost('board_id');

        if (isset($_POST['btnSpeichern'])) {

            if ($validation->run($_POST, 'tasksBearbeiten')) {
                if (isset($_POST['id']) && $_POST['id'] != '') {
                    $this->TasksModel->updateTask();
                } else {
                    $this->TasksModel->createTask();
                }
                return redirect()->to(base_url('tasks/tasksfromboards/' . $boardId));

            } else {
                $data['currentBoardId'] = $boardId;

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
        } elseif (isset($_POST['btnLoeschen'])) {
            $id = $this->request->getPost('id');
            $this->TasksModel->deleteTask($id);
            return redirect()->to(base_url('tasks/tasksfromboards/' . $boardId));
        }

        return redirect()->to(base_url('tasks/tasksfromboards/' . $boardId));
    }

        public function getDelete($id = 0) {
        $this->TasksModel->deleteTask($id);
            return redirect()->to(base_url('tasks/'));
        }
}