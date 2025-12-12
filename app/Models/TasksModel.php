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



}
