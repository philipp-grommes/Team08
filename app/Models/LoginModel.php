<?php

namespace App\Models;

use CodeIgniter\Model;


class LoginModel extends Model
{
    public function login($email) {
            return $this->db->table('personen')
                ->select('email, passwort, vorname, name') // Felder als ein String
                ->where('email', $email)
                ->get()->getRowArray();
        }
    }



