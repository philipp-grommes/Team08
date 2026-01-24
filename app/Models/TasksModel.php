<?php namespace App\Models;

use CodeIgniter\Model;

class TasksModel extends Model{

    public function getTasks($tasks_id = NULL): ?array {
        if ($tasks_id != NULL)
            return $this->db->table('tasks')
                ->where('id', $tasks_id)
                ->select('*')
                ->get()
                ->getRowArray();
        else
            return $this->db->table('tasks')
                ->select('tasks.*, personen.vorname, personen.name')
                ->join('personen', 'personen.id = tasks.personenid')
                ->orderBy('tasks', 'ASC')
                ->get()
                ->getResultArray();


    }

    public function createTask()
    {
        if (!empty($_POST['tasks']) && !empty($_POST['taskartenid']) && !empty($_POST['personenid']) && !empty($_POST['erinnerungsdatum'])) {


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

            return redirect()->to(base_url('tasks/'));
        }
        return  redirect()->to(base_url('tasks/edit/'));
    }

    public function updateTask(): void
    {
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

    public function deleteTask($id)
    {
        $this->tasks = $this->db->table('tasks');
        $this->tasks->where('tasks.id', $id);
        $this->tasks->delete();
    }

    public function getTaskarten(): array{
        return $this->db->table('taskarten')->select('*')->get()->getResultArray();
    }

    public function getSpalten(): array{
        return $this->db->table('spalten')->select('*')->get()->getResultArray();
    }
    protected $table = 'tasks';

    public function getBoards($board_id = NULL): array
    {
        $builder = $this->db->table('boards');
        $builder->select('
            boards.id as board_id, boards.board as board_name,
            spalten.id as spalte_id, spalten.spalte as spalte_name, spalten.spaltenbeschreibung,
            tasks.id as task_id, tasks.tasks as task_titel, tasks.notizen, tasks.erstellungsdatum,
            personen.vorname, personen.name as nachname
        ')
            ->join('spalten', 'spalten.boardsid = boards.id', 'left')
            ->join('tasks', 'tasks.spaltenid = spalten.id', 'left')
            ->join('personen', 'personen.id = tasks.personenid', 'left');

        if ($board_id !== NULL) {
            $builder->where('boards.id', $board_id);
        }

        return $builder->orderBy('spalten.sortid', 'ASC')->get()->getResultArray();
    }
    public function getallBoards(string $table): array {
        return $this->db->table($table)->get()->getResultArray();
    }
    public function getPersonen(): array{
        return $this->db->table('personen')->select('*')->get()->getResultArray();
    }

}