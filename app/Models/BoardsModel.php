<?php namespace App\Models;

use CodeIgniter\Model;

class BoardsModel extends Model{

// Funktion um alle oder ein spezifisches Board zu bekommen
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

// Funktion um neue Boards anzulegen. Standardmäßig werden drei Spalten angelegt
    public function createBoard() {

        if (!empty($_POST['board'])) {

            $this->boards = $this->db->table('boards');
            $this->boards->insert(array('board' => $_POST['board']));

            $boardID = $this->db->insertID();

            $standard = [
                [
                    'spalte' => 'Zu Erledigen',
                    'boardsid' => $boardID,
                    'sortid' => 1,
                    'spaltenbeschreibung' => 'Aufgaben, die noch zu erledigen sind.'
                ],
                [
                    'spalte' => 'In Bearbeitung',
                    'boardsid' => $boardID,
                    'sortid' => 2,
                    'spaltenbeschreibung' => 'Aufgaben, die aktuell in Bearbeitung sind.'
                ],
                [
                    'spalte' => 'In Prüfung',
                    'boardsid' => $boardID,
                    'sortid' => 3,
                    'spaltenbeschreibung' => 'Aufgaben, die noch geprüft werden müssen, bevor sie erledigt sind.'
                ]
            ];

            $this->db->table('spalten')->insertBatch($standard);

            return $boardID;
        }
        return NULL;
    }

//Funktion um den Boardsnamen zu ändern
    public function updateBoard(): void{

        $this->boards = $this->db->table('boards');
        $this->boards->where('boards.id', $_POST['id']);
        $this->boards->update(array('board' => $_POST['board']));
    }

//Funktion um ein Board zu löschen
    public function deleteBoard(): void
    {
        $this->db->table('boards')
            ->where('id', $_POST['id'])
            ->delete();
    }

}

