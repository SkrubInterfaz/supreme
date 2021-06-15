<?php require_once('theme/'. $_Serveur_['General']['theme'].'/assets/php/alerts.php'); ?>
<!-- Header -->
<header class="navbar navbar-default navbar-static-top" <?php
    if(isset($_GET['page']) AND $_GET['page'] == "forum" OR $_GET['page'] == "forum_categorie"){
        if($_PGrades_['PermsForum']['general']['addForum'] == true OR $_PGrades_['PermsForum']['general']['addCategorie'] == true OR $_Joueur_['rang'] == 1){
            echo 'style="z-index: 1050"';
        }
    } ?>>
    <div class="container">
        <div class="navbar-header">
            <a href="accueil" class="navbar-brand wow fadeInDown" wow-data-delay="0.1s"
                style="font-family:Montserrat;padding-top:25px;">
                <?php echo $_Serveur_['General']['name']; ?>
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i
                    class="fa fa-bars"></i></button>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php
                    for($i = 0; $i < count($_Menu_); $i++) {
                        if(isset($_Menu_[$i]['list'])) { ?>

                <li class="dropdown">
                    <a href="#<?php echo $_Menu_[$i]['name']; ?>" class="dropdown-toggle" data-toggle="dropdown">
                        <?php echo $_Menu_[$i]['name']; ?>
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php foreach($_Menu_[$i]['list'] as $m) { ?>
                        <li><a href="<?= $m['url'] ?>" class="dropdown-item"><?= $m['name'] ?></a></li>
                        <?php }?>
                    </ul>
                </li>



                <?php } else {
                           $quellePage = str_replace('index.php?page=', '', $_Menu_[$i]['url']);
                           $quellePage1 = str_replace('?page=', '',  $_Menu_[$i]['url']);
                           $quellePage2 = str_replace('?&page=', '',  $_Menu_[$i]['url']);

                           $url = $_Menu_[$i]['url'];
                           
                           if (isset($_GET['page']) and ($quellePage == $_GET['page'] or $quellePage1 == $_GET['page'] or $quellePage2 == $_GET['page'])) {
                               $active = ' active';
                           } elseif (!isset($_GET['page']) and $i == 0) {
                               $active = ' active';
                           } else {
                               $active = '';
                           } ?>

                <li class="nav-item<?= $active ?>">
                    <a href="<?= $url ?>"><?= $_Menu_[$i]['name'] ?></a>
                </li>
                <?php }
                    } ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if ($banned == false) : ?>
                <?php if (Permission::getInstance()->verifPerm("connect")) : //Si nous avons un joueur connecté
                        $Img = new ImgProfil($_Joueur_['id']); ?>
                <li class="nav-item dropdown ml-auto">

                    <a id="profil-<?= $_Joueur_['pseudo']; ?>" class="nav-link dropdown-toggle btn btn-main" href="#"
                        id="dropdown-tools" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img alt="profil de <?= $_Joueur_['pseudo']; ?>"
                            src="<?= $_ImgProfil_->getUrlHeadByPseudo($_Joueur_['pseudo'], 24); ?>"
                            style="margin-left: -10px; width: 24px; height: 24px"> <strong>
                            <?= $_Joueur_['pseudo']; ?>
                        </strong>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="profil-<?= $_Joueur_['pseudo']; ?>">

                        <?php if (Permission::getInstance()->verifPerm('PermsPanel', 'access')) : ?>
                        <!-- Administration -->
                        <li>
                            <a href="admin.php" class="dropdown-item"><i class="fas fa-tachometer-alt"></i>
                                Administration</a>
                        </li>
                        <?php endif; ?>

                        <li>
                            <a class="dropdown-item" href="index.php?page=profil&profil=<?= $_Joueur_['pseudo']; ?>"><i
                                    class="fas fa-user"></i> Mon profil</a>
                        </li>

                        <?php if (Permission::getInstance()->verifPerm('PermsForum', 'moderation', 'seeSignalement')) :
                                    $req_report = $bddConnection->query('SELECT id FROM cmw_forum_report WHERE vu = 0');
                                    $signalement = $req_report->rowCount(); ?>
                        <!-- Signalements -->
                        <li>
                            <a href="index.php?page=signalement" class="dropdown-item"><i
                                    class="fa fa-bell"></i> Signalement <span class="badge badge-pill badge-warning"
                                    id="signalement"><?= $signalement ?></span></a>
                        </li>
                        <?php endif; ?>
                        <li>
                        <a class="dropdown-item" href="index.php?page=alert"><i class="fa fa-bell"></i> Alertes :
                            <span class="badge badge-pill badge-primary" id="alerts"><?= $alerte; ?></span></a>
                        </li>
                        <li>
                        <a class="dropdown-item" href="index.php?page=token"></i> Mon solde :
                            <?php if (isset($_Joueur_['tokens'])) echo $_Joueur_['tokens']; ?> <i
                                class="fas fa-gem"></i></a>
                        </li>
                        <li>
                        <a class="dropdown-item" href="index.php?action=deco" style="color: darkred !important;"><i
                                class="fas fa-sign-out-alt"></i> Se déconnecter</a></li>

                    </ul>
                </li>

                <?php else : //Si nous avons un invité 
                    ?>
                <li class="nav-item dropdown ml-auto">
                    <a class="nav-link dropdown-toggle btn btn-main" href="#" id="navbarDropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> Mon Compte
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                        <a class="dropdown-item" href="#" data-toggle="modal"
                            data-target="#ConnectionSlide"><i class="fas fa-sign-in-alt"></i> Connexion</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" data-toggle="modal"
                            data-target="#InscriptionSlide"><i class="fa fa-user-plus"></i> Inscription</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php endif;?>
            </ul>
        </div>
    </div>
</header>