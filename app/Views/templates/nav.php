<body>
    <nav class="navbar navbar-expand-lg bg-light-subtle">
        <div class="container">
            <?php
            $imageProperties = [
                'src' => img_url('ecocert.png'),
                'alt' => 'image logo bts sio',
                'class' => 'img-thumbnail',
                'width' => '87',
                'height' => '37',
                'title' => 'logo BTS SIO'
            ];
            ?>
            <a class="navbar-brand" href="<?= site_url('/'); ?>"> <?= img($imageProperties); ?> </a>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu-sio">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu-sio">

                <?php
                if (!session()->get('isLoggedIn')) {
                    ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('connexion'); ?>">
                                <span class="bi-person-fill">Se connecter</span>
                            </a>
                        </li>
                    </ul>
                    <?php
                } else {
                    ?>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('prive'); ?>">
                                <span>privée</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('liste_utilisateur'); ?>">
                                <span>liste</span>
                            </a>
                            
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="navbar-text">
                            <?= session()->get('prenom') . ' ' . session()->get('username') ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('deconnexion'); ?>">
                                <span class="bi-person-fill">Se déconnecter</span>
                            </a>
                        </li>
                    </ul>
                    <?php
                }
                ?>
            </div>
        </div>
    </nav>