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
        $('#listePrivileges').change(function(){
            var leprivilege = $(this).val();
            $.ajax({
                url: "<?= site_url('listeUtilisateursPrivilege') ?>",
                method: "POST",
                data: {privilege: leprivilege},
                dataType: 'json',
                success: function(data){
                    $('#liste').empty();
                    var p = document.createElement("p");
                    if (data.length === 0) {
                        p.appendChild(document.createTextNode("Pas d'utilisateur pour ce privilège"));
                        $('#liste').addClass("fw-bold");
                    } else {
                        $('#liste').removeClass("fw-bold");
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