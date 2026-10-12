<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'AccueilController::index');
$routes->get('connexion','AccueilController::login');
$routes->post('connexion', '\App\Controllers\ConnexionController::index');
$routes->get('deconnexion','AccueilController::logout');
$routes->get('public','PubliqueController::index');

$routes->get('prive','AuthController::index',['filter' => 'auth']);

$routes->get('liste_utilisateur', 'entrainement\UtilisateurController::consultationUtilisateur',['filter' => 'auth']);

$routes->post('listeUtilisateursPrivilege','entrainement\ajax\AjaxUtilisateurController::utilisateurPrivilege',['filter'=>'auth']);