<?php

namespace App\Models;

use CodeIgniter\Model;

class UtilisateurModel extends Model {
    protected $table = 'utilisateur';
    public function getUtilisateur($login,$mdp){
        $db = \Config\Database::connect();
        return $db->table($this->table)
                ->select('nomUtilisateur,prenomUtilisateur')
                ->where('login',$login)
                ->where('mdp', hash('sha512', $mdp))                
                ->get()
                ->getResult();
    }
    
    public function getListePrivilege(){
        $db = \Config\Database::connect();
        return $db->table($this->table)
                ->select('privilege')
                ->distinct()
                ->get()
                ->getResult();
    }
    
    public function getUtilisateurPrivilege($privilege){
        $db = \Config\Database::connect();
        return $db->table($this->table)
                ->select('nomUtilisateur, prenomUtilisateur')
                ->where('privilege',$privilege)
                ->orderBy('nomUtilisateur, prenomUtilisateur')
                ->get()
                ->getResult();
    }

}