<?php

namespace App\Controllers;

class AuthController extends BaseController {
    public function index(): string {
        $entete['titre'] = "Privée";
        parent::initPage($entete);
        return view('pages/v_authentifiee');
    }

}
