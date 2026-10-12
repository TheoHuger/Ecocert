<div class="container">
    <h1><?= esc($h1) ?></h1>
    <?php
    $attributes = ["id" => "userform", "name" => "userform"];

    echo form_open('connexion', $attributes);
    ?>
    <div class="mb-3 col-md-3">
        <?php
        $att_label = [
            'class' => 'form-label'
        ];
        echo form_label('Identifiant', 'login', $att_label);
        $data_login = [
            'class' => 'form-control',
            'name' => 'login',
            'id' => 'login',
            'type' => 'text',
            'placeholder' => 'login',
            'value' => set_value('login')
        ];
        echo form_input($data_login);
        ?>
    </div>
    <div class="mb-3 col-md-3">
        <?php
        echo form_label('Mot de passe', 'mdp', $att_label);
        $data_mdp = [
            'class' => 'form-control',
            'name' => 'mdp',
            'id' => 'mdp',
            'placeholder' => 'mot de passe',
            'value' => set_value('mdp')
        ];
        echo form_password($data_mdp);
        ?>
    </div>
    <div class="col-md-3 d-flex justify-content-end">
        <?php
        $att_btn = [
            'class' => 'btn-primary'
        ];
        echo form_submit('btn_Valider', 'Se connecter', $att_btn);
        ?>
    </div>
    <?php if (!empty($errors)) { ?>
        <div class="mt-3 col-md-5">
            <div class="alert alert-danger" role ="alert">
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?= esc($error) ?></li>
                    <?php } ?>
                </ul>

            </div>
        </div>


        <?php
        echo form_close();
        ?>
    <?php
    }
    ?>
</div>
</body>
</html>