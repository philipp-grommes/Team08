<?php namespace App\Models;

use CodeIgniter\Model;

class BoardsModel extends Model{
    public function getBoards($board_id = NULL): array {
        if ($board_id != NULL)
            return $this->db->table('boards')
                ->where('id', $board_id)
                ->select('*')
                ->get()
                ->getRowArray();
        else
            return $this->db->table('boards')
                ->select('*')
                ->orderBy('id', 'ASC')
                ->get()
                ->getResultArray();


    }

    public function createBoard()
    {
        if (!empty($_POST['board'])) {


            $this->boards = $this->db->table('boards');
            $this->boards->insert(array('board' => $_POST['board']));

            return redirect()->to(base_url('boards'));
        }

        return  redirect()->to(base_url('boards/edit/'));

    }

    public function updateBoard(): void
    {
        $this->boards = $this->db->table('boards');
        $this->boards->where('boards.id', $_POST['id']);
        $this->boards->update(array('board' => $_POST['board']));
    }

    public function deleteBoard(): void
    {
        $this->db->transStart();

        $this->spalten = $this->db->table('spalten')
            ->select('id')
            ->where('boardsid', $_POST['id'])
            ->get()
            ->getResultArray();

        foreach ($this->spalten as $spalte) {
            $this->tasks = $this->db->table('tasks')
                ->where('spaltenid', $spalte['id'])
                ->delete();
        }

        $this->db->table('spalten')
            ->where('boardsid', $_POST['id'])
            ->delete();

        $this->db->table('boards')
            ->where('id', $_POST['id'])
            ->delete();

        $this->db->transComplete();

    }

}

