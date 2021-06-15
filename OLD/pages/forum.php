<?php
$fofo = $_Forum_->affichageForum();
?> 
<section class="layout" id="page">
<div class="container">
	<div class="content-headline">
				<h2>Forum</h2>
				<h3>Ici vous pourrez échanger et partager avec toute la communauté du serveur ! </h3>
	</div>
<?php if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsForum']['general']['modeJoueur'] == true)
 	{
 		?>
 			<p class="text-center">
 				<a href="?action=mode_joueur" class="btn btn-primary">Passer en mode visuel <?php echo ($_SESSION['mode']) ? "Administrateur" : "Joueur"; ?></a>
 			</p>
 		<?php 
	 }
for($i = 0; $i < count($fofo); $i++)
{ 
?>
	<div class="row">
		<div class="col-md-8 col-xs-12">
			<table class="table table-striped">
			<div class="row">
				<div class="col-md-10">
					<h3><?php echo ucfirst($fofo[$i]['nom']); ?></h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<thead>
						<tr>
							<th></th>
							<th>Nom</th>
							<th>Dernière réponse</th>
							<th>Nombre de discussions</th>
							<?php if(($_Joueur_['rang'] == 1 OR $_PGrades_['PermsForum']['general']['deleteCategorie'] == true) AND !$_SESSION['mode'])
							{
								?><th>Actions</th>
								<th></th><?php
							}
							?>
						</tr>
					</thead>
				</div>
			</div>

	<?php
	$categorie = $_Forum_->infosForum($fofo[$i]['id']);
	?>

		<tbody>
	<?php   for($j = 0; $j < count($categorie); $j++) { 
				
				$derniereReponse = $_Forum_->derniereReponseForum($categorie[$j]['id']);
				?>
				<div class="row">
					<div class="col-md-12" style="max-width: 100%">
						<tr>
							<td><?php if($categorie[$j]['img'] == NULL) { ?><a href="?&page=forum_categorie&id=<?php echo $categorie[$j]['id']; ?>"><i class="material-icons">chat</i></a><?php }
								else { ?><a href="?page=forum_categorie&id=<?php echo $categorie[$j]['id']; ?>"><i class="material-icons"><?php echo $categorie[$j]['img']; ?></a><?php }?></td>
							<td><a href="?&page=forum_categorie&id=<?php echo $categorie[$j]['id']; ?>"><?php echo $categorie[$j]['nom']; ?></a></td>
							<td><?php if($derniereReponse != false) { ?> 
								<a href="?page=post&id=<?php echo $derniereReponse['id']; ?>" title="<?=$derniereReponse['titre'];?>"><?php $taille = strlen($derniereReponse['titre']);
								echo substr($derniereReponse['titre'], 0, 8);
								if(strlen($taille > 8)){ echo '...'; } ?><br/><?=$derniereReponse['pseudo'];?>, Le <?php $date = explode('-', $derniereReponse['date_post']); echo '' .$date[2]. '/' .$date[1]. '/' .$date[0]. ''; ?></a>
						<?php
							}
							else { ?><p> Vide </p> <?php } 
							?></td>
						<td>			<?php
							if(isset($_Joueur_) AND ($_Joueur_['rang'] == 1 OR $_PGrades_['PermsForum']['general']['deleteCategorie'] == true) AND !$_SESSION['mode'])
							{
								?><td>
								<div class="dropdown" style="display: inline; text-align: center;">
									<button type="button" class="btn btn-info" id="Perms<?=$categorie[$j]['id'];?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-edit"></i>
									</button>
									<div class="dropdown-menu">
										<form action="?action=modifPermsCategorie" method="POST">
											<input type="hidden" name="id" value="<?=$categorie[$j]['id'];?>" />
											<a class="dropdown-item"><input type="number" name="perms" value="<?=$categorie[$j]['perms'];?>" class="form-control"></a>
											<button type="submit" class="dropdown-item text-center">Modifier</button>
										</form>
									</div>
								</div>
								<a class="btn btn-info" data-toggle="modal" href="#NomForum" data-entite="1" data-nom="<?=$categorie[$j]['nom'];?>" data-icone="<?=($categorie[$j]['img'] == NULL) ? 'chat' : $categorie[$j]['img'];?>" data-id="<?=$categorie[$j]['id'];?>"><i class="fas fa-font"></i></a>
								<div class="dropdown" style="display: inline; text-align: center;">
									<button type="button" class="btn btn-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-list"></i>
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="?action=ordreCat&ordre=<?=$categorie[$j]['ordre']; ?>&id=<?=$categorie[$j]['id']; ?>&forum=<?=$categorie[$j]['forum'];?>&modif=monter"><i class="fas fa-arrow-up"></i> Monter d'un cran</a>
										<br>
										<a class="dropdown-item" href="?action=ordreCat&ordre=<?=$categorie[$j]['ordre']; ?>&id=<?=$categorie[$j]['id']; ?>&forum=<?=$categorie[$j]['forum'];?>&modif=descendre"><i class="fas fa-arrow-down"></i> Descendre d'un cran</a>
									</div>
								</div>
								<a href="?action=remove_cat&id=<?php echo $categorie[$j]['id']; ?>" class="btn btn-danger" style="text-align: left;"><i class="fas fa-trash-alt"></i></a>
								<a href=<?php if($categorie[$j]['close'] == 0) { ?>"?action=lock_cat&id=<?=$categorie[$j]['id'];?>&lock=1" title="Fermer le forum"><i class="fa fa-unlock-alt"<?php } else { ?>"?action=unlock_cat&id=<?=$categorie[$j]['id'];?>&lock=0" title="Ouvrir le forum"><i class="fa fa-lock"<?php } ?> aria-hidden="true"></i></a></td><?php
							}
			?>
					</tr>
					</div>
				</div>
				<?php } 
			}?>
		</tbody>
	</table>
	</div>
	<div class="col-md-4 col-xs-12">
		<?php if(!isset($_Joueur_)){ ?>
		<div style="display:block;min-height:50px"></div>
		<div class="card">
			<div class="card-header">
				<h3 class="card-title"><i class="fas fa-user"></i> Connexion</h3>
			</div>
			<div class="card-body">
				<div class="container-fluid">
					<a href="#" data-toggle="modal" class="btn btn-block btn-danger w-100" data-target="#ConnectionSlide">Se connecter</a>
					<br>
					<a href="#" data-toggle="modal" class="btn btn-block btn-danger w-100" data-target="#InscriptionSlide">S'inscrire</a>
				</div>
			</div>
		</div>
		<hr/>
		<?php }else{ ?>
		<div style="display:block;min-height:50px"></div>
		<div class="card">
			<div class="card-header">
				<h3 class="card-title"><i class="fas fa-user"></i> Informations</h3>
			</div>
			<div class="card-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4">
							<div class="text-center">
								<img src="https://cravatar.eu/avatar/<?=$_Joueur_['pseudo'];?>/92" style="border-radius: 35%" alt="<?=$_Joueur_['pseudo'];?>_64.png" class="img-responsive rounded">
							</div>
						</div>
						<div class="col-md-8">
							<strong>Pseudo:</strong> <?=$_Joueur_['pseudo'];?><br/>
							<strong>Alertes:</strong> <?php echo $alerte; ?><br/>
							<strong>Grade:</strong> <?php echo $_Forum_->gradeJoueur($_Joueur_['pseudo']); ?><br/>
							<strong>ID:</strong> <?=$_Joueur_['id'];?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div style="display:block;min-height:20px"></div>
							<a href="?action=deco" class="btn btn-danger btn-block w-100">Deconnexion</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr/>
		<?php } ?>
		<?php
		if($_Theme_['All']['forum']['discord']['etat'] == "true"){?>
		<div class="panel">
			<div class="panel-header">
				<h3 class="panel-title"><i class="fab fa-discord"></i> Discord</h3>
			</div>
			<div class="panel-body">
				<iframe src="https://discordapp.com/widget?id=<?php echo $_Theme_['All']['forum']['discord']['id']; ?>&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0"></iframe></p>		
			</div>
		</div>
		<?php }
		if($_Theme_['All']['forum']['twitter']['etat'] == "true"){?>
		<hr/>
		<div class="panel">
			<div class="panel-header">
				<h3 class="panel-title"><i class="fab fa-twitter"></i> Twitter</h3>
			</div>
			<div class="panel-body">
				<a class="twitter-timeline" data-lang="fr" data-width="350" data-height="500" href="https://twitter.com/<?php echo $_Theme_['All']['forum']['twitter']['id']; ?>?ref_src=twsrc%5Etfw">Tweets by <?php echo $_Theme_['All']['forum']['twitter']['id']; ?></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
		</div>
		<?php } ?>

	</div>	
</div>
</div>
</section>