<?php
namespace App\Models;

use CodeIgniter\Model;

class CertificatModel extends Model {
    protected $table = 'certificat';
    protected $primaryKey = 'id_certificat';
    protected $allowedFields = [
        'id_langue', 'id_prestation', 'id_client', 'code_certificat',
        'date_obtention', 'date_controle', 'date_debut_validite',
        'date_fin_validite', 'archive', 'nom_fichier_pdf', 'accessible_en_ligne'
    ];
}