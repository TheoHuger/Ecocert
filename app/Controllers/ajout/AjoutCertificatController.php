<?php

namespace App\Controllers\ajout;

use App\Controllers\BaseController;

class AjoutCertificatController extends BaseController {
    private const ID_CLIENT_TEST = 1;
    public function ajoutCertificat(): string {
        $m_prestation = model('App\Models\PrestationModel');
        $m_langue = model('App\Models\LangueModel');

        $entete['titre'] = "Ajout Certificat";
        parent::initPage($entete);
        $data['lesPrestations'] = $m_prestation->getListePrestation();
        $data['lesLangues'] = $m_langue->getListeLangue();
        return view('pages/ajout/v_ajout_certificat', $data);
    }

    public function enregistrerCertificat() {
        $fichier = $this->request->getFile('document_pdf');
        if (!$fichier || !$fichier->isValid() || strtolower($fichier->getClientExtension()) !== 'pdf') {
            return redirect()->back()->with('erreur', 'Fichier PDF invalide');
        }
        $post = $this->request;
        $id = model('App\Models\CertificatModel')->insert([
            'id_prestation' => $post->getPost('prestation'),
            'id_langue' => $post->getPost('langue'),
            'id_client' => self::ID_CLIENT_TEST,
            'code_certificat' => $post->getPost('code_certificat'),
            'date_obtention' => $post->getPost('date_obtention'),
            'date_controle' => $post->getPost('date_controle') ?: null,
            'date_debut_validite' => $post->getPost('date_debut_validite') ?: null,
            'date_fin_validite' => $post->getPost('date_fin_validite') ?: null,
            'archive' => 0,
            'nom_fichier_pdf' => $fichier->getClientName(),
            'accessible_en_ligne' => $post->getPost('en_ligne') ? 1 : 0,
        ]);
        if ($id) {
            return redirect()->to('ajoutCertificat')->with('succes', 'Certificat enregistré (n° ' . $id . ')');
        }
        return redirect()->back()->with('erreur', 'Échec de l\'enregistrement');
    }
}
