<style>
    .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }

    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 10px;
    }

    .form-signin .checkbox {
        font-weight: normal;
    }

    .form-signin .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .form-signin .form-control:focus {
        z-index: 2;
    }

    .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .account-wall {
        margin-top: 20px;
        padding: 40px 0px 20px 0px;
        background-color: #f7f7f7;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    }

    .login-title {
        color: #555;
        font-size: 18px;
        font-weight: 400;
        display: block;
    }

    .profile-img {
        width: 128px;
        height: 128px;
        margin: 0 auto 10px;
        display: block;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 20%;
    }

    .need-help {
        margin-top: 10px;
    }

    .new-account {
        display: block;
        margin-top: 10px;
    }
</style>

<!-- Connexion -->
<div class="modal fade" id="ConnectionSlide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Connexion</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php if(isset($_COOKIE['form-pseudo'])){?>
                    <img class="profile-img" src="https://cravatar.eu/avatar/<?=$_COOKIE['form-pseudo'];?>/64.png"
                        alt="/<?php echo $_COOKIE['form-pseudo']; ?>.png">
                    <?php }else{ ?>
                    <img class="profile-img" src="https://cravatar.eu/avatar/Steve/128.png" alt="Steve">
                    <?php } ?>
                    <form class="form-signin" role="form" method="post" action="?&action=connection">
                        <div class="form-row">
                            <div class="col-md-12">
                                <input type="text" name="pseudo" class="form-control" id="PseudoConectionForm"
                                    placeholder="Votre pseudo" required autofocus>
                            </div>
                            <div class="col-md-12">

                                <div class="input-group">
                                    <input type="password" name="mdp" class="form-control" id="MdpConnectionForm"
                                        placeholder="Votre mot de passe" aria-describedby="seepassword" required>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn w-100 h-100">
                                            <span toggle="#MdpConnectionForm"
                                                class="fa fa-fw fa-eye field-icon toggle-password input-group-addon"
                                                id="seepassword"></span>
                                        </button>
                                    </span>
                                </div>

                            </div>


                        </div>

                        <input class="form-check-input mt-3" name="reconnexion" type="checkbox"> Reconnexion automatique
                        <button class="btn btn-lg btn-primary btn-block mt-2" type="submit"> Connexion</button>
                    </form>
                    <center><a data-target="#passRecover" data-toggle="modal">J'ai oublié mon mot de passe</a></center>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Mot de passe oublié -->

