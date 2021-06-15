<?php include('theme/'.$_Serveur_['General']['theme'].'/config/configTheme.php');
?>
<script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/config/jscolor.js"></script>
<div class="col-xs-12 text-center">
    <div class="panel panel-default cmw-panel">
        <div class="panel-heading cmw-panel-header">
            <h3 class="panel-title"><strong>Configurtion de: Supreme 2.4 - Adapté pour CraftMyWebsite par PinglsDzn</strong></h3>
        </div>
        <div class="panel-body">
        
            <form method="POST" action="?&action=configTheme">
 

                <div class="panel panel-default cmw-panel">
                    <a role="button" data-toggle="collapse" href="#refseo" aria-exepanded="false">
                        <div class="panel-heading cmw-panel-header">
                            <h3 class="panel-title">Référencement</h3>
                        </div>
                    </a>
                </div>

                    <div class="collapse" id="refseo">
                        <div class="panel-body">
                            <div class="container-fluid">

                                    <div class="row">
                                        <label class="control-label">Google (Token de Validation)</label>
                                        <input type="text" class="form-control" name="google" value="<?php echo $_Theme_['All']['Seo']['google']; ?>">
                                    </div>
                                    <div class="row">
                                        <label class="control-label">Bing / Yahoo (Token de Validation)</label>
                                        <input type="text" class="form-control" name="bing" value="<?php echo $_Theme_['All']['Seo']['bing']; ?>">
                                    </div>
                                        <br/>
                                        <style>
                                        .open-g-bg{
                                            background-color: #32363C;
                                        }
                                        </style>
                                        <div class="open-g-bg">
                                        <div class="panel-body">
                                            <div class="row">
                                                <input type="text" class="form-control" name="name" value="<?php echo $_Theme_['All']['Seo']['name']; ?>" style="border: none !important;background-color: rgba(255, 255, 255, 0);color: #0993CF;">
                                                <br/>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="description" value="<?php echo $_Theme_['All']['Seo']['description']; ?>" style="border: none !important;background-color: rgba(255, 255, 255, 0);color: #ABADAF;">
                                            </div>
                                            <div class="col-md-4">
                                                <img src="<?php echo $_Theme_['All']['Seo']['image']; ?>" style="max-width: 82px;">
                                                <br/>
                                                <input type="text" class="form-control-file" name="image" value="<?php echo $_Theme_['All']['Seo']['image']; ?>" style="border: none !important;background-color: rgba(255, 255, 255, 0);color: #f4f4f4;">
                                            </div>
                                        </div><br/><br/>
                                        </div>
                                        <input name="color" class="jscolor" value="<?php echo $_Theme_['All']['Seo']['color']; ?>" style="width: 100%">
                                        </div>



                            </div>
                        </div>
                    </div>
                
                    <div class="panel panel-default cmw-panel">
                    <a role="button" data-toggle="collapse" href="#cookiesconsentcol" aria-exepanded="false">
                        <div class="panel-heading cmw-panel-header">
                            <h3 class="panel-title">Notifications utilisation cookies</h3>
                        </div>
                    </a>
                </div>

                    <div class="collapse" id="cookiesconsentcol">
                        <div class="panel-body">
                            <div class="container-fluid">

                                <div class="row">
                                    <label class="control-label">Couleur de fond de la barre:</label>
                                    <input type="text" class="form-control jscolor" name="bgcookies" value="<?php echo $_Theme_['cookies']['bg']; ?>">
                                </div>
                                <div class="row">
                                    <label class="control-label">Couleur de fond du boutton:</label>
                                    <input type="text" class="form-control jscolor" name="boutoncookies" value="<?php echo $_Theme_['cookies']['bouton']; ?>">
                                </div>
                                <div class="row">
                                    <label class="control-label">Message de consentement:</label>
                                    <input type="text" class="form-control" name="messagecookies" value="<?php echo $_Theme_['cookies']['message']; ?>">
                                </div>

                            </div>
                        </div>
                    </div>

                <div class="panel panel-default cmw-panel">
                    <a role="button" data-toggle="collapse" href="#socialfooter" aria-exepanded="false">
                        <div class="panel-heading cmw-panel-header">
                            <h3 class="panel-title">Réseaux sociaux (Footer)</h3>
                        </div>
                    </a>
                </div>

                    <div class="collapse" id="socialfooter">
                        <div class="panel-body">
                            <div class="container-fluid">

                                <div class="row">
                                    <label class="control-label">Facebook (URL de votre page Facebook)</label>
                                    <input type="text" class="form-control" name="facebook" value="<?php echo $_Theme_['Pied']['facebook']; ?>">
                                </div>
                                <div class="row">
                                    <label class="control-label">Twitter (URL de votre compte Twitter)</label>
                                    <input type="text" class="form-control" name="twitter" value="<?php echo $_Theme_['Pied']['twitter']; ?>">
                                </div>
                                <div class="row">
                                    <label class="control-label">Youtube (URL de votre page Youtube)</label>
                                    <input type="text" class="form-control" name="youtube" value="<?php echo $_Theme_['Pied']['youtube']; ?>">
                                </div>
                                <div class="row">
                                    <label class="control-label">Discord (URL de votre serveur Discord)</label>
                                    <input type="text" class="form-control" name="discord" value="<?php echo $_Theme_['Pied']['discord']; ?>">
                                </div>

                            </div>
                        </div>
                    </div>

                <div class="panel panel-default cmw-panel">
                    <a role="button" data-toggle="collapse" href="#accueil" aria-exepanded="false">
                        <div class="panel-heading cmw-panel-header">
                            <h3 class="panel-title">Accueil</h3>
                        </div>
                    </a>
                </div>

                    <div class="collapse" id="accueil">
                        <div class="panel-body">
                            <div class="container-fluid">

                                <div class="row">
                                    <label class="control-label">Vidéo YouTube (URL de la vidéo qui se joue en background sur l'acceuil)</label>
                                    <input type="text" class="form-control" name="youtube" value="<?php echo $_Theme_['All']['YT']; ?>">
                                </div>
                                <br/>
                                <section class="content-item grey" id="services">
                                    <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        <input type="text" class="form-control" name="icone1" value="<?php echo $_Theme_['All']['1']['icone']; ?>">
                                            <h4><input type="text" class="form-control" name="titre1" value="<?php echo $_Theme_['All']['1']['titre']; ?>"></h4>
                                            <p><input type="text" class="form-control" name="texte1" value="<?php echo $_Theme_['All']['1']['texte']; ?>"></p>
                                        </div>
                                        <div class="col-sm-4">
                                        <input type="text" class="form-control" name="icone2" value="<?php echo $_Theme_['All']['2']['icone']; ?>">
                                            <h4><input type="text" class="form-control" name="titre2" value="<?php echo $_Theme_['All']['2']['titre']; ?>"></h4>
                                            <p><input type="text" class="form-control" name="texte2" value="<?php echo $_Theme_['All']['2']['texte']; ?>"></p>
                                        </div>
                                        <div class="col-sm-4">
                                        <input type="text" class="form-control" name="icone3" value="<?php echo $_Theme_['All']['3']['icone']; ?>">
                                            <h4><input type="text" class="form-control" name="titre3" value="<?php echo $_Theme_['All']['3']['titre']; ?>"></h4>
                                            <p><input type="text" class="form-control" name="texte3" value="<?php echo $_Theme_['All']['3']['texte']; ?>"></p>
                                        </div>
                                    </div>
                                        </div>
                                    </div>
                                </section>
                                <br/>
                                <section class="content-item" id="about-project">
                                    <div class="container-fluid"> 
                                        <div class="project-feature">
                                            <div class="row">
                                                <div class="col-md-6 hidden-sm wow pulse">
                                                    <img src="<?php echo $_Theme_['img']['banner'];?>" class="img-responsive" alt="" style="height:300px;">
                                                    <input type="text" class="form-control" name="bannerimg" value="<?php echo $_Theme_['img']['banner'];?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="list-unstyled">
                                                    <?php for($i = 1; $i < count($_Theme_['Infos']) + 1; $i++)
                                                    { ?>
                                                        <li>
                                                        <input type="text" class="form-control" name="imsg<?php echo $i ?>" value="<?php echo $_Theme_['Infos'][$i]['message']; ?>">
                                                        </li>
                                                    <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                        </div>
                    </div>

                <div class="panel panel-default cmw-panel">
                    <a role="button" data-toggle="collapse" href="#forum" aria-exepanded="false">
                        <div class="panel-heading cmw-panel-header">
                            <h3 class="panel-title">Forum</h3>
                        </div>
                    </a>
                </div>

                    <div class="collapse" id="forum">
                        <div class="panel-body">
                            <div class="container-fluid">

                                <div class="row">
                                    <label class="control-label">Addon Discord:</label>
                                    <div class="text-center">
                                    <div class="custom-control custom-radio" style="display: inline-block;">
                                            <input type="radio" id="customRadio1" name="discordetat"
                                                class="custom-control-input" value="false"
                                                <?php if($_Theme_['All']['forum']['discord']['statut'] != "true") { echo ' checked=""'; }?>>
                                            <label class="custom-control-label" for="customRadio1">Désactivé</label>
                                        </div>
                                        <div class="custom-control custom-radio" style="display: inline-block;">
                                            <input type="radio" id="customRadio2" name="discordetat"
                                                class="custom-control-input" value="true"
                                                <?php if($_Theme_['All']['forum']['discord']['statut'] == "true") { echo ' checked=""'; }?>>
                                            <label class="custom-control-label" for="customRadio2">Activé</label>
                                        </div>
                                    </div>

                                    <label for="discordid">Identifiant de la guilde Discord</label>
                                    <input type="number" class="form-control" name="discordid" id="discordid" value="<?php echo $_Theme_['All']['forum']['discord']['id']; ?>">
                                </div>
                                <br/>
                                <div class="row">
                                    <label class="control-label">Addon Twitter:</label>
                                    <div class="text-center">
                                    <div class="custom-control custom-radio" style="display: inline-block;">
                                            <input type="radio" id="customRadio3" name="twitteretat"
                                                class="custom-control-input" value="false"
                                                <?php if($_Theme_['All']['forum']['twitter']['statut'] != "true") { echo ' checked=""'; }?>>
                                            <label class="custom-control-label" for="customRadio3">Désactivé</label>
                                        </div>
                                        <div class="custom-control custom-radio" style="display: inline-block;">
                                            <input type="radio" id="customRadio4" name="twitteretat"
                                                class="custom-control-input" value="true"
                                                <?php if($_Theme_['All']['forum']['twitter']['statut'] == "true") { echo ' checked=""'; }?>>
                                            <label class="custom-control-label" for="customRadio4">Activé</label>
                                        </div>
                                    </div>
                                    <label for="twitterid">Nom du compte</label>
                                    <input type="text" class="form-control" name="twitterid" id="twitterid" value="<?php echo $_Theme_['All']['forum']['twitter']['id']; ?>">
                                </div>

                            </div>
                        </div>
                    </div>

                <div class="panel panel-default cmw-panel">
                    <a role="button" data-toggle="collapse" href="#boutique" aria-exepanded="false">
                        <div class="panel-heading cmw-panel-header">
                            <h3 class="panel-title">Boutique</h3>
                        </div>
                    </a>
                </div>

                    <div class="collapse" id="boutique">
                        <div class="panel-body">
                            <div class="container-fluid">
                                <div class="row">
                                        <label class="control-label">Addon MicroPanier:</label>
                                        <div class="text-center">
                                        <div class="custom-control custom-radio" style="display: inline-block;">
                                                <input type="radio" id="customRadio5" name="panier"
                                                    class="custom-control-input" value="false"
                                                    <?php if($_Theme_['All']['Boutique']['panier'] != "true") { echo ' checked=""'; }?>>
                                                <label class="custom-control-label" for="customRadio5">Désactivé</label>
                                            </div>
                                            <div class="custom-control custom-radio" style="display: inline-block;">
                                                <input type="radio" id="customRadio6" name="panier"
                                                    class="custom-control-input" value="true"
                                                    <?php if($_Theme_['All']['Boutique']['panier'] == "true") { echo ' checked=""'; }?>>
                                                <label class="custom-control-label" for="customRadio6">Activé</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                    <label class="control-label">Addon Historique:</label>
                                            <div class="text-center">
                                            <div class="custom-control custom-radio" style="display: inline-block;">
                                                <input type="radio" id="customRadio7" name="historique"
                                                    class="custom-control-input" value="false"
                                                    <?php if($_Theme_['All']['Boutique']['historique'] != "true") { echo ' checked=""'; }?>>
                                                <label class="custom-control-label" for="customRadio7">Désactivé</label>
                                            </div>
                                            <div class="custom-control custom-radio" style="display: inline-block;">
                                                <input type="radio" id="customRadio8" name="historique"
                                                    class="custom-control-input" value="true"
                                                    <?php if($_Theme_['All']['Boutique']['historique'] == "true") { echo ' checked=""'; }?>>
                                                <label class="custom-control-label" for="customRadio8">Activé</label>
                                            </div>
                                        </div>
                                    </div>
                                        <br/>
                                    <div class="row">
                                            <label for="nomtoken">Nom de la monnaie</label>
                                            <input type="text" class="form-control" name="nomtoken" id="nomtoken" value="<?=$_Theme_['All']['Tokens']['nom']?>">
                                    </div>
                                    <div class="row">
                                            <label for="icontoken">Icone de la monnaie (<strong>FONTAWESOME 3 OU 4 UNIQUEMENT !</strong> <a href="https://fontawesome.com/icons?d=gallery" target="_blank" rel="noopener noreferrer">Liste des icones <i class="fa fa-flag"></i></a> )</label>
                                            <input type="text" class="form-control" name="icontoken" id="icontoken" value="<?=$_Theme_['All']['Tokens']['icon']?>">
                                    </div>
                            </div>
                        </div>
                    </div>
                <label for="couleurtheme">Theme de couleur (Par default: <code> CB2027 </code>)</label>
                <input name="couleurtheme" class="jscolor" value="<?php echo $_Theme_['couleur']; ?>" style="width: 100%"> 

                <div class="form-group text-center">
                    <input type="submit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
