<style>
	.form-signin
	{
		max-width: 330px;
		padding: 15px;
		margin: 0 auto;
	}
	.form-signin .form-signin-heading, .form-signin .checkbox
	{
		margin-bottom: 10px;
	}
	.form-signin .checkbox
	{
		font-weight: normal;
	}
	.form-signin .form-control
	{
		position: relative;
		font-size: 16px;
		height: auto;
		padding: 10px;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}
	.form-signin .form-control:focus
	{
		z-index: 2;
	}
	.form-signin input[type="text"]
	{
		margin-bottom: -1px;
		border-bottom-left-radius: 0;
		border-bottom-right-radius: 0;
	}
	.form-signin input[type="password"]
	{
		margin-bottom: 10px;
		border-top-left-radius: 0;
		border-top-right-radius: 0;
	}
	.account-wall
	{
		margin-top: 20px;
		padding: 40px 0px 20px 0px;
		background-color: #f7f7f7;
		-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	}
	.login-title
	{
		color: #555;
		font-size: 18px;
		font-weight: 400;
		display: block;
	}
	.profile-img
	{
		width: 128px;
		height: 128px;
		margin: 0 auto 10px;
		display: block;
		-moz-border-radius: 50%;
		-webkit-border-radius: 50%;
		border-radius: 20%;
	}
	.need-help
	{
		margin-top: 10px;
	}
	.new-account
	{
		display: block;
		margin-top: 10px;
	}
