<?php namespace App\Models;

use CodeIgniter\Model;

class TasksModel extends Model{

    public function getData(): array
    {
        return $this->db->table('personen')
            ->select('*')
            ->get()
            ->getResultArray();
    }

    public function getTasks($tasks_id = NULL): array {
        if ($tasks_id != NULL)
            return $this->db->table('tasks')
                ->where('id', $tasks_id)
                ->select('*')
                ->orderBy('tasks', 'ASC')
                ->get()
                ->getRowArray();
        else
            return $this->db->table('tasks')
            ->select('*')
            ->orderBy('tasks', 'ASC')
            ->get()
            ->getResultArray();


    }

    public function createTask()
    {
        if (!empty($_POST['task']) && !empty($_POST['taskartenid']) && !empty($_POST['personenid']) && !empty($_POST['erinnerungsdatum'])) {


            $this->tasks = $this->db->table('tasks');
            $this->tasks->insert(array('tasks' => $_POST['task'],
                'taskartenid' => $_POST['taskartenid'],
                'personenid' => $_POST['personenid'],
                'spaltenid' => $_POST['spaltenid'],
                'erinnerungsdatum' => $_POST['erinnerungsdatum'],
                'erinnerung' => (int)$_POST['erinnerung'],
                'notizen' => $_POST['notizen'] ?? ''));

            return redirect()->to(base_url('tasks/'));
        }

        return  redirect()->to(base_url('tasks/edit/'));

    }

    public function updateTask(): void
    {
        $this->tasks = $this->db->table('tasks');
        $this->tasks->where('tasks.id', $_POST['id']);
        $this->tasks->update(array('tasks' => $_POST['task'],
            'taskartenid' => $_POST['taskartenid'],
            'personenid' => $_POST['personenid'],
            'spaltenid' => $_POST['spaltenid'],
            'erinnerungsdatum' => $_POST['erinnerungsdatum'],
            'erinnerung' => (int)$_POST['erinnerung'],
            'notizen' => $_POST['notizen'] ?? ''));
    }

    public function deleteTask(): void
    {
        $this->tasks = $this->db->table('tasks');
        $this->tasks->where('tasks.id', $_POST['id']);
        $this->tasks->delete();
    }




}
