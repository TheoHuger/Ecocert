<?php

namespace App\Controllers;

class ConnexionController extends BaseController {

    public function index() {
        $data['h1'] = "Connexion Espace Utilisateur";

        $validation = \Config\Services::validation();

        $validation->setRuleGroup('reglesConnexion');

        if ($validation->withRequest($this->request)->run()) {
            $login = $this->request->getVar('login');
            $mdp = $this->request->getVar('mdp');
            $m_utilisateur = model('App\Models\UtilisateurModel');
            $result = $m_utilisateur->getUtilisateur($login, $mdp);

            if ($result) {
                $connexiondate = [
                    'username' => $result[0]->nomUtilisateur,
                    'prenom' => $result[0]->prenomUtilisateur,
                    'isLoggedIn' => true,
                ];
                session()->set($connexiondate);
                return redirect()->route('/');
            } else {
                $entete['titre'] = "Erreur connexion";
                parent::initPage($entete);

                $data['errors'] = ["Login ou mot de passe incorrect, modifiez vos informations de connexion"];
                return view('pages/v_connexion', $data);
            }
        }else{
            $entete['titre'] = "infos de connexion non validées";
            parent::initPage($entete);
            $data['errors'] = $validation->getErrors();
            return view('pages/v_connexion',$data);
        }
    }
}