<div class="modal fade" id="passRecover" style="background-color: rgba(0,0,0,0.8) !important;" tabindex="-1"
    role="dialog" aria-labelledby="passRecover" aria-hidden="true" style="padding-right: 16px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" action="?action=passRecover">
                <div class="modal-header">
                    <h4 class="modal-title">Mot de passe oublié</h4>
                </div>

                <div class="modal-body form-signin row pt-3">

                    <label for="EmailRecoverForm" class="text-center">Adresse email du compte :</label>
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="fas fa-envelope-open"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="email" id="EmailRecoverForm" required
                                autocomplete="" placeholder="Votre adresse email" aria-describedby="basic-addon1">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-100"
                                style="padding: 2rem; margin-top: 20px">Récupéré mon compte</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<section class="inscription-pop">
    <div class="modal fade" id="InscriptionSlide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Inscription</h4>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="?&action=inscription">
                        <?php if($apiMail == 1) { ?>
                        <center>
                            <p>
                                <div class="alert alert-warning" style="text-align: center;">
                                    Nous vous enverons un e-mail pour activé votre compte
                                </div>
                            </p>
                        </center>
                        <?php } ?>
                        <div class="form-group">
                            <label for="PseudoInscriptionForm">Pseudo</label>
                            <input type="text" name="pseudo" class="form-control" id="PseudoInscriptionForm"
                                placeholder="Votre pseudo exact In-Game" required>
                        </div>
                        <div class="form-group">
                            <label for="EmailInscriptionForm">Email</label>
                            <input type="email" name="email" class="form-control" id="EmailInscriptionForm"
                                placeholder="Merci d'entrer une adresse email valide" required>
                        </div>
                        <div class="form-group input-group">

                            <label for="MdpInscriptionForm">Mot de passe</label>
                            <input type="password" name="mdp" class="form-control" onKeyUp="securPass();"
                                id="MdpInscriptionForm" placeholder="Votre mot de passe" required>
                            <span class="input-group-btn">
                                <button type="button" class="btn w-100" style="margin-top: 22px !important">
                                    <span toggle="#MdpInscriptionForm"
                                        class="fa fa-fw fa-eye field-icon toggle-password input-group-addon"
                                        id="seepassword"></span>
                                </button>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="MdpConfirmInscriptionForm">Confirmation du Mot de passe</label>
                            <input type="password" name="mdpConfirm" class="form-control" onKeyUp="securPass();"
                                id="MdpConfirmInscriptionForm" placeholder="Confirmez-le" required>
                        </div>
                        <div class="form-group row d-none" id="progress">
                            <!-- <div class="col-md-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            id="progressbar" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div> -->
                            <div class="col-md-12">
                                <div class="text-right">
                                    <span id="correspondance">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row col-md-5">
                            <label for="ageForm" class="form-label">Âge (facultatif)</label>
                            <input type="number" name="age" id="ageForm" class="form-control" value="0" min="0"
                                max="122">

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="souvenir" checked> S'inscrire à la newsletter
                                </label>
                                <br />
                                <label class="form-check-label">
                                    <input type="checkbox" name="show_email" value="true"> Rendre votre adresse email
                                    publique
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Captcha:</label>
                                <input type='text' name='CAPTCHA' placeholder='captcha' class="form-control" required />
                            </div>
                            <div class="col-md-6">
                                <img id='captcha' src='include/purecaptcha/purecaptcha_img.php?t=login_form' />
                                <br />
                                <br />
                                <br />
                                <button type='button'
                                    onclick='var t=document.getElementById("captcha"); t.src=t.src+"&amp;"+Math.random();'
                                    class="btn btn-success btn-block"><span
                                        class="glyphicon glyphicon-refresh spin"></span> Recharger le captcha</button>
                                <br />
                            </div>
                        </div>
                        </br>
                        <button type="submit" class="btn btn-success btn-block" id="InscriptionBtn"
                            disabled><strong>S'inscrire !</strong></button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</section>


<!-- Système de news -->

<?php if (!isset($_GET['page'])) :
    if (isset($news) && count($news) > 0) :
        for ($i = 0; $i < 10; $i++) :
            if ($i < count($news)) :
?>

<!-- Espace commentaire -->

