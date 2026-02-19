<?php namespace App\Models;

use CodeIgniter\Model;

class SpaltenModel extends Model{

// DB-Abfrage zum Erhalten einer oder aller Tasks
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

// DB-Insert zum Erstellen einer Spalte
    public function createSpalte(){

        if (!empty($_POST['spalte']) && !empty($_POST['boardsid']) && !empty($_POST['spaltenbeschreibung'])) {

            $this->db->table('spalten')
                ->set('sortid', 'sortid + 1', false)
                ->where('boardsid', $_POST['boardsid'])
                ->where('sortid >=', $_POST['sortid'])
                ->update();

            $this->db->table('spalten')->insert(array(   'spalte' => $_POST['spalte'],
                                            'boardsid' => $_POST['boardsid'],
                                            'sortid' => $_POST['sortid'],
                                            'spaltenbeschreibung' => $_POST['spaltenbeschreibung']));
        }
    }

// DB-Update um Änderungen zu speichern
    public function updateSpalte(): void {
        $id = $_POST['id'];
        $newBoardId = $_POST['boardsid'];
        $newSortId = (int)$_POST['sortid'];

        // Aktuelle Daten vor dem Update holen
        $oldData = $this->db->table('spalten')
            ->where('id', $id)
            ->get()
            ->getRowArray();

        if (!$oldData) return;

        $oldBoardId = $oldData['boardsid'];
        $oldSortId = (int)$oldData['sortid'];

        // Fall 1: Board hat sich geändert
        if ($oldBoardId != $newBoardId) {
            // 1. Lücke im alten Board schließen
            $this->db->table('spalten')
                ->set('sortid', 'sortid - 1', false)
                ->where('boardsid', $oldBoardId)
                ->where('sortid >', $oldSortId)
                ->update();

            // 2. Platz im neuen Board schaffen
            $this->db->table('spalten')
                ->set('sortid', 'sortid + 1', false)
                ->where('boardsid', $newBoardId)
                ->where('sortid >=', $newSortId)
                ->update();
        }
        // Fall 2: Selbes Board, aber Position hat sich geändert
        elseif ($oldSortId != $newSortId) {
            if ($newSortId < $oldSortId) {
                // Nach oben schieben: Alles dazwischen muss +1 nach unten
                $this->db->table('spalten')
                    ->set('sortid', 'sortid + 1', false)
                    ->where('boardsid', $oldBoardId)
                    ->where('sortid >=', $newSortId)
                    ->where('sortid <', $oldSortId)
                    ->update();
            } else {
                // Nach unten schieben: Alles dazwischen muss -1 nach oben
                $this->db->table('spalten')
                    ->set('sortid', 'sortid - 1', false)
                    ->where('boardsid', $oldBoardId)
                    ->where('sortid >', $oldSortId)
                    ->where('sortid <=', $newSortId)
                    ->update();
            }
        }

        // Erst jetzt den eigentlichen Datensatz aktualisieren
        $this->db->table('spalten')
            ->where('id', $id)
            ->update(array(
                'spalte' => $_POST['spalte'],
                'boardsid' => $newBoardId,
                'sortid' => $newSortId,
                'spaltenbeschreibung' => $_POST['spaltenbeschreibung']
            ));
    }

// DB-Delete zum Löschen einer Spalte
    public function deleteSpalte(): void{

        $olddata = $this->db->table('spalten')
            ->where('id', $_POST['id'])
            ->get()
            ->getRowArray();

        if (!$olddata) {
            return;
        }

        $this->db->table('spalten')
            ->where('id', $_POST['id'])
            ->delete();

        $this->db->table('spalten')
            ->set('sortid', 'sortid - 1', false)
            ->where('boardsid', $olddata['boardsid'])
            ->where('sortid >', $olddata['sortid'])
            ->update();

    }
// DB-Abfrage zum Erhalten aller Boards
    public function getBoards(): array{

        return $this->db->table('boards')->select('*')->get()->getResultArray();
    }

// DB-Abfrage zum Erhalten aller SortIDs pro Board
    public function getSortidsByBoard($boardId): array
    {
        $result = $this->db->table('spalten')
            ->select('sortid')
            ->where('boardsid', $boardId)
            ->orderBy('sortid', 'ASC')
            ->get()
            ->getResultArray();

        return array_column($result, 'sortid');
    }
}

