<body>
    <div class="container">

        <div class="container mt-4 mb-5" style="max-width: 700px;">

            <h2 class="mb-4">Enregistrement d'un certificat pour <?= session()->get('prenom') . ' ' . session()->get('username') ?>
</h2>

            <form action="" method="post">

                <div class="mb-3">
                    <label for="prestation" class="form-label">Prestation <span class="text-danger">*</span></label>
                    <select class="form-select" id="prestation" name="prestation" required>
                        <option value="BIO UE" selected>BIO UE</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="code_certificat" class="form-label">Code certificat <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="code_certificat" name="code_certificat" placeholder="Ex: 37/123020/656359" required>
                </div>

                <div class="mb-3">
                    <label for="date_obtention" class="form-label">Date obtention <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="date_obtention" name="date_obtention" required>
                </div>

                <div class="form-text text-muted mb-3">
                    Les dates de contrôle et de validité ne sont pas à saisir pour les certificats NOP
                </div>

                <div class="mb-3">
                    <label for="date_controle" class="form-label">Date de contrôle</label>
                    <input type="date" class="form-control" id="date_controle" name="date_controle">
                </div>

                <div class="mb-3">
                    <label for="date_debut_validite" class="form-label">Date début validité</label>
                    <input type="date" class="form-control" id="date_debut_validite" name="date_debut_validite">
                </div>

                <!-- Date fin validité -->
                <div class="mb-3">
                    <label for="date_fin_validite" class="form-label">Date fin validité</label>
                    <input type="date" class="form-control" id="date_fin_validite" name="date_fin_validite">
                </div>

                <!-- Langue -->
                <div class="mb-3">
                    <label for="langue" class="form-label">Langue <span class="text-danger">*</span></label>
                    <select class="form-select" id="langue" name="langue" required>
                        <option value="Français" selected>Français</option>
                        <option value="Anglais">Anglais</option>
                    </select>
                </div>

                <!-- En ligne? -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="en_ligne" name="en_ligne" value="1">
                    <label class="form-check-label" for="en_ligne">En ligne? <span class="text-danger">*</span></label>
                </div>

                <!-- Sélectionner le document PDF -->
                <div class="mb-4">
                    <label for="document_pdf" class="form-label">Sélectionner le document PDF <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" id="document_pdf" name="document_pdf" accept="application/pdf" required>
                </div>

                <!-- Mention obligatoire -->
                <p class="text-muted small"><span class="text-danger">*</span> Champs obligatoires</p>

                <!-- Bouton Valider -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-4">Valider</button>
                </div>

            </form>
        </div>
</body>
</html>