</style>
<div class="modal fade" id="ConnectionSlide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Connexion</h4>
			</div>
			<div class="modal-body">
				<?php $req_apiMail = $bddConnection->prepare('SELECT * FROM cmw_sysmail WHERE id = 1');
				$req_apiMail->execute();
				$apiMail = $req_apiMail->rowCount();
				if($apiMail == 1) { ?>
					<p><div class="alert alert-warning" style="text-align: center;">Premiere connexion ?: Pensez a valider votre inscription via le lien dans le mail (l'email peut avoir attérie en spam)</div></p>
					<?php } ?>
					<div class="row">
					<?php if(isset($_COOKIE['pseudo'])){?>
						<img class="profile-img" src="<?=$_Serveur_['General']['url'];?>/include/SkinApi/skin.php?p=<?=$_COOKIE['pseudo'];?>&type=head&size=128" alt="/<?php echo $_COOKIE['pseudo']; ?>.png">
					<?php }else{ ?>
						<img class="profile-img" src="https://cravatar.eu/avatar/Steve/128" alt="/<?php echo $_COOKIE['pseudo']; ?>.png">
					<?php } ?>
						<form class="form-signin" role="form" method="post" action="?&action=connection">
							<input type="text" name="pseudo" class="form-control" id="PseudoConectionForm" placeholder="Ex: Notch" required autofocus>
							<input type="password" name="mdp" class="form-control" id="MdpConnectionForm" placeholder="Votre mot de passe" required>
							<input class="form-check-input" name="reconnexion" type="checkbox"> Reconnexion automatique
							<button class="btn btn-lg btn-primary btn-block" type="submit"> Connexion</button>
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

	<div class="modal fade" id="passRecover" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row">
						<p style="text-align: center;font-weight: bold;">Merci d'indiquer votre email utilisé à l'inscription , vous recevrez un lien pour réinitialiser votre mot de passe. (Pensez a regarder dans les spam)</p>
						<form class="form-signin" role="form" method="post" action="?&action=passRecover" style="max-width: none;">
							<div class="col-md-8"><input type="email" name="email" class="form-control" id="EmailRecoverForm" placeholder="Email" required autofocus></div>
							<div class="col-md-4"><button class="btn btn-lg btn-primary btn-block" type="submit"> Envoyer</button></div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<section class="inscription-pop">
		<div class="modal fade" id="InscriptionSlide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Inscription</h4>
					</div>
					<div class="modal-body">
						<form role="form" method="post" action="?&action=inscription">
							<?php if($apiMail == 1) { ?>
								<center><p><div class="alert alert-warning" style="text-align: center;">Veuillez mettre une adresse email correct pour pouvoir valider votre inscription (Ps: La validation peut arrivé dans la boite spam)!</div></p></center>
								<?php } ?>
								<div class="form-group">
									<label for="PseudoInscriptionForm">Pseudo</label>
									<input type="text" name="pseudo" class="form-control" id="PseudoInscriptionForm" placeholder="Votre pseudo exact In-Game" required>
								</div>
								<div class="form-group">
									<label for="EmailInscriptionForm">Email</label>
									<input type="email" name="email" class="form-control" id="EmailInscriptionForm" placeholder="Merci d'entrer une adresse email valide" required>
								</div>
								<div class="form-group">
									<label for="MdpInscriptionForm">Mot de passe</label>
									<input type="password" name="mdp" class="form-control" onKeyUp="securPass();" id="MdpInscriptionForm" placeholder="Votre mot de passe" required>
								</div>
								<div class="form-group">
									<label for="MdpConfirmInscriptionForm">Confirmation du Mot de passe</label>
									<input type="password" name="mdpConfirm" class="form-control" onKeyUp="securPass();" id="MdpConfirmInscriptionForm" placeholder="Confirmez-le" required>
								</div>
								<center>
								<div class="form-group row d-none" id="progress">
									<div class="col-md-12">
										<div class="progress">
											<div class="progress-bar progress-bar-striped progress-bar-animated" id="progressbar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<p id="correspondance"></p>
								</div>
								</center>
								<div class="form-group row col-md-5">
									<label for="ageForm" class="form-label">Âge (facultatif)</label>
									<input type="number" name="age" id="ageForm" class="form-control" value="0" min="0" max="122">

									<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" name="souvenir" checked> S'inscrire à la newsletter
										</label>
										<br/>
										<label class="form-check-label">
											<input type="checkbox" name="show_email" value="true"> Rendre votre adresse email publique
										</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Captcha:</label>
										<input type='text' name='CAPTCHA' placeholder='captcha' class="form-control" required />
									</div>
									<div class="col-md-6">
										<img id='captcha' src='include/purecaptcha/purecaptcha_img.php?t=login_form'/>
										<br/>
									<br/>
									<br/>
									<button type='button' onclick='var t=document.getElementById("captcha"); t.src=t.src+"&amp;"+Math.random();' class="btn btn-success btn-block"><span class="glyphicon glyphicon-refresh spin"></span> Recharger le captcha</button>
									<br/>
								</div>
							</div>
						</br>
						<button type="submit" class="btn btn-success btn-block" id="InscriptionBtn" disabled><strong>S'inscrire !</strong></button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</section>

<?php
if(isset($_GET['page']) && $_GET['page'] == "messagerie")
{
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
<div class="modal fade" id="modalRep" tabindex="-1" role="dialog" aria-labelledby="ModalRepLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalRepLabel">Nouveau message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="?action=sendMessage" method="POST">
      <div class="modal-body">
          <div class="form-group">
            <label for="destinataire" class="col-form-label">Destinataire:</label>
            <input type="text" class="form-control" name="destinataire" id="destinataire" required maxlength="20">
          </div>
          <div class="form-group">
					<div class="col-md-12">
				<div class="card border-secondary mb-auto rounded-top">
					<div class="card-header">
					<a class="btn btn-secondary" href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en gras', 'ce texte sera en gras', 'b')" style="text-decoration: none;" title="Texte en gras"><i class="fas fa-bold" aria-hidden="true"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en italique', 'ce texte sera en italique', 'i')" style="text-decoration: none;" title="Texte en italique"><i class="fas fa-italic"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en souligné', 'ce texte sera en souligné', 'u')" style="text-decoration: none;" title="Texte souligné"><i class="fas fa-underline"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en barré', 'ce texte sera barré', 's')" style="text-decoration: none;" title="Texte barré"><i class="fas fa-strikethrough"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en aligné à gauche', 'ce texte sera aligné à gauche', 'left')" style="text-decoration: none" title="Texte aligné à gauche"><i class="fas fa-align-left"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en centré', 'ce texte sera centré', 'center')" style="text-decoration: none" title="Texte centré"><i class="fas fa-align-center"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en aligné à droite', 'ce texte sera aligné à droite', 'right')" style="text-decoration: none" title="Texte aligné à droite"><i class="fas fa-align-right"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en justifié', 'ce texte sera justifié', 'justify')" style="text-decoration: none" title="Texte justifié"><i class="fas fa-align-justify"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text_complement('message', 'Ecrivez ici l\'adresse de votre lien', 'https://www.exemple.com/', 'url', 'Entrez le texte de votre lien', 'Clique ici pour acceder a mon super lien')" style="text-decoration: none" title="lien"><i class="fas fa-link"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text_complement('message', 'Ecrivez ici l\'adresse de votre image', 'http://craftmywebsite.fr/forum/img/site_logo.png', 'img', 'Entrez ici le titre de votre image (laisser vide si vous ne voulez pas compléter', 'Titre')" style="text-decoration: none" title="image"><i class="fas fa-image"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text_complement('message', 'Ecrivez ici votre texte en couleur', 'Ce texte sera coloré', 'color', 'Entrer le nom de la couleur en anglais ou en hexaécimal avec le  # : http://www.code-couleur.com/', 'red ou #40A497')" style="text-decoration: none" title="couleur"><i class="fas fa-font"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text_complement('message', 'Ecrivez ici votre message caché', 'contenue du spoiler', 'spoiler', 'Entrer le titre du message caché (si la case est vide le titre sera \'Spoiler\'', 'Spoiler')" style="text-decoration: none" title="spoiler"><i class="fas fa-flag"></i></a>
					<div class="dropdown" style="display: inline">
						<a href="#" class="btn btn-secondary dropdown-toggle" role="button" id="font" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						 Taille du texte
						</a>
						<div class="dropdown-menu" aria-labelledby="font">
							<a class="dropdown-item" href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en taille 2', 'ce texte sera en taille 2', 'font=2')"><span style="font-size: 2em;">2</span></a>
							<a class="dropdown-item" href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en taille 5', 'ce texte sera en taille 5', 'font=5')"><span style="font-size: 5em;">5</span></a>
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
									echo '<a class="dropdown-item" style="display: inline; padding: 0; white-space: normal;" href="javascript:insertAtCaret(\'message\',\' '.$smileys['symbole'][$i].' \')"><img src="'.$smileys['image'][$i].'" alt="'.$smileys['symbole'][$i].'" title="'.$smileys['symbole'][$i].'" /></a>';
								}
							?>
						</div>
					</div>
					<button type="button" onclick="copierText()" class="btn btn-secondary" title="Cliquer pour copier votre post"><i style="text-decoration:none;" class="fas fa-copy"></i></button>
					<button type="button" onclick="cutText()" class="btn btn-secondary" title="Cliquer pour couper votre post"><i style="text-decoration:none;" class="fas fa-cut"></i></button>
					<script>
            function copierText() {
              var copyText = document.getElementById("message");
              copyText.select();
			  document.execCommand("copy");
			  toastr["success"]("Votre message viens d'etre copier dans le presse papier", "Succés")
				toastr.options = {
				"closeButton": true,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
				}
			}
			function cutText() {
              var copyText = document.getElementById("message");
              copyText.select();
			  document.execCommand("cut");
			  toastr["success"]("Votre messages viens d'etre couper dans votre presse papier", "Succés")
				toastr.options = {
				"closeButton": true,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
				}
            }
    	</script>
				</div>
            <textarea class="form-control" rows="5" id="message" name="message" required></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Envoyer le message</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="messageLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="messageLabel">Conversation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="?action=sendMessage" method="POST">
      		<input type="hidden" name="destinataire" class="destinataire" />
	      	<div class="modal-body">
	      		<div class="container">
			         <div id="Conversation">
			         </div>
			    </div><br/>
			    <div class="container">
			    	<h3>Répondre :</h3>
			    	<div class="dropdown" style="display: inline">
					  	<a href="#" role="button" id="font" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   	 <i style="text-decoration:none;" class="fas fa-smile"></i>
					  	</a>
						<div class="dropdown-menu borderrond" aria-labelledby="font">
							<div class="topheaderdante" style="width: 500px">
								<p class="topheadertext">Clique pour ajouter un smiley!</p>
							</div>
						<?php
							$smileys = getDonnees($bddConnection);
							for($i = 0; $i < count($smileys['symbole']); $i++)
							{
								echo '<a class="dropdown-item" style="display: inline; padding: 0; white-space: normal;" href="javascript:insertAtCaret(\'contenue\',\' '.$smileys['symbole'][$i].' \')"><img src="'.$smileys['image'][$i].'" alt="'.$smileys['symbole'][$i].'" title="'.$smileys['symbole'][$i].'" /></a>';
							}
						?>
						</div>
					</div>
					<a href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en gras', 'ce texte sera en gras', 'b')" style="text-decoration: none;" title="gras"><i class="fas fa-bold" aria-hidden="true"></i></a>
					<a href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en italique', 'ce texte sera en italique', 'i')" style="text-decoration: none;" title="italique"><i class="fas fa-italic"></i></a>
					<a href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en souligné', 'ce texte sera en souligné', 'u')" style="text-decoration: none;" title="souligné"><i class="fas fa-underline"></i></a>
					<a href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en barré', 'ce texte sera barré', 's')" style="text-decoration: none;" title="barré"><i class="fas fa-strikethrough"></i></a>
					<a href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en aligné à gauche', 'ce texte sera aligné à gauche', 'left')" style="text-decoration: none" title="aligné à gauche"><i class="fas fa-align-left"></i></a>
					<a href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en centré', 'ce texte sera centré', 'center')" style="text-decoration: none" title="centré"><i class="fas fa-align-center"></i></a>
					<a href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en aligné à droite', 'ce texte sera aligné à droite', 'right')" style="text-decoration: none" title="aligné à droite"><i class="fas fa-align-right"></i></a>
					<a href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en justifié', 'ce texte sera justifié', 'justify')" style="text-decoration: none" title="justifié"><i class="fas fa-align-justify"></i></a>
					<a href="javascript:ajout_text_complement('contenue', 'Ecrivez ici l\'adresse de votre lien', 'https://craftmywebsite.fr/forum', 'url', 'Entrez le titre de votre lien', 'CraftMyWebsite')" style="text-decoration: none" title="lien"><i class="fas fa-link"></i></a>
					<a href="javascript:ajout_text_complement('contenue', 'Ecrivez ici l\'adresse de votre image', 'https://craftmywebsite.fr/img/cat6.png', 'img', 'Entrez ici le titre de votre image (laisser vide si vous ne voulez pas compléter', 'Titre')" style="text-decoration: none" title="image"><i class="fas fa-image"></i></a>
					<a href="javascript:ajout_text_complement('contenue', 'Ecrivez ici votre texte en couleur', 'Ce texte sera coloré', 'color', 'Entrer le nom de la couleur en anglais ou en hexaécimal avec le  # : http://www.code-couleur.com/', 'red ou #40A497')" style="text-decoration: none" title="couleur"><i class="fas fa-font"></i></a>
					<a href="javascript:ajout_text_complement('contenue', 'Ecrivez ici votre message caché', 'contenue du spoiler', 'spoiler', 'Entrer le titre du message caché (si la case est vide le titre sera \'Spoiler\'', 'Spoiler')" style="text-decoration: none" title="spoiler"><i class="fas fa-flag"></i></a>
					<div class="dropdown">
					  	<a href="#" role="button" id="font" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   	 <i class="fas fa-text-height"></i>
					  	</a>
						<div class="dropdown-menu" aria-labelledby="font">
					   		<a class="dropdown-item" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en taille 2', 'ce texte sera en taille 2', 'font=2')"><span style="font-size: 2em;">2</span></a>
					   		<a class="dropdown-item" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en taille 5', 'ce texte sera en taille 5', 'font=5')"><span style="font-size: 5em;">5</span></a>
					  	</div>
					</div>
			    	<textarea rows="5" name="message" id="contenue" required class="form-control"></textarea>
			    </div>
	     	 </div>
	      	<div class="modal-footer">
		        <button type="button" class="btn btn-secondary" style="flex: 1;" data-dismiss="modal">Fermer</button>
		        <button type="submit" class="btn btn-primary" style="flex: 1;">Envoyer le message</button>
		    </div>
		</form>
    </div>
  </div>
</div>
<?php
}
?>
<div class="modal fade" id="NomForum" tabindex="-1" role="dialog" aria-labelledby="NomForumLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NomForumLabel">Modifier le nom du forum</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="?action=changeNomForum" method="post">
      <div class="modal-body">
        	<input type="hidden" name="id" id="id" value="">
        	<input type="hidden" name="entite" id="entite" value="">
        	<input type="text" class="form-control" name="nom" id="nom" />
        	<br/>
        	<label class="control-label col-sm-4" for="icone">Icone</label>
        	<input type="text" class="form-control col-sm-6" style="display: inline-block;" name="icone" value="" id="icone">
        	<p class="text-muted text-center"><a href="https://design.google.com/icons/" target="_blank">https://design.google.com/icons/</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
    </div>
  </div>
</div>
