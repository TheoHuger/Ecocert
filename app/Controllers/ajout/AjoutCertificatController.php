<?php

namespace App\Controllers\ajout;

use App\Controllers\BaseController;


class AjoutCertificatController extends BaseController {
    public function index(): string {
        $entete['titre'] = "Ajout Certificat";
        parent::initPage($entete);
        return view('pages/ajout/v_ajout_certificat');
    }

}