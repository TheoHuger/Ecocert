<?php

namespace App\Controllers;

class PubliqueController extends BaseController {
    public function index(): string {
        $entete['titre'] = "Publique";
        parent::initPage($entete);
        return view('pages/v_publique');
    }

}
