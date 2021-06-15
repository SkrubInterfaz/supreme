<?php	$getprofil = $_GET['profil'];
?>
<style>
.btn {
  display: inline-block;
  font-weight: 400;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}
.btn-secondary {
  color: #222;
  background-color: #f0f0f0;
  border-color: #f0f0f0;
}

.btn-secondary:hover {
  color: #222;
  background-color: #dddddd;
  border-color: #d7d6d6;
}

.btn-secondary:focus, .btn-secondary.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(240, 240, 240, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(240, 240, 240, 0.5);
}

.btn-secondary.disabled, .btn-secondary:disabled {
  color: #222;
  background-color: #f0f0f0;
  border-color: #f0f0f0;
}

.btn-secondary:not(:disabled):not(.disabled):active, .btn-secondary:not(:disabled):not(.disabled).active,
.show > .btn-secondary.dropdown-toggle {
  color: #222;
  background-color: #d7d6d6;
  border-color: #d0d0d0;
}

.btn-secondary:not(:disabled):not(.disabled):active:focus, .btn-secondary:not(:disabled):not(.disabled).active:focus,
.show > .btn-secondary.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(240, 240, 240, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(240, 240, 240, 0.5);
}
.card {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 0.25rem;
}
.rounded {
  border-radius: 0.25rem !important;
}

.rounded-top {
  border-top-left-radius: 0.25rem !important;
  border-top-right-radius: 0.25rem !important;
}
.card-body {
  -webkit-box-flex: 1;
      -ms-flex: 1 1 auto;
          flex: 1 1 auto;
  padding: 1.25rem;
}

.card-title {
  margin-bottom: 0.75rem;
}

.card-subtitle {
  margin-top: -0.375rem;
  margin-bottom: 0;
}

.card-text:last-child {
  margin-bottom: 0;
}

.card-link:hover {
  text-decoration: none;
}

.card-link + .card-link {
  margin-left: 1.25rem;
}

.card-header {
  padding: 0.75rem 1.25rem;
  margin-bottom: 0;
  background-color: rgba(0, 0, 0, 0.03);
  border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}

.card-header:first-child {
  border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}

.card-header + .list-group .list-group-item:first-child {
  border-top: 0;
}

.card-footer {
  padding: 0.75rem 1.25rem;
  background-color: rgba(0, 0, 0, 0.03);
  border-top: 1px solid rgba(0, 0, 0, 0.125);
}

.card-footer:last-child {
  border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
}

.card-header-tabs {
  margin-right: -0.625rem;
  margin-bottom: -0.75rem;
  margin-left: -0.625rem;
  border-bottom: 0;
}

.card-header-pills {
  margin-right: -0.625rem;
  margin-left: -0.625rem;
}

.card-img-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1.25rem;
}

.card-img {
  width: 100%;
  border-radius: calc(0.25rem - 1px);
}

.card-img-top {
  width: 100%;
  border-top-left-radius: calc(0.25rem - 1px);
  border-top-right-radius: calc(0.25rem - 1px);
}

