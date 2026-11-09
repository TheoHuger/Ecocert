<?php

namespace App\Models\consultation;

use CodeIgniter\Model;
class ConsultationModelDepartement extends Model {
    protected $table = 'departement';

    public function getTousLesDepartement(){
        $db = \Config\Database::connect();
        return $db->table($this->table)
                ->select('code_departement,nom_departement')
                ->orderBy('nom_departement')
                ->get()
                ->getResult();
    }
 
}