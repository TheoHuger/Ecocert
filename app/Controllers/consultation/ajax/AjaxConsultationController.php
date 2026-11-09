<?php

namespace App\Controllers\consultation\ajax;

use CodeIgniter\Controller;
use App\Models\consultation\ConsultationModelClient;


class AjaxConsultationController extends Controller{
    public function resultatRecherche(){
        $m_client = model('App\Models\consultation\ConsultationModelClient');
        
        $nom = $this->request->getPost('nom');
        $pays = $this->request->getPost('pays');
        $departement = $this->request->getPost('departement');
        $ville = $this->request->getPost('ville');
        
        $resultat = $m_client->getClient($nom, $pays, $departement, $ville);
        return $this->response->setJSON($resultats);    }
}