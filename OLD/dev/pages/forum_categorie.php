<?php if(!isset($_GET['id'])) header('Location: ?page=erreur&erreur=16');

	//Vérification de l'existence du forum :
	$id = $_GET['id'];
	if(!$_Forum_->exist($id)) header('Location: index.php?page=erreur&erreur=17');
	
	if(isset($_GET['id_sous_forum']))
		$id_sous_forum = $_GET['id_sous_forum'];
	$categoried = $_Forum_->infosCategorie($id);
	if(isset($id_sous_forum))
		$sousforumd = $_Forum_->SousForum($id_sous_forum);
	else
		$sousforumd = $_Forum_->infosSousForum($id, 0);
		
	if(!(($_Joueur_['rang'] == 1 AND !$_SESSION['mode']) OR $_PGrades_['PermsDefault']['forum']['perms'] >= $categoried['perms'] OR $categoried['perms'] == 0)) header('Location: ?page=erreur&erreur=7');?>
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
	<div class="heading">
		<h1 class="text-center wow fadeInDown"  data-wow-delay="2.1s" style="color:white;">Forum: <?=$categoried['nom'];?></h1>
	</div>
	<section class="content-item grey" id="error">
		<div class="container">
			<?php if($_SESSION['mode'])
			{
				?>
			<div class="alert alert-warning" role="alert">
				<p style="margin-bottom: 0;" class="text-center">Vous êtes en Mode Joueur. Pour changer de mode, passer sur la page forum.</p>
			</div><?php 
			}
			?>
			<br/>
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="/">Accueil</a></li>
				  <li class="breadcrumb-item"><a href="?page=forum">Forum</a></li>
				  <li <?php if(isset($id_sous_forum)) { echo ' class="breadcrumb-item active"><a href="?page=forum_categorie&id='.$id.'">'; } else { echo ' class="breadcrumb-item active">'; } echo $categoried['nom']; if(isset($id_sous_forum)) { echo '</a>'; } ?></li>
				  <?php if(isset($id_sous_forum))
						echo '<li class="breadcrumb-item active">'.$sousforumd['nom'].'</li>';
					?>
				</ol>
			</nav><?php
		if(!empty($sousforumd['id']) && !isset($id_sous_forum))
		{
		?>
		<h3>Les sous-Catégories de <?php echo $categoried['nom']; ?></h3>
		<table class="table table-striped">
			<tr>
				<th style="width: 5%"></th>
				<th style="width: 65%">Nom</th>
				<th>Discussions</th>
				<th>Messages</th>
				<?php if(($_Joueur_['rang'] == 1 OR $_PGrades_['PermsForum']['general']['deleteSousForum'] == true) AND !$_SESSION['mode'])
				{
					?><th style="width: 28%">Actions</th><?php 
				} ?>
			</tr>
			<?php
			$sousforumd = $_Forum_->infosSousForum($id, 1);
			for($a = 0; $a < count($sousforumd); $a++)
			{
				if(($_Joueur_['rang'] == 1 AND !$_SESSION['mode']) OR $_PGrades_['PermsDefault']['forum']['perms'] >= $sousforumd[$a]['perms'] OR $sousforumd[$a]['perms'] == 0)
				{
				?>
			<tr>
				<td><?php if($sousforumd[$a]['img'] == NULL) { ?><a href="?&page=forum_categorie&id=<?php echo $id; ?>&id_sous_forum=<?php echo $sousforumd[$a]['id']; ?>"><i class="material-icons">chat</i></a><?php }
					else { ?><a href="?page=forum_categorie&id=<?php echo $id; ?>&id_sous_forum=<?php echo $sousforumd[$a]['id']; ?>"><i class="material-icons"><?php echo $sousforumd[$a]['img']; ?></i></a><?php }?></td>
				<td><a href="?&page=forum_categorie&id=<?php echo $id; ?>&id_sous_forum=<?php echo $sousforumd[$a]['id']; ?>"><?php echo $sousforumd[$a]['nom']; ?></a></td>	
				<td><a href="?page=forum_categorie&id=<?php echo $id; ?>&id_sous_forum=<?php echo $sousforumd[$a]['id']; ?>"><?php echo $_Forum_->compteTopicsSF($sousforumd[$a]['id']); ?></a></td>
				<td><a href="?page=forum_categorie&id=<?php echo $id; ?>&id_sous_forum=<?php echo $sousforumd[$a]['id']; ?>"><?php echo $_Forum_->compteAnswerSF($sousforumd[$a]['id']); ?></a></td>
				<?php if(($_Joueur_['rang'] == 1 OR $_PGrades_['PermsForum']['general']['deleteSousForum'] == true) AND !$_SESSION['mode'])
				{
					?><td><a href=<?php if($sousforumd[$a]['close'] == 0) { ?>"?action=lock_sf&id_f=<?=$sousforumd[$a]['id_categorie'];?>&id=<?=$sousforumd[$a]['id'];?>&lock=1" title="Fermer le sous-forum"><i class="fa fa-unlock-alt"<?php } else { ?>"?action=unlock_sf&id_f=<?=$sousforumd[$a]['id_categorie'];?>&id=<?=$sousforumd[$a]['id'];?>&lock=0" title="Ouvrir le sous-forum"><i class="fa fa-lock"<?php } ?> aria-hidden="true"></i></a>
						<div class="dropdown" style="display: inline; text-align: center;">
							<button type="button" class="btn btn-block btn-info dropdown-toggle" id="Perms<?=$sousforumd[$a]['id'];?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-edit"></i>
							</button>
							<div class="dropdown-menu">
								<form action="?action=modifPermsSousForum" method="POST">
									<input type="hidden" name="id" value="<?=$sousforumd[$a]['id'];?>" />
									<a class="dropdown-item"><input type="number" name="perms" value="<?=$sousforumd[$a]['perms'];?>" class="form-control"></a>
									<button type="submit" class="dropdown-item text-center">Modifier</button>
								</form>
							</div>
						</div>
						<a class="btn btn-block btn-info" data-toggle="modal" href="#NomForum" data-entite="2" data-nom="<?=$sousforumd[$a]['nom'];?>" data-icone="<?=($sousforumd[$a]['img'] == NULL) ? 'chat' : $sousforumd[$a]['img'];?>" data-id="<?=$sousforumd[$a]['id'];?>"><i class="fas fa-font"></i></a>
						<div class="dropdown" style="display: inline; text-align: center;">
							<button type="button" class="btn btn-block btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-list"></i>
							</button>
							<div class="dropdown-menu">
							    <a class="dropdown-item" href="?action=ordreSousForum&ordre=<?=$sousforumd[$a]['ordre']; ?>&id=<?=$sousforumd[$a]['id']; ?>&id_cat=<?=$sousforumd[$a]['id_categorie'];?>&modif=monter"><i class="fas fa-arrow-up"></i> Monter d'un cran</a>
							    <a class="dropdown-item" href="?action=ordreSousForum&ordre=<?=$sousforumd[$a]['ordre']; ?>&id=<?=$sousforumd[$a]['id']; ?>&id_cat=<?=$sousforumd[$a]['id_categorie'];?>&modif=descendre"><i class="fas fa-arrow-down"></i> Descendre d'un cran</a>
							</div>
						</div>
						<a href="?action=remove_sf&id_cat=<?php echo $id; ?>&id_sf=<?php echo $sousforumd[$a]['id']; ?>"><i class="fas fa-trash-alt"></i></a>
						</td><?php 
				} ?>
			</tr>
			<?php 
				}
			} 
			?>
		</table>
		<?php 
		}
		if(($_Joueur_['rang'] == 1 OR $_PGrades_['PermsForum']['general']['addSousForum'] == true) AND !$_SESSION['mode'] && !isset($id_sous_forum))
		{
			?>
			<div class="col-md-offset-8 col-md-4">
				<a class="btn btn-block btn-primary" role="button" data-toggle="collapse" href="#sous_cat" aria-expanded="false" aria-controls="collapseExample">
				  Créez un sous-forum
				</a>
			</div>
				<div class="collapse" id="sous_cat">
					<div class="well">
						<form action="?action=create_sf" method="post">
							<div class="row">
								<div class="col-md-6">
									<input type="hidden" name="id_categorie" value="<?php echo $id; ?>" />
									<label class="control-label" for="nomSF">Nom</label>
									<input type="text" required class="form-control" name="nom" id="nomSF" maxlength="40" />
								</div>
								<div class="col-md-6">	
									<label class="control-label" for="img">Material icône : <a href="https://design.google.com/icons" target="_blank" >https://design.google.com/icons</a></label>
									<input type="text" maxlength="300" name="img" id="img" class="form-control" />
								</div>
							</div>
							<div class="row">
								<div class="col-md-offset-4 col-md-6">
									<button type="submit" class="btn btn-block btn-success">Créer un sous-forum</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			<?php 
		}
		?>
		<br/>
		<h3> Les topics de <?php echo $categoried['nom']; if(isset($id_sous_forum)) echo ' - '.$sousforumd['nom']; ?></h3>
		<?php 
		if(isset($id_sous_forum))
			$count_topic_max2 = $_Forum_->compteTopicsSF($id_sous_forum);
		else
			$count_topic_max2 = $_Forum_->compteTopics($id);
		$count_topic_nbrOfPages2 = ceil($count_topic_max2 / 20);
		
		if(isset($_GET['page_topic']))
		{
			$page = $_GET['page_topic'];
		}
		else
		{
			$page = 1;
		}
		
		$count_topic_FirstDisplay2 = ($page - 1) * 20;
		if(isset($id_sous_forum))
			$topicd = $_Forum_->infosSousForumTopics($id_sous_forum, $count_topic_FirstDisplay2);
		else
			$topicd = $_Forum_->infosTopics($id, $count_topic_FirstDisplay2);
		if($count_topic_max2 > 0)
		{
			?>
			<table class="table table-striped table-hover">
				<tr>
					<?php if(isset($_Joueur_) && ($_PGrades_['PermsForum']['moderation']['selTopic'] == true OR $_Joueur_['rang'] == 1)  && !$_SESSION['mode'])
					{
						echo '<th></th>';
					} ?>
					<th style="width: 5%"></th>
					<th class="w-50">Nom du topic</th>
					<th>Réponses</th>
					<th>Dernière réponse</th>
				</tr>
				<?php 
				for($i = 0; $i < count($topicd); $i++)
				{
					if(($_Joueur_['rang'] == 1 AND !$_SESSION['mode']) OR $_PGrades_['PermsDefault']['forum']['perms'] >= $topicd[$i]['perms'] OR $topicd[$i]['perms'] == 0)
					{
					?>
					<tr>
						<?php if(isset($_Joueur_) && ($_PGrades_['PermsForum']['moderation']['selTopic'] == true OR $_Joueur_['rang'] == 1) && !$_SESSION['mode'])
							{
								?><td><input name="selection" type="checkbox" value="<?php echo $topicd[$i]['id']; ?>"/></td>
										<?php 
							} 
							$Img = new ImgProfil($topicd[$i]['pseudo'], 'pseudo');
							?>
						<td><a href="?page=profil&profil=<?=$topicd[$i]['pseudo'];?>"><img src="<?=$Img->getImgToSize(42, $width, $height);?>" style="width: <?=$width;?>px; height: <?=$height;?>px;" alt="avatar de l'auteur" title="<?php echo $topicd[$i]['pseudo']; ?>"/></a>
						</td>
						<td><a href="?&page=post&id=<?php echo $topicd[$i]['id']; ?>"><?php if(isset($topicd[$i]['prefix']) && $topicd[$i]['prefix'] != 0)
						{
							echo $_Forum_->getPrefix($topicd[$i]['prefix']);
						}
							echo ' '.$topicd[$i]['nom']; ?></a><br/><p style="margin-bottom: 0px;"><small><a href="?page=profil&profil=<?=$topicd[$i]['pseudo'];?>"><?=$topicd[$i]['pseudo'];?></a>, le <?=$_Forum_->getDateConvert($topicd[$i]['date_creation']);?></small></p></td>
						<td><p>Réponses : <?php echo $_Forum_->compteReponse($topicd[$i]['id']); ?></td>
						<td><a href="?&page=post&id=<?php echo $topicd[$i]['id']; ?>"><?php echo $_Forum_->conversionLastAnswer($topicd[$i]['last_answer']); ?></a></td>
					</tr>
					<?php 
					}
				}
				?>
			</table><br/>
			<?php if(($_Joueur_['rang'] == 1 OR $_PGrades_['PermsForum']['moderation']['addPrefix'] == true OR $_PGrades_['PermsForum']['moderation']['epingle'] == true OR $_PGrades_['PermsForum']['moderation']['closeTopic'] == true) AND !$_SESSION['mode'])
			{
			?>
			<div id="popover" style="display: none;"><hr/><form id="sel-form" method='POST' action='?action=selTopic' class="inline">
				<input type='hidden' name='idCat' value='<?php echo $id; ?>'>
				<?php if(isset($id_sous_forum)) echo "<input type='hidden' name='idSF' value='$id_sous_forum'>"; 
				if($_PGrades_['PermsForum']['moderation']['addPrefix'] == true OR $_Joueur_['rang'] == 1)
				{ ?> 
				<label for='prefix'>Appliquer un préfix de discussion : </label><select name='prefix' id='prefix'>
					<option value="NULL">Ne pas changer le préfixe</option>
					<option value='0'>Aucun</option>
					<?php 
					$reqPrefix = $_Forum_->getPrefixModeration();
					while($donnees_prefix = $reqPrefix->fetch(PDO::FETCH_ASSOC))
					{
						?><option value="<?php echo $donnees_prefix['id']; ?>"><?=$donnees_prefix['nom'];?></option><?php 
					}
					?>
				</select><br/>
				<?php } if($_PGrades_['PermsForum']['moderation']['epingle'] == true or $_Joueur_['rang'] == 1)
				{ ?>
				<label for='epingle'>Epingler une discussion : </label> <input type='radio' name='epingle' value='1' id='ouiEp'/> <label for='ouiEp'>Oui</label>
																		<input type='radio' name='epingle' value='0' id='nonEp'/> <label for='nonEp'>Non</label><br/>
				<?php } if($_PGrades_['PermsForum']['moderation']['closeTopic'] == true OR $_Joueur_['rang'] ==1)
				{ ?><br/>
				<label for='close'>Fermer une discussion : </label> <input type='radio' name='close' value='1' id='yes'/> <label for='yes'>Oui</label>
																	<input type='radio' name='close' value='0' id='no'/> <label for='no'>Non</label><br/>
				<?php } if($_PGrades_['PermsForum']['moderation']['deleteTopic'] == true OR $_Joueur_['rang'] == 1)
				{
					?><br/>
					<label for='remove'>Supprimer les discussions : </label> <input type='radio' name='remove' value='1' id='ouiSP'/> <label for='ouiSP'>Oui</label>
																			<input type='radio' name='remove' value='0' id='nonSp' checked/> <label for='nonSp'>Non</label>
					<?php
				} ?><button type='submit' class='btn btn-lg btn-primary btn-block'>Valider</button>
				</form>
			</div>
			<?php 
		}
		?>
		<div>
  			<ul class="pagination">
				<li class="page-item disabled">
					<a class="page-link" href="#">&laquo;</a>
				</li>
				<?php
					for($i = 1; $i <= $count_topic_nbrOfPages2; $i++)
					{
						?>
						<li class="page-item">
							<a class="page-link" href="?&page=forum_categorie&id=<?php echo $id; if(isset($id_sous_forum)) echo "&id_sous_forum=$id_sous_forum"; ?>&page_topic=<?php echo $i; ?>"><?php echo $i; ?>
							</a>
						</li><?php
					} ?>   
				<li class="page-item disabled">
      				<a class="page-link" href="#">&raquo;</a>
    			</li> 
			</ul>
		</div>
			<?php 
		}
		else 
		{
			?>
			<div class="alert alert-warning" role="alert">
				<p class="text-center" style="margin-bottom: 0;">Aucun sujet n'a été posté :( </p>
			</div>
			<?php
		} 
	if(isset($_Joueur_) && ((($categoried['close'] == 0 AND $sousforumd['close'] == 0) OR ($_Joueur_['rang'] == 1 OR $_PGrades_['PermsForum']['general']['seeForumHide'] == true)) AND !$_SESSION['mode']))
	{
		?>
		<hr/>
		<h4>Poster un topic dans la catégorie <?php echo $categoried['nom']; if(isset($id_sous_forum)) { echo ' et le sous-forum ' .$sousforumd['nom']. ''; } ?></h4>
		<form action="?&action=create_topic" method="post">
			<input type="hidden" name="id_categorie" value="<?php echo $id; ?>"/>
			<input type="hidden" name="sous-forum" value="<?php if(isset($id_sous_forum)) { echo $id_sous_forum; } else { echo 'NULL'; } ?>"/>
			<div class="form-group row">
				<label for="nom" class="col-sm-2 form-control-label">Rentrez le nom de votre topic</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nom" name="nom" placeholder="Le titre de votre topic ici" required />
				</div>
			</div>
			<div class="col-md-12">
				<div class="card border-secondary mb-auto rounded-top">
					<div class="card-header">
					<a class="btn btn-secondary" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en gras', 'ce texte sera en gras', 'b')" style="text-decoration: none;" title="Texte en gras"><i class="fas fa-bold" aria-hidden="true"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en italique', 'ce texte sera en italique', 'i')" style="text-decoration: none;" title="Texte en italique"><i class="fas fa-italic"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en souligné', 'ce texte sera en souligné', 'u')" style="text-decoration: none;" title="Texte souligné"><i class="fas fa-underline"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en barré', 'ce texte sera barré', 's')" style="text-decoration: none;" title="Texte barré"><i class="fas fa-strikethrough"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en aligné à gauche', 'ce texte sera aligné à gauche', 'left')" style="text-decoration: none" title="Texte aligné à gauche"><i class="fas fa-align-left"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en centré', 'ce texte sera centré', 'center')" style="text-decoration: none" title="Texte centré"><i class="fas fa-align-center"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en aligné à droite', 'ce texte sera aligné à droite', 'right')" style="text-decoration: none" title="Texte aligné à droite"><i class="fas fa-align-right"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en justifié', 'ce texte sera justifié', 'justify')" style="text-decoration: none" title="Texte justifié"><i class="fas fa-align-justify"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text_complement('contenue', 'Ecrivez ici l\'adresse de votre lien', 'https://www.exemple.com/', 'url', 'Entrez le texte de votre lien', 'Clique ici pour acceder a mon super lien')" style="text-decoration: none" title="lien"><i class="fas fa-link"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text_complement('contenue', 'Ecrivez ici l\'adresse de votre image', 'http://craftmywebsite.fr/forum/img/site_logo.png', 'img', 'Entrez ici le titre de votre image (laisser vide si vous ne voulez pas compléter', 'Titre')" style="text-decoration: none" title="image"><i class="fas fa-image"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text_complement('contenue', 'Ecrivez ici votre texte en couleur', 'Ce texte sera coloré', 'color', 'Entrer le nom de la couleur en anglais ou en hexaécimal avec le  # : http://www.code-couleur.com/', 'red ou #40A497')" style="text-decoration: none" title="couleur"><i class="fas fa-font"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text_complement('contenue', 'Ecrivez ici votre message caché', 'contenue du spoiler', 'spoiler', 'Entrer le titre du message caché (si la case est vide le titre sera \'Spoiler\'', 'Spoiler')" style="text-decoration: none" title="spoiler"><i class="fas fa-flag"></i></a>
					<div class="dropdown" style="display: inline">
						<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
							<i style="text-decoration:none;" class="fas fa-smile"></i>
						</button>
						<div class="dropdown-menu">
						<?php 
								$smileys = getDonnees($bddConnection);
								for($i = 0; $i < count($smileys['symbole']); $i++)
								{
									echo '<a class="dropdown-item" style="display: inline; padding: 0; white-space: normal;" href="javascript:insertAtCaret(\'contenue\',\' '.$smileys['symbole'][$i].' \')"><img src="'.$smileys['image'][$i].'" alt="'.$smileys['symbole'][$i].'" title="'.$smileys['symbole'][$i].'" /></a>';
								}
							?>
						</div>
					</div>
					<button type="button" onclick="copierText()" class="btn btn-secondary" title="Cliquer pour copier votre post"><i style="text-decoration:none;" class="fas fa-copy"></i></button>
					<button type="button" onclick="cutText()" class="btn btn-secondary" title="Cliquer pour couper votre post"><i style="text-decoration:none;" class="fas fa-cut"></i></button>
					<a class="btn btn-secondary" href="#" data-toggle="modal" data-target="#formlg"><i style="text-decoration:none;" class="fas fa-expand"></i></a>
				</div>
				<div class="form-group row text-center">
					<div class="col-md-12">
						<textarea id="contenue" name="contenue" maxlength="10000"  class="form-control" rows="10" required oninput="previewTopic(this);"></textarea>
						<div class="card-footer text-small">
						<label for="contenue" class="form-control-label">Max 10 000 caractères</label>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<br/>
				<div class="col-md-12">
				<div class="card border-secondary mb-auto">
					<div class="card-header">
						<h3 class="card-title text-center">Prévisualisation </h3>
					</div>
					<div class="card-body">
						<p style="height: auto; width: auto; background-color: white;" id="previewTopic"></p>
					</div>
				</div>
			</div>
			<div class="form-group row text-center">
				<center><button type="submit" class="btn btn-success">Poster</button></center>
			</div>
		</form>

		<div class="modal fade" id="formlg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Nouveau topic</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<form action="?&action=create_topic" method="post">
					<input type="hidden" name="id_categorie" value="<?php echo $id; ?>"/>
					<input type="hidden" name="sous-forum" value="<?php if(isset($id_sous_forum)) { echo $id_sous_forum; } else { echo 'NULL'; } ?>"/>
					<div class="form-group row">
						<label for="nom" class="col-sm-2 form-control-label">Rentrez le nom de votre topic</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nom" name="nom" placeholder="Le titre de votre topic ici" required />
						</div>
					</div>
					<div class="col-md-12">
						<div class="card border-secondary mb-auto">
							<div class="card-header">
							<a class="btn btn-secondary" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en gras', 'ce texte sera en gras', 'b')" style="text-decoration: none;" title="Texte en gras"><i class="fas fa-bold" aria-hidden="true"></i></a>
							<a class="btn btn-secondary" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en italique', 'ce texte sera en italique', 'i')" style="text-decoration: none;" title="Texte en italique"><i class="fas fa-italic"></i></a>
							<a class="btn btn-secondary" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en souligné', 'ce texte sera en souligné', 'u')" style="text-decoration: none;" title="Texte souligné"><i class="fas fa-underline"></i></a>
							<a class="btn btn-secondary" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en barré', 'ce texte sera barré', 's')" style="text-decoration: none;" title="Texte barré"><i class="fas fa-strikethrough"></i></a>
							<a class="btn btn-secondary" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en aligné à gauche', 'ce texte sera aligné à gauche', 'left')" style="text-decoration: none" title="Texte aligné à gauche"><i class="fas fa-align-left"></i></a>
							<a class="btn btn-secondary" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en centré', 'ce texte sera centré', 'center')" style="text-decoration: none" title="Texte centré"><i class="fas fa-align-center"></i></a>
							<a class="btn btn-secondary" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en aligné à droite', 'ce texte sera aligné à droite', 'right')" style="text-decoration: none" title="Texte aligné à droite"><i class="fas fa-align-right"></i></a>
							<a class="btn btn-secondary" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en justifié', 'ce texte sera justifié', 'justify')" style="text-decoration: none" title="Texte justifié"><i class="fas fa-align-justify"></i></a>
							<a class="btn btn-secondary" href="javascript:ajout_text_complement('contenue', 'Ecrivez ici l\'adresse de votre lien', 'https://www.exemple.com/', 'url', 'Entrez le texte de votre lien', 'Clique ici pour acceder a mon super lien')" style="text-decoration: none" title="lien"><i class="fas fa-link"></i></a>
							<a class="btn btn-secondary" href="javascript:ajout_text_complement('contenue', 'Ecrivez ici l\'adresse de votre image', 'http://craftmywebsite.fr/forum/img/site_logo.png', 'img', 'Entrez ici le titre de votre image (laisser vide si vous ne voulez pas compléter', 'Titre')" style="text-decoration: none" title="image"><i class="fas fa-image"></i></a>
							<a class="btn btn-secondary" href="javascript:ajout_text_complement('contenue', 'Ecrivez ici votre texte en couleur', 'Ce texte sera coloré', 'color', 'Entrer le nom de la couleur en anglais ou en hexaécimal avec le  # : http://www.code-couleur.com/', 'red ou #40A497')" style="text-decoration: none" title="couleur"><i class="fas fa-font"></i></a>
							<a class="btn btn-secondary" href="javascript:ajout_text_complement('contenue', 'Ecrivez ici votre message caché', 'contenue du spoiler', 'spoiler', 'Entrer le titre du message caché (si la case est vide le titre sera \'Spoiler\'', 'Spoiler')" style="text-decoration: none" title="spoiler"><i class="fas fa-flag"></i></a>
							<div class="dropdown" style="display: inline">
								<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
									<i style="text-decoration:none;" class="fas fa-smile"></i>
								</button>
								<div class="dropdown-menu">
								<?php 
										$smileys = getDonnees($bddConnection);
										for($i = 0; $i < count($smileys['symbole']); $i++)
										{
											echo '<a class="dropdown-item" style="display: inline; padding: 0; white-space: normal;" href="javascript:insertAtCaret(\'contenue\',\' '.$smileys['symbole'][$i].' \')"><img src="'.$smileys['image'][$i].'" alt="'.$smileys['symbole'][$i].'" title="'.$smileys['symbole'][$i].'" /></a>';
										}
									?>
								</div>
							</div>
							<button type="button" onclick="copierText()" class="btn btn-secondary" title="Cliquer pour copier votre post"><i style="text-decoration:none;" class="fas fa-copy"></i></button>
							<button type="button" onclick="cutText()" class="btn btn-secondary" title="Cliquer pour couper votre post"><i style="text-decoration:none;" class="fas fa-cut"></i></button>
							<a class="btn btn-secondary active" href="#" title="afficher en grand" disabled><i style="text-decoration:none;" class="fas fa-expand"></i></a>
						</div>
					<div class="form-group row">
						<div class="col-md-12">
							<textarea id="contenue" name="contenue" maxlength="10000"  class="form-control" rows="10" required oninput="previewTopic(this);"></textarea>
							<div class="card-footer text-small">
							<label for="contenue" class="form-control-label text-center">Max 10 000 caractères</label>
							</div>
						</div>
					</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" data-dismiss="modal">Poster</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
				</div>
				</form>
				</div>
			</div>
		</div>
		
		<script>
            function copierText() {
              var copyText = document.getElementById("contenue");
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
              var copyText = document.getElementById("contenue");
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
		<?php 
	}
	elseif(!isset($_Joueur_))
		echo '<div class="alert alert-warning text-center">Connectez-vous pour pouvoir interragir ! </div>';
	?></div>
</section>