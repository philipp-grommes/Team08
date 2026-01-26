<?php namespace App\Models;

use CodeIgniter\Model;

class SpaltenModel extends Model{

    public function getSpalten($spalten_id = NULL): ?array {
        if ($spalten_id != NULL)
            return $this->db->table('spalten')
                ->select('spalten.*, boards.board')
                ->join('boards', 'boards.id = spalten.boardsid')
                ->where('spalten.id', $spalten_id)
                ->get()
                ->getRowArray();
        else
            return $this->db->table('spalten')
                ->select('spalten.*, boards.board')
                ->join('boards', 'boards.id = spalten.boardsid')
                ->orderBy('boards.board', 'ASC')
                ->get()
                ->getResultArray();
    }
    public function createSpalte()
    {
        if (!empty($_POST['spalte']) && !empty($_POST['boardsid']) && !empty($_POST['spaltenbeschreibung'])) {

            $this->spalten = $this->db->table('spalten');
            $this->spalten->insert(array(   'spalte' => $_POST['spalte'],
                                            'boardsid' => $_POST['boardsid'],
                                            'sortid' => $_POST['sortid'],
                                            'spaltenbeschreibung' => $_POST['spaltenbeschreibung']));
            return redirect()->to(base_url('spalten/'));
        }
        return  redirect()->to(base_url('spalten/edit/'));
    }
    public function updateSpalte(): void
    {
        $this->spalten = $this->db->table('spalten');
        $this->spalten->where('spalten.id', $_POST['id']);
        $this->spalten->update(array(   'spalte' => $_POST['spalte'],
                                        'boardsid' => $_POST['boardsid'],
                                        'sortid' => $_POST['sortid'],
                                        'spaltenbeschreibung' => $_POST['spaltenbeschreibung']));
    }
    public function deleteSpalte(): void
    {
        $this->db->transStart();

        $this->db->table('tasks')
            ->select('id')
            ->where('spaltenid', $_POST['id'])
            ->delete();

        $this->db->table('spalten')
            ->where('id', $_POST['id'])
            ->delete();

        $this->db->transComplete();

    }
    public function getBoards(): array{
        return $this->db->table('boards')->select('*')->get()->getResultArray();
    }
}

