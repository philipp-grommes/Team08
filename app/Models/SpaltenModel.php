<?php namespace App\Models;

use CodeIgniter\Model;

class SpaltenModel extends Model{

    public function getSpalten($spalten_id = NULL): array {
        if ($spalten_id != NULL)
            return $this->db->table('spalten')
                ->where('id', $spalten_id)
                ->select('*')
                ->orderBy('spalte', 'ASC')
                ->get()
                ->getRowArray();
        else
            return $this->db->table('spalten')
                ->select('*')
                ->orderBy('spalte', 'ASC')
                ->get()
                ->getResultArray();


    }

    public function createSpalte()
    {
        if (!empty($_POST['spalte']) && !empty($_POST['boardsid']) && !empty($_POST['spaltenbeschreibung'])) {


            $this->spalten = $this->db->table('spalten');
            $this->spalten->insert(array('spalte' => $_POST['spalte'],
                'boardsid' => $_POST['boardsid'],
                'spaltenbezeichnung' => $_POST['spaltenbezeichnung']
                ));

            return redirect()->to(base_url('spalten/'));
        }

        return  redirect()->to(base_url('spalten/edit/'));

    }

    public function updateSpalte(): void
    {
        $this->spalten = $this->db->table('spalten');
        $this->spalten->where('spalten.id', $_POST['id']);
        $this->spalten->update(array('spalte' => $_POST['spalte'],
            'boardsid' => $_POST['boardsid'],
            'spaltenbezeichnung' => $_POST['spaltenbezeichnung']
            ));
    }

    public function deleteTask(): void
    {
        $this->spalten = $this->db->table('spalten');
        $this->spalten->where('spalten.id', $_POST['id']);
        $this->spalten->delete();
    }




}

