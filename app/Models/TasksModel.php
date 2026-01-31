<?php namespace App\Models;

use CodeIgniter\Model;

class TasksModel extends Model{

    protected $table = 'tasks';

    // -DB-Abfrage für Tasks
    public function getTasks($tasks_id = NULL): ?array {

        if ($tasks_id != NULL)
            return $this->db->table('tasks')
                ->where('id', $tasks_id)
                ->select('*')
                ->get()
                ->getRowArray();
        else
            return $this->db->table('tasks')
                ->select('tasks.*, personen.vorname, personen.name, taskarten.taskartenicon, taskarten.taskart as taskartenname')
                ->join('personen', 'personen.id = tasks.personenid')
                ->join('taskarten', 'taskarten.id = tasks.taskartenid', 'left')
                ->orderBy('tasks', 'ASC')
                ->get()
                ->getResultArray();
    }

    // -DB-Abfrage alle Boards mit Spalten
    public function getBoards($board_id = NULL): array{

        $builder = $this->db->table('boards');
        $builder->select('
            boards.id as board_id, boards.board as board_name,
            spalten.id as spalte_id, spalten.spalte as spalte_name, spalten.spaltenbeschreibung,
            tasks.id as task_id, tasks.tasks as task_titel, tasks.notizen, tasks.erstellungsdatum, tasks.erinnerungsdatum,
            personen.vorname, personen.name as nachname, taskarten.taskartenicon, taskarten.taskart as taskartenname')
            ->join('spalten', 'spalten.boardsid = boards.id', 'left')
            ->join('tasks', 'tasks.spaltenid = spalten.id', 'left')
            ->join('personen', 'personen.id = tasks.personenid', 'left')
            ->join('taskarten', 'taskarten.id = tasks.taskartenid', 'left');

        if ($board_id !== NULL) {
            $builder->where('boards.id', $board_id);
        }
        return $builder->orderBy('spalten.sortid', 'ASC')->get()->getResultArray();
    }

// -DB-Insert für neue Tasks
    public function createTask(){

        if (!empty($_POST['tasks'])){
            $this->tasks = $this->db->table('tasks');
            $this->tasks->insert(array('tasks' => $_POST['tasks'],
                'taskartenid' => $_POST['taskartenid'],
                'personenid' => $_POST['personenid'],
                'spaltenid' => $_POST['spaltenid'],
                'erinnerungsdatum' => $_POST['erinnerungsdatum'],
                'erinnerung' => (int)$_POST['erinnerung'],
                'notizen' => $_POST['notizen'] ?? '',
                'erstellungsdatum' => date('Y-m-d')
            ));
        }
    }

// -DB-Update für Tasks
    public function updateTask(): void{

        $this->tasks = $this->db->table('tasks');
        $this->tasks->where('tasks.id', $_POST['id']);
        $this->tasks->update(array('tasks' => $_POST['tasks'],
            'taskartenid' => $_POST['taskartenid'],
            'personenid' => $_POST['personenid'],
            'spaltenid' => $_POST['spaltenid'],
            'erinnerungsdatum' => $_POST['erinnerungsdatum'],
            'erinnerung' => (int)$_POST['erinnerung'],
            'notizen' => $_POST['notizen'] ?? ''));
    }

// -DB-Delete für  Tasks
    public function deleteTask($id){

        $this->tasks = $this->db->table('tasks');
        $this->tasks->where('tasks.id', $id);
        $this->tasks->delete();
    }

// -DB-Abfrage für Auswahl der Taskarten beim Erstellen
    public function getTaskarten(): array{

        return $this->db->table('taskarten')->select('*')->get()->getResultArray();
    }

// -DB-Abfrage für Auswahl der Spalten beim Erstellen
    public function getSpalten($id = 0): array{

        return $this->db->table('spalten')->select('*')->where('spalten.boardsid', $id)->get()->getResultArray();
    }

// -DB-Abfrage für Auswahl der Boards beim Erstellen
    public function getallBoards(string $table): array {

        return $this->db->table($table)->get()->getResultArray();
    }

// -DB-Abfrage für Auswahl der Personen beim Erstellen
    public function getPersonen(): array{

        return $this->db->table('personen')->select('*')->get()->getResultArray();
    }

// -DB-Update der Spalten für Drag and Drop
    public function updateTaskColumn($taskId, $columnId){

        return $this->db->table('tasks')->where('id', $taskId)->update(['spaltenid' => $columnId]);
    }


}