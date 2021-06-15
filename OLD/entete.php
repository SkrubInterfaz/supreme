<header class="navbar navbar-default navbar-static-top" <?php
                        if(isset($_GET['page']) AND $_GET['page'] == "forum" OR $_GET['page'] == "forum_categorie"){
                            if($_PGrades_['PermsForum']['general']['addForum'] == true OR $_PGrades_['PermsForum']['general']['addCategorie'] == true OR $_Joueur_['rang'] == 1){
                                echo 'style="z-index: 1050"';
                            }
                        } ?>>
    <div class="container">
        <div class="navbar-header">
            <a href="index.php" class="navbar-brand wow fadeInDown" wow-data-delay="0.1s" style="font-family:Montserrat;padding-top:25px;">
                <?php echo $_Serveur_['General']['name']; ?>
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php
                // Je rappelle que _Menu_ est une variable utilisable partout. Elle est générée en début d'index. 
                // Cette variable contient le texte des liens de la barre des menus, l'adresse des liens, les liste déroulantes etc...

                // Cette boucle affiche un lien / menu déroulant à chaque tour. On fait autant de tour qu'il y a de textes à afficher.
                for($i = 0; $i < count($_Menu_['MenuTexte']); $i++)
                {
                    // Si il y a une liste déroulante contenant le texte du texte de ce tour de boucle, le lien devient un menu déroulant.
                    if(isset($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]]))
                    {
                        // On affiche la structure de base du menu déroulant de Bootstrap :
                        ?>
                                <li class="dropdown">
                                    <a href="<?php echo $_Menu_['MenuLien'][$i]; ?>" class="dropdown-toggle wow fadeInDown" wow-data-delay="<?php echo $i/10; ?>s" data-toggle="dropdown">
                                        <?php echo $_Menu_['MenuTexte'][$i]; ?><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php

                        // On affiche la puce dans le menu déroulant depuis une boucle, qui fait autant de tour qu'il y a de lignes à afficher dans la liste déroulante.
                        for($k = 0; $k < count($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]]); $k++)
                        {
                            // Dans le cas où le texte de la puce vaut "-divider-", on met une ligne de division à la place du texte (fonctionnalité css de bootstrap). 

                            if($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]][$k] == 'LastLinkDontDelete'){

                            }elseif($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]][$k] == '-divider-')
                            {
                                echo'<li class="divider"></li>';
                            }
                            // Sinon on met un lien avec texte + adresse.
                            else
                            {
                                echo '<li><a href="' .$_Menu_['MenuListeDeroulanteLien'][$_Menu_['MenuTexteBB'][$i]][$k]. '">' .$_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]][$k]. '</a></li>';
                            }
                        }

                        // On ferme la liste du déroulant, et on remonte à la premiere boucle :p.
                        ?>
                                    </ul>
                                </li>
                                <?php
                    }

                    // Si le lien n'est pas un menu déroulant, on l'affiche tout simplement, ou presque, il faut prévoir que si on est sur la page du lien, le lien doit être en foncé (class="active" fonction bootstrap).
                    else
                    {
                        // Cette variable contient la valeur du lien de la puce(on enlève donc ?&page= en le remplaçant par '' et on garde que la fin.
                        $quellePage = str_replace('?&page=', '', $_Menu_['MenuLien'][$i]);

                        // Si le Get actuel est égal à la variable de la ligne précédente, la puce est active.
                        if(isset($_GET['page']) AND $quellePage == $_GET['page']) 
                            $active = 'active';

                        // Si il n'y a pas de get(on est donc sur l'index) et qu'on est au premier tour de boucle --> le premier lien(souvent un lien vers l'accueil justement) est actif (foncé).
                        elseif(!isset($_GET['page']) AND $i == 0) 
                            $active = 'active';

                        // On prévoit que quand il n'y a rien à afficher, la var est vide pour éviter l'erreur.
                        else $active = '';

                        // On affiche enfin la puce ! 
                        echo '<li class=" '.$active.' wow fadeInDown" wow-data-delay=""'. $i/10 .'s""><a href="' .$_Menu_['MenuLien'][$i]. '">' .$_Menu_['MenuTexte'][$i]. '</a></li>';
                    }
                }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_Joueur_)) { 
                    $Img = new ImgProfil($_Joueur_['id']);
                ?>
                <li class="dropdown" style="z-index: 2000 !important;">
                    <a href="#" class="dropdown-toggle" 
                        <?php
                        if(isset($_GET['page']) AND $_GET['page'] == "forum" OR $_GET['page'] == "forum_categorie"){
                            if($_PGrades_['PermsForum']['general']['addForum'] == true OR $_PGrades_['PermsForum']['general']['addCategorie'] == true OR $_Joueur_['rang'] == 1){
                                echo 'id="monprofiladmin"';
                            }
                        } ?>                    
                    data-toggle="dropdown">Mon profil <span id="id_alert"></span> <b class="caret"></b> <img class="icon-player-topbar" src="<?=$Img->getImgToSize(20, $width, $height); ?>" style="height:18px;max-width: 20px!important;"/></a>
                    <?php } else { ?>
                    <li class="dropdown" style="height: 50px;">
                        <a href="#" class="dropdown-toggle wow fadeInDown" data-wow-delay="0.3s" data-toggle="dropdown">Connexion/Inscription <b class="caret"></b></a>
                        <?php } ?>
                        <ul class="dropdown-menu">
                            <div style="width: 400px;padding:10px;">
                                <?php								
                                if(isset($_Joueur_))
                                {
                                    $req_topic = $bddConnection->prepare('SELECT cmw_forum_topic_followed.pseudo, vu, cmw_forum_post.last_answer AS last_answer_pseudo 
                                    FROM cmw_forum_topic_followed
                                    INNER JOIN cmw_forum_post WHERE id_topic = cmw_forum_post.id AND cmw_forum_topic_followed.pseudo = :pseudo');
                                $req_topic->execute(array(
                                    'pseudo' => $_Joueur_['pseudo']
                                ));
                                $alerte = 0;
                                while($td = $req_topic->fetch(PDO::FETCH_ASSOC))
                                {
                                    if($td['pseudo'] != $td['last_answer_pseudo'] AND $td['last_answer_pseudo'] != NULL AND $td['vu'] == 0)
                                    {
                                        $alerte++;
                                    }
                                }
                                $req_answer = $bddConnection->prepare('SELECT vu
                                FROM cmw_forum_like INNER JOIN cmw_forum_answer WHERE id_answer = cmw_forum_answer.id
                                AND cmw_forum_like.pseudo != :pseudo AND cmw_forum_answer.pseudo = :pseudo AND type = 2');
                                $req_answer->execute(array(
                                    'pseudo' => $_Joueur_['pseudo'],
                                ));
                                while($answer_liked = $req_answer->fetch(PDO::FETCH_ASSOC))
                                {
                                    if($answer_liked['vu'] == 0)
                                    {
                                        $alerte++;
                                    }
                                }
                                if($_PGrades_['PermsPanel']['access'] == "on" OR $_Joueur_['rang'] == 1)
                                    echo '<a href="admin.php" class="btn btn-danger btn-block"><i class="fas fa-tachometer-alt"></i> Administration</a>';
                                if($_PGrades_['PermsForum']['moderation']['seeSignalement'] == true OR $_Joueur_['rang'] == 1)
                                {
                                    $req_report = $bddConnection->query('SELECT id FROM cmw_forum_report WHERE vu = 0');
                                    $signalement = $req_report->rowCount();
                                    echo '<a href="?page=signalement" class="btn btn-warning btn-block"><i class="fa fa-bell"></i> Signalement <span class="badge badge-pill badge-warning" id="signalement">' . $signalement . '</span></a>';
                                }
                                    ?>
                                <a href="?page=profil&profil=<?php echo $_Joueur_['pseudo']; ?>" class="btn btn-success btn-block"><img class="icon-player-topbar" src="https://cravatar.eu/avatar/<?php echo $_Joueur_['pseudo']; ?>/20" style="height:18px;"/> <?php echo $_Joueur_['pseudo'] ?></a>
                                <a href="?page=token" class="btn btn-success btn-block"><i class="<?=$_Theme_['All']['Tokens']['icon'];?>"></i> <span class="badge badge-pill badge-primary"><?php echo $_Joueur_['tokens'] . ' '; ?></span></a>
                                <a href="?page=panier" class="btn btn-success btn-block"><i class="fas fa-shopping-basket"></i> Panier: <span class="badge badge-pill badge-primary"><?php echo $_Panier_->compterArticle() ?></span></a>
                                <a href="?page=messagerie" class="btn btn-success btn-block"><i class="fa fa-envelope"></i> Messagerie</a>
                                <a href="?page=alert" class="btn btn-primary btn-block"><i class="fa fa-envelope"></i> Alertes :  <span class="badge badge-pill badge-primary" id="alerts"><?php echo $alerte; ?></span></a>
                                <a href="?action=deco" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-off"></span> Deconnexion</a>
                                <?php } else { ?>
                                <a data-toggle="modal" data-target="#ConnectionSlide" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-user"></span> Connexion</a>
                                <a data-toggle="modal" data-target="#InscriptionSlide" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-plus"></span> Inscription</a>
                            <?php } ?>
                            </div>
                        </ul>
                        </div>
                    </li>
            </ul>
        </div>
    </div>
</header>