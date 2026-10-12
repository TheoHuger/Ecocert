<?php

namespace App\Controllers;

class AccueilController extends BaseController {
    public function index(): string {
        $entete['titre'] = "Accueil";
        parent::initPage($entete);
        
        return view('pages/v_accueil');
    }
    public function login(): string {
        $entete['titre'] = "Connexion";
        parent::initPage($entete);
        $data['h1'] = "Connexion Espace Utilisateur";
        return view('pages/v_connexion',$data);
    }
    
    public function logout(){
        session()->destroy();
        return redirect()->route('/');
    }
}
