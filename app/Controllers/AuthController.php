<?php

namespace App\Controllers;

class AuthController extends BaseController {
    public function index(): string {
        $entete['titre'] = "Recherche Client";
        parent::initPage($entete);
        return view('pages/consultation/v_recherche_client');
    }

}
