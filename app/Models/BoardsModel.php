<?php namespace App\Models;

use CodeIgniter\Model;

class BoardsModel extends Model{
    public function getBoards($board_id = NULL): array {
        if ($board_id != NULL)
            return $this->db->table('boards')
                ->where('id', $board_id)
                ->select('*')
                ->orderBy('board', 'ASC')
                ->get()
                ->getRowArray();
        else
            return $this->db->table('boards')
                ->select('*')
                ->orderBy('board', 'ASC')
                ->get()
                ->getResultArray();


    }

    public function createBoard()
    {
        if (!empty($_POST['board'])) {


            $this->boards = $this->db->table('boards');
            $this->boards->insert(array('board' => $_POST['board']));

            return redirect()->to(base_url('boards/'));
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
        $this->boards = $this->db->table('boards');
        $this->boards->where('boards.id', $_POST['id']);
        $this->boards->delete();
    }

}

