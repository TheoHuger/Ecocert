<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestationModel extends Model {
    protected $table = 'prestation';

    public function getListePrestation(){
        $db = \Config\Database::connect();
        return $db->table($this->table)
                ->select('id_prestation, libelle_prestation')
                ->distinct()
                ->get()
                ->getResult();
    }
}