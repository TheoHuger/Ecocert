<body>
    <div class="container">

        <p class="text-center">Si vous consultez cette page, c'est que bous êtres authentifié !</p>


        <form id="formRecherche">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNomRaison">NOM / RAISON SOCIALE</label>
                    <input type="text" class="form-control" id="inputNomRaison">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPays">Pays *</label>
                    <select id="inputPays" class="form-select" required>
                        
                        <?php foreach ($LesPays as $UnPays){ ?>
                            <option><?= $UnPays->nom_pays ?></option>
                        <?php } ?>
                        
                        
                        
                        <option selected>France</option>
                    </select>
                </div>
                
                <div class="form-group col-md-4">
                    <label for="inputDepartement">Département</label>
                    <select id="inputDepartement" class="form-select">
                        <?php foreach ($LesDepartement as $UnDepartement){ ?>
                            <option><?= $UnDepartement->nom_departement?></option>
                        <?php   }   ?>
                        <option selected>Tous</option>
                        <option hidden>Hors France</option>

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputVille">Ville</label>
                    <div class="d-flex align-items-center">
                        <input type="text" class="form-control flex-grow-1 me-2" id="inputVille">
                        <i class="bi bi-x fs-4" title="Effacer" onclick="document.getElementById('inputVille').value = '';"></i>                
                    </div>
                </div>
            </div>
            <p>* champs obligatoire</p>
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
        
        <div id="resultats" class="mt-4"></div>
        
        
        
<script>
    $(function(){
        $('#inputPays').on('change',function(){
            if($(this).val() === 'France'){
                $('#inputDepartement').prop('disabled',false).val('Tous');
                
            }else{
                $('#inputDepartement').val('Hors France').prop('disabled',true);
            }
        });
         if($('#inputPays').val() === 'France'){
                $('#inputDepartement').prop('disabled',false).val('Tous');
                
        }else{
                $('#inputDepartement').val('Hors France').prop('disabled',true);
        }
    });
    
    
</script>

<script>
    $(function(){
        $('#formRecherche').on('submit',function(event){
        event.preventDefault();
            $.ajax({
                url: "<?= site_url('resultatRechercheClient') ?>",
                method: "POST",
                data: {
                    nom : $('#inputNomRaison').val(),
                    pays : $('#inputPays').val(),
                    departement : $('#inputDepartement').val(),
                    ville : $('#inputVille').val()
                },
                dataType: 'json',
                success: function(data){
                    $('#resultats').empty();
                    if (data.length === 0) {
                        $('#resultats').text("Aucun client trouvé");
                    } else {
                        $.each(data, function(key, value){
                            $('#resultats').append($('<p>').text(value.nom_client + ' - ' + value.ville_client));

                        });
                    }
                },
                error: function(){
                    alert('Les données ne sont pas disponibles ...');
                }
            });
        });
    });
</script>


</body>
</html>
