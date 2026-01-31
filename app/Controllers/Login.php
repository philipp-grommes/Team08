<?php

namespace App\Controllers;
use App\Models\LoginModel;


class Login extends BaseController{

//Konstuktor für das LoginModel
    public function __construct(){
        $this->LoginModel = new LoginModel();
    }

//Index-Methode bei Aufruf der Seite
    public function getIndex(): void{
        echo view('templates/head');
        echo view('templates/navbar_login');
        echo view('pages/login');
        echo view('templates/footer');
    }

//Authentifizierungsmethode
    public function postAuthenticateuser(){
        $validation = \Config\Services::validation();

        if (isset($_POST['btnLogin'])) {
                $passwordView = $_POST['passwort'];
                   $data = $this->LoginModel->login($_POST['email']);
                if ($data && password_verify($passwordView, $data['passwort'])) {
                    session()->set([
                        'isLoggedIn' => true,
                    ]);
                      return redirect()->to(base_url(''));
                }

                else {
                    return redirect()->back()->with('error', 'Nutzername oder Passwort falsch');
                }
        }
        elseif(isset($_POST['btnAutologin'])){
            session()->set([
                'isLoggedIn' => true,
            ]);
            return redirect()->to(base_url(''));
        }

    }

// Sessiondestroy bei Abmeldung aus dem System
    public function getLogout(){
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