.card-img-bottom {
  width: 100%;
  border-bottom-right-radius: calc(0.25rem - 1px);
  border-bottom-left-radius: calc(0.25rem - 1px);
}
</style>
<section class="layout" id="page">
	<div class="container">

	<br/>
	<?php
		if(isset($_Joueur_["pseudo"]) && $_Joueur_['pseudo'] != $_GET['profil'])
			{ ?>
				<h1 class="titre">Profil de <?php echo htmlspecialchars($getprofil); ?></h1>
				<div class="container">
				<button type="button" data-toggle="modal" data-target="#modalRep" data-to="<?=$_GET['profil'];?>" style="float: right;" class="btn btn-primary">Envoyer un message</button>
	<?php
	}
	if(isset($_Joueur_) AND $_GET['profil'] == $_Joueur_['pseudo'])
	{
	?>
			<div class="categories-edit">
						<ul class="nav nav-tabs" id="modifProfil">
							<li class="col-md-4 active"><a href="#infos" data-toggle="tab">Informations principales</a></li>
							<li class="col-md-4"><a href="#autres" data-toggle="tab">Autres</a></li>
						</ul>
					</div>
				<?php
				if(isset($_GET['erreur']))
				{
					if($_GET['erreur'] == 1)
						echo '<div class="alert alert-danger"><center>Erreur, l\'email rentré est invalide</center></div>';
					elseif($_GET['erreur'] == 2)
						echo '<div class="alert alert-danger"><center>Erreur, un des champs est trop court ( < à 4 caractères)</center></div>';
					elseif($_GET['erreur'] == 3)
						echo '<div class="alert alert-danger"><center>Erreur, le mot de passe rentré ne correspond pas à celui associé à votre compte</center></div>';
					elseif($_GET['erreur'] == 4)
						echo '<div class="alert alert-danger"><center>Vous n\'avez pas assez de tokens :( </center></div>';
					elseif($_GET['erreur'] == 5)
						echo '<div class="alert alert-danger"><center>Pseudo inconnu ... </center></div>';
					elseif($_GET['erreur'] == 6)
						echo '<div class="alert alert-danger"><center>Extension non autorisée !</center></div>';
					elseif($_GET['erreur'] == 7)
						echo '<div class="alert alert-danger"><center>Fichier trop volumineux ! </center></div>';
					elseif($_GET['erreur'] == 8)
						echo '<div class="alert alert-danger"><center>Des champs sont manquants !</center></div>';
					else
						echo '<div class="alert alert-danger"><center>Erreur indéterminé</center></div>';
				}
				elseif (isset($_GET['success'])) {
					if($_GET['success'] == 'true')
						echo '<div class="alert alert-success"><center>Vos informations ont bien été changé !</center></div>';
					elseif($_GET['success'] == "jetons")
						echo '<div class="alert alert-success"><center>Vous venez d\'envoyer '.htmlspecialchars($_GET['montant']).' '. $_Theme_['All']['Tokens']['nom'] .' à '.htmlspecialchars($_GET['pseudo']).'</center></div>';
					elseif($_GET['success'] == "image")
						echo '<div class="alert alert-success"><center>Votre photo de profil a été modifiée </center></div>';
					elseif($_GET['success'] == "imageRemoved")
						echo '<div class="alert alert-success"><center>Votre photo de profil a été supprimée de nos serveurs.</center></div>';
				}
				?>
				<div class="tab-content">
					<div class="tab-pane active" id="infos">

					<h3 class="header-bloc header-form">Général</h3>

					<form class="form-horizontal" method="post" action="?&action=changeProfil" role="form">


						<div class="form-group">
							<div class="row">
								<label for="pseudo" class="col-md-4 control-label">Pseudo</label>
								<div class="col-md-6">
									<p class="form-control-static disabled" style="cursor: not-allowed;"><?php echo $_Joueur_['pseudo']; ?></p>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">Mot de Passe</label>
								<div class="col-md-6 changer-mdp-champ">
									<input type="password" class="form-control" name="mdpAncien" placeholder="Ancien Mot de Passe">
								</div>
							</div>
							<div class="row">
								<label class="col-md-4 control-label">Nouveau</label>
								<div class="col-md-6 changer-mdp-champ">
									<input type="password" class="form-control" name="mdpNouveau" placeholder="Nouveau Mot de Passe">
								</div>
							</div>
							<div class="row">
								<label class="col-md-4 control-label">Confirmation</label>
								<div class="col-md-6 changer-mdp-champ">
									<input type="password" class="form-control" name="mdpConfirme" placeholder="Confirmez-le">
								</div>
							</div>
						</div>
					  <div class="form-group">
						<div class="row">
							<label for="inputPassword3" class="col-md-4 control-label">Email</label>
							<div class="col-md-6">
							  <input type="email" class="form-control" id="inputPassword3" name="email" value="<?php echo $joueurDonnees['email']; ?>">
							</div>
						</div>
					  </div>
					  <div class="form-group">
						<div class="row">
							<div class="col-md-offset-5 col-md-5">
							  <button type="submit" class="btn btn-primary validerChange">Valider mes changements</button>
							</div>
						</div>
					  </div>
					</form>
					<div class="row">
						<div class="col-md-8">
							<p>Votre email est actuellement <span style="font-weight: bold;"><?php if($joueurDonnees['show_email'] == 0) echo 'visible Publiquement'; else echo 'invisible publiquement'; ?></span></p>
						</div>
						<div class="col-md-4">
							<a href="?action=modifShowEmail&actuel=<?=$joueurDonnees['show_email'];?>" class="btn btn-warning">Retiré mon email de la vue du publique</a>
						</div>
					</div>


					</div>
					<div class="tab-pane" id="autres">

						<h3 class="header-bloc header-form">Autres données personnelles</h3>

						<form class="form-horizontal" method="post" action="?&action=changeProfilAutres" role="form">

							<?php
							foreach($listeReseaux as $value)
							{
								?>
								<div class="form-group">
									<label for="pseudo" class="col-sm-2 control-label"><?=ucfirst($value['nom']);?></label>
									<div class="col-sm-8" style="display: inline-block;">
										<input type="text" class="form-control" name="<?=$value['nom'];?>" placeholder="Votre nom d'utilisateur <?=$value['nom'];?>" value="<?php if($joueurDonnees[$value['nom']] != 'inconnu') echo $joueurDonnees[$value['nom']]; ?>">
									</div>
								</div>
								<?php
							}
							?>
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">Age</label>
						    <div class="col-sm-8" style="display: inline-block;">
						      <input type="number" name="age"class="form-control" placeholder="17" value="<?php if($joueurDonnees['age'] != 'inconnu') echo $joueurDonnees['age']; ?>" >
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-12 text-center control-label">Signature Forum</label>
						    <div class="col-md-12">
								<div class="card border-secondary mb-auto rounded-top">
									<div class="card-header">
									<a class="btn btn-secondary" href="javascript:ajout_text('signature', 'Ecrivez ici ce que vous voulez mettre en gras', 'ce texte sera en gras', 'b')" style="text-decoration: none;" title="Texte en gras"><i class="fas fa-bold" aria-hidden="true"></i></a>
									<a class="btn btn-secondary" href="javascript:ajout_text('signature', 'Ecrivez ici ce que vous voulez mettre en italique', 'ce texte sera en italique', 'i')" style="text-decoration: none;" title="Texte en italique"><i class="fas fa-italic"></i></a>
									<a class="btn btn-secondary" href="javascript:ajout_text('signature', 'Ecrivez ici ce que vous voulez mettre en souligné', 'ce texte sera en souligné', 'u')" style="text-decoration: none;" title="Texte souligné"><i class="fas fa-underline"></i></a>
									<a class="btn btn-secondary" href="javascript:ajout_text('signature', 'Ecrivez ici ce que vous voulez mettre en barré', 'ce texte sera barré', 's')" style="text-decoration: none;" title="Texte barré"><i class="fas fa-strikethrough"></i></a>
									<a class="btn btn-secondary" href="javascript:ajout_text('signature', 'Ecrivez ici ce que vous voulez mettre en aligné à gauche', 'ce texte sera aligné à gauche', 'left')" style="text-decoration: none" title="Texte aligné à gauche"><i class="fas fa-align-left"></i></a>
									<a class="btn btn-secondary" href="javascript:ajout_text('signature', 'Ecrivez ici ce que vous voulez mettre en centré', 'ce texte sera centré', 'center')" style="text-decoration: none" title="Texte centré"><i class="fas fa-align-center"></i></a>
									<a class="btn btn-secondary" href="javascript:ajout_text('signature', 'Ecrivez ici ce que vous voulez mettre en aligné à droite', 'ce texte sera aligné à droite', 'right')" style="text-decoration: none" title="Texte aligné à droite"><i class="fas fa-align-right"></i></a>
									<a class="btn btn-secondary" href="javascript:ajout_text('signature', 'Ecrivez ici ce que vous voulez mettre en justifié', 'ce texte sera justifié', 'justify')" style="text-decoration: none" title="Texte justifié"><i class="fas fa-align-justify"></i></a>
									<a class="btn btn-secondary" href="javascript:ajout_text_complement('signature', 'Ecrivez ici l\'adresse de votre lien', 'https://www.exemple.com/', 'url', 'Entrez le texte de votre lien', 'Clique ici pour acceder a mon super lien')" style="text-decoration: none" title="lien"><i class="fas fa-link"></i></a>
									<a class="btn btn-secondary" href="javascript:ajout_text_complement('signature', 'Ecrivez ici l\'adresse de votre image', 'http://craftmywebsite.fr/forum/img/site_logo.png', 'img', 'Entrez ici le titre de votre image (laisser vide si vous ne voulez pas compléter', 'Titre')" style="text-decoration: none" title="image"><i class="fas fa-image"></i></a>
									<a class="btn btn-secondary" href="javascript:ajout_text_complement('signature', 'Ecrivez ici votre texte en couleur', 'Ce texte sera coloré', 'color', 'Entrer le nom de la couleur en anglais ou en hexaécimal avec le  # : http://www.code-couleur.com/', 'red ou #40A497')" style="text-decoration: none" title="couleur"><i class="fas fa-font"></i></a>
									<a class="btn btn-secondary" href="javascript:ajout_text_complement('signature', 'Ecrivez ici votre message caché', 'contenue du spoiler', 'spoiler', 'Entrer le titre du message caché (si la case est vide le titre sera \'Spoiler\'', 'Spoiler')" style="text-decoration: none" title="spoiler"><i class="fas fa-flag"></i></a>
									<div class="dropdown" style="display: inline">
										<a href="#" class="btn btn-secondary dropdown-toggle" role="button" id="font" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										 Taille du texte
										</a>
										<div class="dropdown-menu" aria-labelledby="font">
											<a class="dropdown-item" href="javascript:ajout_text('signature', 'Ecrivez ici ce que vous voulez mettre en taille 2', 'ce texte sera en taille 2', 'font=2')"><span style="font-size: 2em;">2</span></a>
											<a class="dropdown-item" href="javascript:ajout_text('signature', 'Ecrivez ici ce que vous voulez mettre en taille 5', 'ce texte sera en taille 5', 'font=5')"><span style="font-size: 5em;">5</span></a>
										</div>
									</div>
									<div class="dropdown" style="display: inline">
										<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
											<i style="text-decoration:none;" class="fas fa-smile"></i>
										</button>
										<div class="dropdown-menu">
										<?php
												$smileys = getDonnees($bddConnection);
												for($i = 0; $i < count($smileys['symbole']); $i++)
												{
													echo '<a class="dropdown-item" style="display: inline; padding: 0; white-space: normal;" href="javascript:insertAtCaret(\'signature\',\' '.$smileys['symbole'][$i].' \')"><img src="'.$smileys['image'][$i].'" alt="'.$smileys['symbole'][$i].'" title="'.$smileys['symbole'][$i].'" /></a>';
												}
											?>
										</div>
									</div>
								</div>
							</div>
						    <div class="col-md-12 col-sm-12" style="display: inline-block;">
						      	<textarea name="signature" class="form-control" placeholder="Votre signature" oninput="previewTopic(this);" id="signature"><?php if(isset($joueurDonnees['signature'])) echo $joueurDonnees['signature']; ?></textarea>
						    </div>
						    <div class="col-md-12 col-sm-12">
								<p style="height: auto; width: auto; background-color: white;" id="previewTopic"></p>
							</div>
						  </div>
						  <div class="form-group">
						    <div class="text-center">
						      <button type="submit" class="btn btn-primary validerChange">Valider champs facultatifs</button>
						    </div>
						  </div>
						</form>

					</div>
					<hr/>
					<div class="tab-pane" id="serveur">
						<h3 class="header-bloc header-form">Transfert de <?=$_Theme_['All']['Tokens']['nom'];?></h3>
						<form class="form-horizontal" method="post" action="?&action=give_jetons" role="form">


							<div class="form-group">
								<label for="pseudo" class="col-sm-4 control-label">Pseudo du receveur</label>
								<div class="col-sm-6">
									<input type="text" required class="form-control" name="pseudo" placeholder="Le nom de la personne a qui vous souhaiter donner des jetons" id="pseudo">
								</div>
							</div>
						  <div class="form-group">
						    <label for="montant" class="col-sm-4 control-label">Montant</label>
						    <div class="col-sm-6">
						      <input type="number" required name="montant" class="form-control" placeholder="0" />
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-5 col-sm-5">
						      <button type="submit" class="btn btn-primary validerChange">Envoyer</button>
						    </div>
						  </div>
						</form>
					</div>
					<hr>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h3 class="header-bloc header-form">Modifier ma photo de profil</h3>
						<form class="form-horizontal" method="post" action="?action=modifImgProfil" role="form" enctype="multipart/form-data">
							<div class="form-group">
								<label for="img-profil" class="control-label">Importer votre image (< 1Mo, jpeg, jpg, png, bmp, ico, gif)</label>
								<input type="file" name="img_profil" required class="form-control-file" id="img-profil">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success">Envoyer</button>
							</div>
						</form>
					</div>
					<div class="col-md-6">
						<h3 class="header-bloc">Photo de profil actuelle</h3>
						<?php
						$Img = new ImgProfil($_Joueur_['id']);
						echo "<center><img src='".$Img->getImgToSize(128, $width, $height)."' style='width: ".$width."px; height: ".$height."px;' alt='Profil' /></center>";
						if($Img->modif)
						{
							echo '<center><a class="btn btn-danger" style="margin-top: 10px;" href="?action=removeImgProfil">Supprimer</a></center>';
						}
						?>
					</div>
				</div>
				<hr/>

	<?php
	}
	?>
