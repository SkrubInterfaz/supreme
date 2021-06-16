<div style="position: -webkit-sticky;position: sticky;top: 0;z-index: 1048" id="configforumnav">

    <div class="alert alert-info" id="configuration" role="config_app">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <?php
                    if($_PGrades_['PermsForum']['general']['addForum'] == true OR $_Joueur_['rang'] == 1 AND !$_SESSION['mode'])
                    {
                        ?>
                    <div class="btn-group">
                        <a class="btn btn-danger btn-sm" id="addforuma" role="button" data-toggle="collapse"
                            href="#nav-add_forum" aria-expanded="false" aria-controls="add_forum">
                            Ajouter une Catégorie
                        </a>
                    </div>
                    <?php
                    }
                    if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsForum']['general']['addForum'] == true){?>
                    <div class="btn-group">
                        <a class="btn btn-danger btn-sm" id="addcata" role="button" data-toggle="collapse"
                            href="#nav-add_cat" aria-expanded="false" aria-controls="add_forum">
                            Ajouter un Forum
                        </a>
                    </div>
                    <?php
                        }
                    ?>


                </div>

                <div class="col-xs-12 col-md-4">
                    <div style="float: right;display: inline-block">
                        <?php if($_PGrades_['PermsForum']['general']['deleteForum'] == true OR $_Joueur_['rang'] == 1){?>
                        <div class="btn-group">
                            <a class="btn btn-outline-info btn-sm" role="button" data-toggle="modal"
                                data-target="#nav-settings">
                                <i class="fas fa-cogs"></i> Paramétres
                            </a>
                        </div>
                        <?php }
                    if($_PGrades_['PermsPanel']['forum']['action']['seeSmileys'] == true OR $_Joueur_['rang'] == 1)
                    { ?>
                        <div class="btn-group">
                            <a class="btn btn-outline-info btn-sm" role="button" data-toggle="modal"
                                data-target="#nav-smileys">
                                <i class="fas fa-smile"></i> Smileys
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
        <?php
        if($_PGrades_['PermsForum']['general']['addForum'] == true OR $_Joueur_['rang'] == 1)
        {
        ?>
        <div class="collapse" id="nav-add_forum" style="position: absolute;z-index: 1049!important" id="nav-add_cat">
            <div class="well panel-body">
                <form action="?action=create_forum" method="post">
                    <div class="row">
                        <div class="col-md-12"><br>
                            <p class="text-center"><label class="control-label" for="nomFo">Nom de la catégorie</label>
                            </p>
                            <input type="text" name="nom" id="nomFo" maxlength="80" class="form-control" require="">
                        </div>
                    </div>
                    <br />
                    <p class="text-right">
                        <button type="submit" class="btn btn-success btn-xs btn-round">Créer une catégorie</button>
                    </p>
                </form>
            </div>
        </div>
        <?php }
        if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsForum']['general']['addForum'] == true){ ?>
        <div class="collapse" style="position: absolute;z-index: 1049!important" id="nav-add_cat">
            <div class="well panel-body">
                <form action="?action=create_cat" method="post">
                    <div class="container-fluid">
                        <div class="from-group row">
                            <label class="col-md-6 col-form-label" for="nomCat">Nom du Forum : </label>
                            <div class="col-md-6">
                                <input type="text" name="nom" id="nomCat" maxlength="40" class="form-control" require />
                            </div>
                        </div>
                        <div class="from-group row">
                            <label class="col-md-6 col-form-label" for="img">Icon disponible sur : <a
                                    href="https://design.google.com/icons/">https://design.google.com/icons/</a></label>
                            <div class="col-md-6">
                                <input type="text" name="img" id="img" maxlength="300" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-6 col-form-label">Catégorie : </label>
                            <div class="col-md-6">
                                <select name="forum" class="form-control">
                                    <?php
                                    for($z = 0; $z < count($fofo); $z++)
                                    {
                                        ?><option value="<?php echo $fofo[$z]['id']; ?>">
                                        <?php echo $fofo[$z]['nom']; ?></option><?php
                                    }
                                    ?></select>
                            </div>
                        </div>
                        <p class="text-right">
                            <button type="submit" class="btn btn-success btn-xs btn-round">Créer un Forum</button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <?php 
        }
        if($_PGrades_['PermsForum']['general']['deleteForum'] == true OR $_Joueur_['rang'] == 1){?>
        <!-- Paramétres -->
        <div class="modal fade" id="nav-settings" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button><br>
                        <a class="btn btn-lg btn-normal btn-block" role="button" data-toggle="collapse"
                                data-target="#modal-widgets">
                            Configuration des widgets
                        </a>
                        <div class="collapse" id="modal-widgets">
                            <div class="panel-body well">
                                <div class="container-fluid">
                                    <?php
                                    if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsPanel']['theme']['actions']['editTheme'] == true)
                                    { ?>
                                    <div class="alert alert-success">
                                        <p>
                                            Ici vous pouvez consulter l'état de vos widgets / addons forum (Rendez-vous sur le Panel Adminsitrateur section Thèmes <b>></b> Configuration de supreme <b>></b> Widgets Forum, pour editer et/ou activer vos widgets <i class="fas fa-exclamation-triangle"></i> )
                                        </p>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fab fa-discord"></i> Discord</span>
                                        <input type="text" class="form-control" value="<?php 
                                                if($_Theme_['All']['forum']['discord']['statut'] == "true"){echo $_Theme_['All']['forum']['discord']['id'];}else{echo 'Widget non activé !';}
                                            ?>" disabled />
                                    </div><br>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php 
                                                if($_Theme_['All']['forum']['twitter']['statut'] == "true"){echo $_Theme_['All']['forum']['twitter']['id'];}else{echo 'Widget non activé !';}
                                            ?>" disabled />
                                        <span class="input-group-addon"><i class="fab fa-twitter"></i> Twitter</span>
                                    </div><br>

                                    <?php }else{echo'<center>Désolé mais vous n\'avez pas accés à cette élément !';} ?>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <a class="btn btn-lg btn-normal btn-block" role="button" data-toggle="collapse"
                                data-target="#modal-forums">
                            Edition des catégories
                        </a>
                        <div class="collapse" id="modal-forums">
                            <div class="panel-body well">

                                <div class="container-fluid">
                                
                                <div class="form-row" style="max-height: 420px;overflow-y: scroll;"> 
                                <?php
                                for($i = 0; $i < count($fofo); $i++)
                                    { 
                                ?>
                                    <div class="from-group col">
                                            <a class="btn btn-lg btn-normal btn-block" style="background-color: #8a0b8a !important;" 
                                            data-toggle="collapse"
                                                    data-target="#catedit-<?php echo ucfirst($fofo[$i]['id']); ?>">
                                                <?php echo ucfirst($fofo[$i]['nom']); ?> <i class="fas fa-pencil-alt"></i>
                                            </a>
                                    </div>
                                        <div class="collapse" id="catedit-<?php echo ucfirst($fofo[$i]['id']); ?>" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 5000">
                                        <div class="well">
                                            <div class="panel">

                                                <div class="panel-header">
                                                    <h3 class="panel-title">
                                                        Edition de  <?=ucfirst($fofo[$i]['nom']);?>
                                                    </h3>
                                                </div>
                                                <div class="panel-content">
                                                    <div class="panel-body">


                                                            <button class="btn btn-normal btn-block w-100"
                                                            type="button" data-toggle="collapse" data-target="#ordre<?=$fofo[$i]['id']; ?>">
                                                                Modifier l'ordre
                                                            </button>
                                                                <div class="collapse" id="ordre<?=$fofo[$i]['id']; ?>">
                                                                    <div class="well">
                                                                        <div class="container-fluid">
                                                                        <a href="?action=ordreForum&ordre=<?=$fofo[$i]['ordre']; ?>&id=<?=$fofo[$i]['id']; ?>&modif=monter" class="btn btn-info btn-block w-100">
                                                                    <i class="fas fa-arrow-up"></i> Monter d'un cran</a>
                                                                <a class="btn btn-info btn-block w-100"
                                                                    href="?action=ordreForum&ordre=<?=$fofo[$i]['ordre']; ?>&id=<?=$fofo[$i]['id']; ?>&modif=descendre"><i
                                                                        class="fas fa-arrow-down"></i> Descendre d'un
                                                                    cran</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <br/>
                                                            <button class="btn btn-normal btn-block w-100"
                                                            type="button" data-toggle="collapse" data-target="#perms<?=$fofo[$i]['id']; ?>">
                                                                Modifier les permissions
                                                            </button>
                                                                <div class="collapse" id="perms<?=$fofo[$i]['id']; ?>">
                                                                    <div class="well">
                                                                        <div class="container-fluid">
                                                                            <form action="?action=modifPermsForum"
                                                                                method="POST">
                                                                                <input type="hidden" name="id"
                                                                                    value="<?=$fofo[$i]['id'];?>" />
                                                                                <input type="number"
                                                                                        name="perms"
                                                                                        value="<?=$fofo[$i]['perms'];?>"
                                                                                        class="form-control">
                                                                                <button type="submit"
                                                                                    class="btn btn-success btn-block w-100 text-center">Modifier</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br/>

                                                            <a class="btn btn-normal btn-block w-100" data-toggle="collapse"
                                                                data-target="#nav_NomForum<?=$fofo[$i]['id'];?>"
                                                                >Modifier le nom</a>
                                                            
                                                            <div class="collapse" id="nav_NomForum<?=$fofo[$i]['id'];?>">
                                                                <div class="well">
                                                                    <div class="container-fluid">
                                                                    <form action="?action=changeNomForum" method="post">
                                                                        <input type="hidden" name="id" id="id" value="<?=$fofo[$i]['id'];?>">
                                                                        <input type="hidden" name="entite" id="entite" value="0">
                                                                        <div class="from-group from-row">
                                                                            <input type="text" class="form-control" name="nom" id="nom" value="<?=$fofo[$i]['nom'];?>" />
                                                                            <button type="submit" class="btn btn-block btn-success w-100">Valider</button>
                                                                        </div>

                                                                    </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br />

                                                            <a href="?action=remove_forum&id=<?php echo $fofo[$i]['id']; ?>"
                                                                class="btn btn-danger "
                                                                style="text-align: left;">Supprimer</a>

                                                        </div>
                                                    </div>
                         
                                                </div>
                                            </div>
                                        </div>
                                    <br/>

                                <?php } ?>
                                </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }
        if($_PGrades_['PermsPanel']['forum']['action']['seeSmileys'] == true OR $_Joueur_['rang'] == 1)
        { ?>
        <!-- Smileys -->
        <div class="modal fade" id="nav-smileys" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="color: #000">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: #000">BB Codes & Smileys</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="panel">
                            <div class="panel-header">
                                <h4 class="panel-title" style="color: #000">
                                    Vos smileys
                                </h4>
                            </div>
                            <div class="panel-content">
                                <div class="panel-body" style="max-height: 240px;overflow-y: scroll">

                                <?php
                                $smileys = getDonnees($bddConnection);
                                for($i = 0; $i < count($smileys['symbole']); $i++)
                                {
                                    echo'
                                    <div class="row">
                                        <div class="well">
                                            <div class="col-md-6 col-xs-12">
                                            <img src="'.$smileys['image'][$i].'">
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                            <code>'.$smileys['symbole'][$i].'</code>
                                            </div>
                                        </div> 
                                    </div>';
                                    }
                                    ?>

                                
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a href="admin.php?page=forum" target="_blank" rel="noopener noreferrer nofollow" class="btn btn-normal btn-block w-100">Editer les smileys</a>                            
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel-header">
                                <h4 class="panel-title">
                                    BBCodes 
                                </h4>
                            </div>
                            <div class="panel-content">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <code>[b]ce texte sera en gras[/b]</code>
                                        </div>
                                        <div class="col-md-6 col-xs-12 well">
                                            <strong>ce texte sera en gras</strong>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <code>[i]ce texte sera en italique[/i]</code>
                                        </div>
                                        <div class="col-md-6 col-xs-12 well">
                                            <em>ce texte sera en italique</em>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <code>[u]ce texte sera en souligné[/u]</code>
                                        </div>
                                        <div class="col-md-6 col-xs-12 well">
                                        <u>ce texte sera en souligné</u>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <code>[s]ce texte sera barré[/s]</code>
                                        </div>
                                        <div class="col-md-6 col-xs-12 well">
                                            <s>ce texte sera barré</s>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger w-100 btn-block" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>


    </div>

</div>