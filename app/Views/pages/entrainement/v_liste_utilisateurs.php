<div class="container">
    <div class="mt-3 text-center">
        <h1>Liste des utilisateurs</h1>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <?php
            $att_label = [
                'class' => 'form-label'
            ];
            echo form_label('Privilèges','listePrivileges',$att_label);
            
            $att_select = array(
                'class' => 'form-control',
                'id' => 'listePrivileges',
            );
            
            $options = array();
            $options[""] = "Sélectionner un privilège ...";
            foreach ($lesPrivileges as $privilege){
                $options[$privilege->privilege] = $privilege->privilege;
            }
            
            echo form_dropdown('listePrivileges',$options,'',$att_select);
            ?>
            
        </div>
        <div id="liste" class="border mt-4 col-md-4 offset-md-1"></div>
    </div>
    
</div>
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
                            p.appendChild(document.createTextNode(value.nomUtilisateur + ' ' + value.prenomUtilisateur));
                            p.appendChild(document.createElement('br'));
                        });
                    }
                    $('#liste').append(p);
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