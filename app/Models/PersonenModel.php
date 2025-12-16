<?php namespace App\Models;

use CodeIgniter\Model;
use function PHPUnit\Framework\isEmpty;

class PersonenModel extends Model {


    public function getPersonen($person_id = NULL) {
        $this->personen = $this->db->table('personen');
        $this->personen->select('*');

        IF ($person_id != NULL)
            $this->personen->where('personen.id', $person_id);

        $this->personen->orderBy('id');
        $result = $this->personen->get();

        if ($person_id != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function createPerson()
    {
        if (!empty($_POST['vorname']) && !empty($_POST['name']) && !empty($_POST['email'])) {
            $this->personen = $this->db->table('personen');
            $this->personen->insert(array('vorname' => $_POST['vorname'],
                'name' => $_POST['name'],
                'email' => $_POST['email']));

            return redirect()->to(base_url('personen/index_edit'));
       }

         return  redirect()->to(base_url('personen/ced_edit/'));

    }

    public function updatePerson(): void
    {

        $this->personen = $this->db->table('personen');
        $this->personen->where('personen.id', $_POST['id']);
        $this->personen->update(array('vorname' => $_POST['vorname'],
            'name' => $_POST['name'],
            'email' => $_POST['email']));
    }

    public function deletePerson(): void
    {
        $this->personen = $this->db->table('personen');
        $this->personen->where('personen.id', $_POST['id']);
        $this->personen->delete();
    }

}


