<?php

namespace App\Models\consultation;

use CodeIgniter\Model;
class ConsultationModelClient extends Model {
    protected $table = 'client';

    public function getClient($nom,$pays,$departement,$ville){
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('client.id, client.nom_commercial, ville.nom_ville,ville.code_postal');
                
        $builder->join('ville','ville.id = client.id_ville','left');
        $builder->join('departement','departement.code_departement = ville.code_departement','left');
        $builder->join('pays','pays.id = ville.pays','left');
        
        if (!empty($nom)) {
            $builder->like('client.nom_commercial', $nom);
        }

        if (!empty($pays)) {
            $builder->where('pays.id', $pays); 
        }

        if (!empty($departement)) {
            $builder->where('departement.code_departement', $departement); 
        }

        if (!empty($ville)) {
            $builder->like('ville.nom_ville', $ville);
        }

        return $builder->get()->getResult();
    }
 
}