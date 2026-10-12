<?php

namespace App\Controllers\entrainement\ajax;

use CodeIgniter\Controller;


class AjaxUtilisateurController extends Controller{
    public function utilisateurPrivilege(){
        $m_utilisateur = model('App\Models\UtilisateurModel');
        $privilege = $this->request->getVar('privilege');
        $data = $m_utilisateur->getUtilisateurPrivilege($privilege);
        echo json_encode($data);
    }
}