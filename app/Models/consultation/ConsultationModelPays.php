<?php

namespace App\Models\consultation;

use CodeIgniter\Model;
class ConsultationModelPays extends Model {
    protected $table = 'pays';

    public function getTousLesPays(){
        $db = \Config\Database::connect();
        return $db->table($this->table)
                ->select('id,nom_pays')
                ->orderBy('nom_pays')
                ->get()
                ->getResult();
    }
 
}