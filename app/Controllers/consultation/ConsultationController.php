<?php

namespace App\Controllers\consultation;
use App\Controllers\BaseController;

class ConsultationController extends BaseController{

    public function rechercheClient(): string{
        $m_pays = model('App\Models\consultation\ConsultationModelPays');
        $m_departement = model('App\Models\consultation\ConsultationModelDepartement');
        
        $entete['titre'] = 'Recherche Client';
        parent::initPage($entete);
        $data['LesPays'] = $m_pays->getTousLesPays();
        $data['LesDepartement'] = $m_departement->getTousLesDepartement();
        return view('pages/consultation/v_recherche_client', $data);
    }
}