<div class="modal fade" id="news<?= $news[$i]['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="news<?= $news[$i]['id']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg h-100">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Commentaires</h5>
            </div>

            <div class="modal-body">
                <div class="modal-body">
                    <br>


                    <?php
                                $getNewsCommentaires = $accueilNews->newsCommentaires($news[$i]['id']);
                                while ($newsComments = $getNewsCommentaires->fetch(PDO::FETCH_ASSOC)) :
                                    if (Permission::getInstance()->verifPerm("connect")) :

                                        $getCheckReport = $accueilNews->checkReport($_Joueur_['pseudo'], $newsComments['pseudo'], $news[$i]['id'], $newsComments['id']);
                                        $checkReport = $getCheckReport->rowCount();

                                        $getCountReportsVictimes = $accueilNews->countReportsVictimes($newsComments['pseudo'], $news[$i]['id'], $newsComments['id']);
                                        $countReportsVictimes = $getCountReportsVictimes->rowCount();
                                    endif; ?>


                    <!-- Commentaires News -->
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Commentaire par <?= $newsComments['pseudo'] ?> | Le:
                                <?= date('d/m', $newsComments['date_post']) ?> à
                                <?= date('H:i', $newsComments['date_post']); ?>
                            </div>
                            <div class="panel-body">
                                <div class="well">
                                    <?=$newsComments['commentaire'];?>

                                </div>

                            </div>
                            <div class="panel-footer">
                                <?php if (Permission::getInstance()->verifPerm("connect")) : ?>


                                <div class="dropdown mt-3 ml-5" style="display: inline-block !important">
                                    <button class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Actions </button>
                                    <ul class="dropdown-menu">
                                        <?php if ($newsComments['pseudo'] == $_Joueur_['pseudo'] or Permission::getInstance()->verifPerm("createur")) : ?>


                                        <li>
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#news<?= $news[$i]['id'] ?>-<?= $newsComments['id'] ?>-edit"
                                                data-dismiss="modal">
                                                Editer
                                            </a>
                                        </li>
                                        <li>

                                            <a class="dropdown-item text-danger"
                                                href="index.php?action=delete_news_commentaire&id_comm=<?= $newsComments['id'] ?>&id_news=<?= $news[$i]['id'] ?>&auteur=<?= $newsComments['pseudo'] ?>">
                                                Supprimer
                                            </a>
                                        </li>

                                        <?php endif; ?>
                                        <?php if ($newsComments['pseudo'] != $_Joueur_['pseudo']) :
                                            if ($checkReport == "0") : ?>
                                        <li>
                                            <a class="dropdown-item"
                                                href="index.php?action=report_news_commentaire&id_news=<?= $news[$i]['id'] ?>&id_comm=<?= $newsComments['id'] ?>&victime=<?= $newsComments['pseudo'] ?>">
                                                Signaler ce commentaire
                                            </a>
                                        </li>
                                        <?php else : ?>
                                        <li>
                                            <a class="dropdown-item" href="#" disabled>Ce commentaire à déjà était
                                                signalé</a>
                                        </li>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div style="color: red;display: inline-block !important">
                                    <?=
                                ($newsComments['nbrEdit'] >= "1") ? 'Nombre d\'édition: ' . $newsComments['nbrEdit'] . ' <br> ' : '' ?>
                                    <?= ($countReportsVictimes != "0") ? $countReportsVictimes . ' Signalement <br> ' : '' ?>
                                </div>

                                <?php endif; ?>


                            </div>

                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php if (Permission::getInstance()->verifPerm("connect")) : ?>
                    <div class="modal-footer">
                        <form action="?action=post_news_commentaire&id_news=<?php echo $news[$i]['id']; ?>"
                            method="post">
                            <h5>
                                Commenter
                            </h5>
                            <textarea name="commentaire" class="form-control w-100 mb-3" required></textarea>
                            <small>
                                <span class="float-left"><b>Min : </b> 6 charactères. </span>
                                <span class="float-right"><b>Max : </b> 255 charactères.</span>
                            </small>
                            <button type="submit" class="btn btn-primary w-100 mt-3">Envoyé</button>
                        </form>
                    </div>
                    <?php else: ?>
                    <div class="modal-footer">
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Edition d'un commentaire -->

<?php unset($Img);
                if (Permission::getInstance()->verifPerm("connect")) :
                    $getNewsCommentaires = $accueilNews->newsCommentaires($news[$i]['id']);

                    while ($newsComments = $getNewsCommentaires->fetch(PDO::FETCH_ASSOC)) :
                        $reqEditCommentaire = $accueilNews->editCommentaire($newsComments['pseudo'], $news[$i]['id'], $newsComments['id']);
                        $getEditCommentaire = $reqEditCommentaire->fetch(PDO::FETCH_ASSOC);
                        $editCommentaire = $getEditCommentaire['commentaire'];
                        if ($newsComments['pseudo'] == $_Joueur_['pseudo'] or Permission::getInstance()->verifPerm("createur")) :  ?>
<div class="modal fade" id="news<?= $news[$i]['id'] . '-' . $newsComments['id'] . '-edit'; ?>" tabindex="-1"
    role="dialog" aria-labelledby="news<?= $news[$i]['id'] . '-' . $newsComments['id'] . '-edit'; ?>"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Édition du commentaire</h5>
            </div>

            <form
                action="?action=edit_news_commentaire&id_news=<?= $news[$i]['id'] . '&auteur=' . $newsComments['pseudo'] . '&id_comm=' . $newsComments['id']; ?>"
                method="post">
                <div class="modal-body">
                    <h6>Commentaire de base :</h6>
                    <textarea name="old_commentaire" id="old_commentaire" rows="3" style="resize: none;"
                        class="form-control disabled mb-5" disabled><?= $editCommentaire; ?></textarea>

                    <h6>Édition de votre commentaire :</h6>
                    <textarea name="edit_commentaire" class="form-control" rows="3" style="resize: none;"
                        maxlength="255" required><?= $editCommentaire; ?></textarea>
                </div>
                <div class="modal-footer text-center">
                    <small class="w-100">
                        <span class="float-left"><b>Min : </b> 6 charactères. </span>
                        <span class="float-right"><b>Max : </b> 255 caractères.</span>
                    </small>
                    <button type="submit" class="btn btn-primary w-100 btn-block">Valider la
                        modification</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

