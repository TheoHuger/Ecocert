<?php

namespace App\Controllers\consultation\ajax;

use CodeIgniter\Controller;
use App\Models\consultation\ConsultationModelClient;


class AjaxConsultationController extends Controller{
    public function resultatRecherche(){
        $m_client = model('App\Models\consultation\ConsultationModelClient');
        
        $nom = $this->request->getVar('nom');
        $pays = $this->request->getVar('pays');
        $departement = $this->request->getVar('departement');
        $ville = $this->request->getVar('ville');
        
        $resultats = $m_client->getClient($nom, $pays, $departement, $ville);
        return $this->response->setJSON($resultats);    }
}