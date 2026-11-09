<?php

namespace App\Models;

use CodeIgniter\Model;

class LangueModel extends Model {
    protected $table = 'langue';

    public function getListeLangue(){
        $db = \Config\Database::connect();
        return $db->table($this->table)
                ->select('id_langue, libelle_langue')
                ->distinct()
                ->get()
                ->getResult();
    }
}