<?php endif; ?>
<?php endfor; ?>
<?php endif; ?>
<?php endif; ?>

<?php if(isset($_GET['page']) && $_GET['page'] == "forum" && Permission::getInstance()->verifPerm('PermsForum', 'general', 'deleteCategorie') && !$_SESSION['mode']) : ?>
<div class="modal fade" id="editForum" tabindex="-1" role="dialog" aria-labelledby="editForum" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-signin" role="form" method="post" action="?action=editForum">
                <div class="modal-header">
                    <h5 class="modal-title">Édition du forum "<span id="editForumTitle"></span>"
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: var(--base-color);">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" value="" id="editForumId" />
                    <div class="form-row my-2">
                        <label for="nomForum">Nom du Forum <span class="star-required"></span></label>
                        <input type="text" name="nom" id="editForumName" maxlength="40"
                            class="form-control custom-text-input" required />
                    </div>

                    <div class="form-row my-2">
                        <label for="img">Icône</label>
                        <input type="text" name="img" id="editForumImg" maxlength="300"
                            placeholder='<i class="far fa-comment-dots"></i>' class="form-control custom-text-input" />
                        <small id="imgHelp" class="form-text text-muted">
                            disponible sur : <a href="https://fontawesome.com/icons/"
                                target="_blank">https://fontawesome.com/icons/</a>
                        </small>
                    </div>
                    <div class="form-row my-2">
                        <label for="forumCat">Catégorie <span class="star-required"></span></label>
                        <select name="forum" id="forumCat" class="form-control custom-text-input" required>
                            <?php for ($z = 0, $zMax = count($fofo); $z < $zMax; $z++) : ?>
                            <option id="editForumCat<?= $fofo[$z]['id']; ?>" value="<?= $fofo[$z]['id']; ?>">
                                <?= $fofo[$z]['nom']; ?>
                            </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-main w-100">Valider les
                        changements</button>
                </div>

            </form>

        </div>
    </div>
</div>
<?php endif ?>
<?php if(isset($_GET['page']) && ($_GET['page'] == "forum_categorie" | $_GET['page'] == "sous_forum_categorie")) : ?>
<div class="modal fade" id="editSForum" tabindex="-1" role="dialog" aria-labelledby="editSForum" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-signin" role="form" method="post" action="?action=editSousForum">
                <div class="modal-header">
                    <h5 class="modal-title">Édition du sous-forum "<span id="editForumTitle"></span>"</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: var(--base-color);">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" value="" id="editForumId" />
                    <input type="hidden" name="idSF" value="" id="editForumSFId" />
                    <input type="hidden" name="index" value="" id="editForumIndex" />
                    <div class="form-row my-2">
                        <label for="editForumName">Nom du sous-Forum <span class="star-required"></span></label>
                        <input type="text" name="nom" id="editForumName" maxlength="40"
                            class="form-control custom-text-input" required />
                    </div>

                    <div class="form-row my-2">
                        <label for="editForumImg">Icône</label>
                        <input type="text" name="img" id="editForumImg" maxlength="300"
                            placeholder='<i class="far fa-comment-dots"></i>' class="form-control custom-text-input" />
                        <small id="imgHelp" class="form-text text-muted">
                            disponible sur : <a href="https://fontawesome.com/icons/"
                                target="_blank">https://fontawesome.com/icons/</a>
                        </small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-main w-100">Valider les
                        changements</button>
                </div>

            </form>

        </div>
    </div>
</div>
<?php endif; ?>