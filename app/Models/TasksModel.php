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

    public function getTasks(): array {
        return $this->db->table('tasks')
            ->select('*')
            ->orderBy('tasks', 'ASC')
            ->get()
            ->getResultArray();
    }



}
