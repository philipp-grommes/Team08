<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Tasks extends BaseController {

//Konstruktor für das TasksModel
    public function __construct(){
        $this->TasksModel = new TasksModel();
    }

//Index-Methode für den Aufurf der Seite
    public function getIndex(): void {

        $data['activeBoardName'] = 'Alle Boards';
        $data['spalten'] = [];
        $data['tasks'] = $this->TasksModel->getTasks();
        $data['allBoards'] = $this->TasksModel->getallBoards('boards');

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('pages/tasks', $data);
        echo view('templates/footer');
    }

//Aufbau der einzelnen TaskBoards
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

//Editfunktion für die Tasks
    public function getEdit($id = 0, $todo = 0, $boardsid = 0) {

        $data['personen'] = $this->TasksModel->getPersonen();
        $data['taskarten'] = $this->TasksModel->getTaskarten();
        $data['spalten'] = $this->TasksModel->getSpalten($boardsid);
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

//Speicherfunktion für die Tasks
    public function postSpeichern()
    {
        $validation = \Config\Services::validation();

        $boardId = $this->request->getPost('boardsid');

        if (isset($_POST['btnSpeichern'])) {

            if ($validation->run($_POST, 'tasksBearbeiten')) {
                if (isset($_POST['id']) && $_POST['id'] != '') {
                    $this->TasksModel->updateTask();
                } else {
                    $this->TasksModel->createTask();
                }

            } else {
                $data['currentBoardId'] = $boardId;

                $id = $this->request->getPost('id') ?: 0;

                $data['todo'] = ($id > 0) ? 1 : 0;
                $data['tasks'] = $_POST;
                $data['error'] = $validation->getErrors();
                $data['personen'] = $this->TasksModel->getPersonen();
                $data['taskarten'] = $this->TasksModel->getTaskarten();
                $data['spalten'] = $this->TasksModel->getSpalten($boardId);
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
        }
        return redirect()->to(base_url('tasks/tasksfromboards/' . $boardId));
    }

    public function postUpdatecolumn(){
        $taskId   = $this->request->getPost('task_id');
        $columnId = $this->request->getPost('column_id');

        $success = $this->TasksModel->updateTaskColumn($taskId, $columnId);

        return $this->response->setJSON(['success' => $success]);
    }
}