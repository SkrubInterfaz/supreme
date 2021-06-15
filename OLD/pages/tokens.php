<section class="content-item">
<div class="container">
<h1 class="titre"><center>Achat de <?=$_Theme_['All']['Tokens']['nom'];?></center></h1>

<?php if(isset($_GET['success']) AND $_GET['success'] == 'true'){ ?>
	<div class="alert alert-success">Votre code a bien été validé, vous avez été crédité de <?php echo $_GET['tokens']; ?>  <?=$_Theme_['All']['Tokens']['nom'];?> ! </div>
<?php } elseif(isset($_GET['success']) AND $_GET['success'] == 'false'){ ?>
	<div class="alert alert-danger">Le code entré est incorrect, vous n'avez pas été crédité...</div>
<?php } ?>
<!-- -->
<div class="panel">
		<div class="panel-heading">
			<h3 class="panel-title"><h3>Paiement par PayPal</h3></h3>
		</div>
		<div class="panel-body">
			<?php
			require_once('controleur/tokens/paypal.php');
			?>
			<div class="row">
				<?php
				if(isset($offresTableau))
					for($i = 0; $i < count($offresTableau); $i++)
					{
						echo '
						<div class="col-md-4 offre-boutique">
							<div class="well offre-contenu">
								<div class="contenuBoutique">
									<h3 class="titre-offre">'. $offresTableau[$i]['nom'] .'</h3>
									' .$offresTableau[$i]['description']. '
								</div>
								<div class="footer-offre"> ';
									if(isset($_Joueur_)) {
										if($lienPaypal[$i] == 'viaMail')
											require('controleur/paypal/paypalMail.php');
										else
											echo '<a href="'. $lienPaypal[$i] .'" class="btn btn-primary">Acheter !</a>';
									}
									else { echo'<a href="?&page=connection" class="btn btn-danger">Connexion..</a>'; }
									echo '
									<button class="btn btn-info pull-right">' .$offresTableau[$i]['prix']. ' euro</button>
								</div>
							</div>
						</div>		';
					}
					else
						echo '<div style="margin-left: 15px;margin-right: 15px;" class="alert alert-danger"><strong>Aucune offre de payement par paypal n\'est disponible pour le moment...</strong></div>';
					?>
				</div>
			</div>
		</div>

		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Paiement par Dedipass</br> </h3>
			</div>
			<div class="panel-body">
				<div data-dedipass="<?=$_Serveur_['Payement']['public_key'];?>" data-dedipass-custom=""></div>		
			</div>
		</div>

</div>
</section>