<div class="panel panel-default">
  <div class="panel-body">
		<div class="row">
			<div class="col-md-6 unite-bloc">
				<h3 class="header-bloc">Statistiques</h3>
				<div class="corp-bloc profil-bloc">
					<table class="table">
						<tr>
							<td>Status</td>
							<td><?php echo $serveurProfil['status']; ?></td>
						</tr>
						<tr>
							<td>Age</td>
							<td><?=$joueurDonnees['age'] ." ". ($joueurDonnees['age'] != "??" && $joueurDonnees['age'] > 1 ? "ans" : "an (Hunn ? :/)")?></td>
						</tr>
						<tr>
							<td>Pseudo</td>
							<td><?php echo htmlspecialchars($getprofil); ?></td>
						</tr>
						<tr>
							<td>Grade Site</td>
							<td><?php echo $gradeSite; ?></td>
						</tr>
						<tr>
							<td>Inscription</td>
							<td><?php echo 'Le '.date('d/m/Y', $joueurDonnees['anciennete']).' &agrave; '.date('H:i:s', $joueurDonnees['anciennete']); ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php if($joueurDonnees['show_email'] == 0)
								echo $joueurDonnees['email'];
							else
								echo '<i>Non Disponible</i>'; ?></td>
						</tr>
						<?php
						foreach($listeReseaux as $value)
						{
							?><tr>
								<td><?=ucfirst($value['nom']);?></td>
								<td><?=$joueurDonnees[$value['nom']];?></td>
							</tr><?php
						}
						?>
						<tr>
							<td>Votes</td>
							<td>
								<?php require_once("modele/topVotes.class.php");
								$nbreVotes = new TopVotes($bddConnection);
								echo $nbreVotes->getNbreVotes($getprofil);?>
							</td>
						</tr>
					</table>
				</div>
				<div class="footer-bloc">
				</div>
			</div>
			<div class="col-md-6 unite-bloc">
				<h3 class="header-bloc"><?php echo htmlspecialchars($getprofil); ?></h3>
					<?php
					$Img = new ImgProfil($joueurDonnees['id']);
					?>
					<img src="<?=$Img->getImgToSize(128, $width, $height);?>" style="width: <?=$width;?>px; height: <?=$height;?>px;" alt="<?=htmlspecialchars($getprofil);?>" />
					<img src="https://minotar.net/body/<?php echo htmlspecialchars($getprofil); ?>/200.png" style="padding-left: 30%;" alt="none" />
				<div class="footer-bloc">
				</div>
			</div>
		</div>
  </div>
</div>
<script>
  $(function () {
    $('#modifProfil a:first').tab('show')
  })
</script>
</div></section>
