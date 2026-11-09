<?php

use Ecocert\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'AccueilController::index');
$routes->get('connexion','AccueilController::login');
$routes->post('connexion', '\App\Controllers\ConnexionController::index');
$routes->get('deconnexion','AccueilController::logout');
$routes->get('public','PubliqueController::index');

$routes->get('prive','AuthController::index',['filter' => 'auth']);

$routes->get('liste_utilisateur', 'entrainement\UtilisateurController::consultationUtilisateur',['filter' => 'auth']);

$routes->post('listeUtilisateursPrivilege','entrainement\ajax\AjaxUtilisateurController::utilisateurPrivilege',['filter'=>'auth']);

$routes->get('ajoutCertificat','ajout\AjoutCertificatController::ajoutCertificat',['filter' => 'auth']);
$routes->get('liste_prestation', 'ajout\AjoutCertificatController::ajoutCertificat',['filter' => 'auth']);
$routes->get('liste_langue', 'ajout\AjoutCertificatController::ajoutCertificat',['filter' => 'auth']);
$routes->post('ajoutCertificat', 'ajout\AjoutCertificatController::enregistrerCertificat', ['filter' => 'auth']);




$routes->get('recherche_client','consultation\ConsultationController::rechercheClient',['filter' => 'auth']);

$routes->post('resultatRechercheClient','consultation\ajax\AjaxConsultationController::resultatRecherche',['filter'=>'auth']);
