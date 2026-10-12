<?php

namespace App\Controllers\entrainement;
use App\Controllers\BaseController;

class UtilisateurController extends BaseController{

    public function consultationUtilisateur(): string{
        $m_utilisateur = model('App\Models\UtilisateurModel');
        
        $entete['titre'] = 'Utilisateurs';
        parent::initPage($entete);
        $data['lesPrivileges'] = $m_utilisateur->getListePrivilege();
        return view('pages/entrainement/v_liste_utilisateurs', $data);
    }
}