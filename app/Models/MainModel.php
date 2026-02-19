<?php

namespace App\Models;

use CodeIgniter\Model;

class MainModel extends Model{

//Funktion um EMail und Passwort für den Main zu bekommen
    public function login($email) {

            return $this->db->table('personen')
                ->select('email, passwort')
                ->where('email', $email)
                ->get()->getRowArray();
        }
    }



