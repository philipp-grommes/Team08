<?php

namespace App\Controllers;
use App\Models\MainModel;


class Main extends BaseController{

//Konstuktor für das MainModel
    public function __construct(){
        $this->MainModel = new MainModel();
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
                   $data = $this->MainModel->login($_POST['email']);
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

    public function getImpressum(){
        echo view ('templates/head');
        echo view ('templates/navbar');
        echo view ('pages/impressum');
        echo view ('templates/footer');
    }
}
