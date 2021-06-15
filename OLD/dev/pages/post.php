<?php
require('modele/forum/date.php');
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	if(isset($_Joueur_['pseudo'])){
	$_JoueurForum_->topic_lu($id, $bddConnection);
	}
	$topicd = $_Forum_->getTopic($id);
	if(!empty($topicd['id']))
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
<header class="heading-pagination">
		<div class="container-fluid">
			<h1 class="text-uppercase wow fadeInRight" style="color:white;">Post: <?=$topicd['nom'];?></h1>
		</div>
	</header>
	<section class="layout" id="page">
	<div class="container">
	<nav class="nav nav-pills nav-justified">
		<?php if(isset($_Joueur_) && $_JoueurForum_->is_followed($id))
		{
			?>
			<a class="nav-link" href="?&action=unfollow&id_topic=<?php echo $topicd['id']; ?>">Ne plus suivre cette discussion </a>
				<?php
		}
		else if(isset($_Joueur_))
		{
			?>
			 | <a class="nav-link" href="?&action=follow&id_topic=<?php echo $topicd['id']; ?>">Suivre cette discussion</a>
				<?php
		}
		?>
		 | <a class="nav-link" href="?&page=forum_categorie&id=<?php echo $topicd['id_categorie']; if(isset($topicd['sous_forum'])) { ?>&id_sous_forum=<?php echo $topicd['sous_forum']; } ?>">Revenir à l'index de la catégorie</a>
		 | <a class="nav-link" href="?&page=forum">Revenir à l'index du forum</a>
	</nav><br/>
	<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb" style="front-size: 20px;">
			<li class="breadcrumb-item"><a href="/">Accueil</a></li>
			<li class="breadcrumb-item"><a href="?page=forum">Forum</a></li>
			<li class="breadcrumb-item"><a href="?&page=forum_categorie&id=<?php echo $topicd['id_categorie']; ?>"><?php echo $topicd['nom_categorie']; ?></a></li>
			<?php if(isset($topicd['sous_forum'])) { ?><li class="breadcrumb-item"><a href="?page=forum_categorie&id=<?php echo $topicd['id_categorie']; ?>&id_sous_forum=<?php echo $topicd['sous_forum']; ?>"><?php echo $topicd['nom_sf']; ?></a></li><?php } ?>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $topicd['nom']; ?></li>
		</ol>
	</nav>
	<?php if(isset($_Joueur_) AND ($_PGrades_['PermsForum']['moderation']['closeTopic'] == true OR $_PGrades_['PermsForum']['moderation']['deleteTopic'] == true OR $_PGrades_['PermsForum']['moderation']['mooveTopic'] == true OR $_Joueur_['rang'] == 1) AND !$_SESSION['mode']) { ?>
	<div class="row">
		<div class="col-md-4 offset-md-2">
			<div class="dropdown">
				<button class="btn btn-danger dropdown-toggle" type="button" id="Actions-Modération" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Actions de Modération .... <span class="caret"></span>
				</button>
				<div class="dropdown-menu list-inline" aria-labeledby="Actions-Modérations">
				<?php
				if($_PGrades_['PermsForum']['moderation']['closeTopic'] == true OR $_Joueur_['rang'] == 1)
				{
					if($topicd['etat'] == 1)
					{
						?><a class="dropdown-item" href="?&action=forum_moderation&id_topic=<?php echo $id; ?>&choix=4">Ouvrir la discussion</a><br/><?php
					}
					else
					{
						?><a class="dropdown-item" href="?&action=forum_moderation&id_topic=<?php echo $id; ?>&choix=1">Fermer la discussion</a><br/>
					<?php
					}
				}
				if($_PGrades_['PermsForum']['moderation']['deleteTopic'] == true OR $_Joueur_['rang'] == 1)
				{
					?>
					<a class="dropdown-item" href="?&action=forum_moderation&id_topic=<?php echo $id; ?>&choix=2">Supprimer le topic</a><br/>
					<?php
				}
				if($_PGrades_['PermsForum']['moderation']['mooveTopic'] == true OR $_Joueur_['rang'] == 1)
				{
					?>
					<a class="dropdown-item" href="?&action=forum_moderation&id_topic=<?php echo $id; ?>&choix=3">Déplacer la discussion</a><br/>
					<?php
				}
				?>
				</div>
			</div>
		</div>
		<div class="col-md-4 offset-md-2">
			<div class="dropdown">
				<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Niveau d'accès
				</button>
				<div class="dropdown-menu">
					<form class="px-4 py-3" action="?action=modifPermsTopics" method="POST">
					    <div class="form-group">
					      <label>Niveau de permission</label>
					      <input type="hidden" name="id" value="<?=$id;?>">
					      <input type="number" min="0" max="100" class="form-control" name="perms" value="<?=$topicd['perms'];?>">
					    </div>
					    <button type="submit" class="btn btn-primary">Modifier</button>
					</form>
				</div>
			</div>
		</div>
	</div><?php } ?>
	<h3>Sujet : <?php echo $topicd['nom']; ?></h3><br/>
	<div class="row">
		<div class="col-md-2">
		<!-- Div de droite où on met le profil de l'auteur -->
		<center><?php
			$Img = new ImgProfil($topicd['pseudo'], 'pseudo');
			?>
			<img class="rounded" src="<?=$Img->getImgToSize(128, $width, $height);?>" style="width: <?=$width;?>px; height: <?=$height;?>px;" alt="avatar de l'auteur" title="<?php echo $topicd['pseudo']; ?>" /></center>
			<p class="username text-center"><?php echo $topicd['pseudo']; ?><br/>
			<?php echo $_Forum_->gradeJoueur($topicd['pseudo']); ?> </p>
		</div>
		<div class="col-md-10">
		<!-- Contenue du topic de l'auteur -->
			<div style="text-overflow: clip; word-wrap: break-word;"><?php unset($contenue);
			$contenue = espacement($topicd['contenue']);
			$contenue = BBCode($contenue, $bddConnection);
			echo $contenue;
			?></div><br/><div style="border-top: 0.5px grey solid;"></div>
			<hr/>
			<?php
			$signature = $_Forum_->getSignature($topicd['pseudo']);
			$signature = espacement($signature);
			$signature = BBCode($signature, $bddConnection);
			echo $signature;
			?>
			<p class="text-right text-muted">Posté le <?php  echo $topicd['jour']; ?> <?php $mois = switch_date($topicd['mois']); echo $mois; ?> <?php echo $topicd['annee'];?>  <?php if($topicd['d_edition'] != NULL) { echo 'édité le '; $d_edition = explode('-', $topicd['d_edition']); echo $d_edition[2]; echo '/' .$d_edition[1]. '/' .$d_edition[0]. ''; } ?></p>
		</div>
	</div>
	<div class="row">
		<?php
		if(isset($_Joueur_)){?>
		<div class="col-md-2">
			<form action="?&action=signalement_topic" method="post">
				<input type="hidden" name="id_topic2" value='<?php echo $id; ?>' />
				<button type="submit" class="btn btn-primary">Signaler !</button>
			</form>
		</div>
		<?php }?>
	<?php if(isset($_Joueur_) && ($_Joueur_['pseudo'] == $topicd['pseudo'] OR ($_Joueur_['rang'] == 1 OR $_PGrades_['PermsForum']['general']['editTopic'] == true) AND !$_SESSION['mode']))
	{
		?><div class="col-md-2"><form action="?action=editForum" method="post">
			<input type="hidden" name="objet" value="topic"/>
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<button type="submit" class="btn btn-rounded btn-default">Editer le topic</button>
		</form>
		</div>
		<?php
	}
		if(isset($_Joueur_) && ($_Joueur_['pseudo'] == $topicd['pseudo'] OR ($_Joueur_['rang'] == 1 OR $_PGrades_['PermsForum']['general']['deleteTopic'] == true) AND !$_SESSION['mode']))
		{
			?>
		<div class="col-md-2">
		<form action="?action=remove_topic" method="post">
			<input type="hidden" name="id_topic" value="<?php echo $id; ?>" />
			<a class="btn btn-round btn-default" role="button" data-toggle="collapse" href="#topic_<?php echo $id; ?>" aria-expanded="false" aria-controls="collapseExample" >
				Supprimer ce topic ? </a>
				<div class="collapse" id="topic_<?php echo $id; ?>">
					<div class="well">
						<button type="submit" class="btn btn-round btn-warning">Confirmer la suppression du topic </button>
					</div>
				</div>
		</form>
		</div><?php
		}
	?>
	</div>
	<?php
	$countlike = $_Forum_->compteLike($topicd['id'], $count1, 1);
	$countdislike = $_Forum_->compteDisLike($topicd['id'], $count2, 1);
	if($count1 > 0 OR $count2 > 0)
	{
		echo '<div class="row justify-content-end"><div class="col-md-2">';
		if($count1 > 0)
			echo $count1.' personnes aiment ça.<br/>';

		if($count2 > 0)
			echo $count2.' personnes n\'aiment pas ça';

		echo '</div></div>';
	}
	if(isset($_Joueur_))
	{
		if(array_search($_Joueur_['pseudo'], array_column($countlike, 'pseudo')) === FALSE AND array_search($_Joueur_['pseudo'], array_column($countdislike, 'pseudo')) === FALSE AND $_Joueur_['pseudo'] != $topicd['pseudo'])
		{
			?>
			<div class="row justify-content-end"><div class="col-md-1">
					<form class="form-inline" action="?&action=like" method="post">
						<input type="hidden" name="choix" value="1" />
						<input type="hidden" name="type" value="1" />
						<input type="hidden" name="id_answer" value="<?php echo $topicd['id']; ?>" />
						<button type="submit" class="btn btn-primary" title="J'aime" ><i class="far fa-thumbs-up"></i></button>
					</form></div><div class="col-md-1">
					<form class="form-inline" action="?&action=like" method="post">
						<input type="hidden" name="choix" value="2" />
						<input type="hidden" name="type" value="1" />
						<input type="hidden" name="id_answer" value="<?php echo $topicd['id']; ?>" />
						<button type="submit" class="btn btn-primary" title="Je n'aime pas"><i class="far fa-thumbs-down"></i></button>
					</form>
				</div>
			</div>
			<?php
		}
		elseif(array_search($_Joueur_['pseudo'], array_column($countlike, 'pseudo')) !== FALSE OR array_search($_Joueur_['pseudo'], array_column($countdislike, 'pseudo')) !== FALSE)
		{
			?><div class="row justify-content-end">
				<div class="col-md-1">
					<form class='form-inline' action="?&action=unlike" method="post">
						<input type="hidden" name="id_answer" value="<?php echo $topicd['id']; ?>" />
						<input type="hidden" name="type" value="1" />
						<button type="submit" class="btn btn-primary" title="Ne plus aimer">Retirer</button>
					</form>
				</div>
			</div><?php

		}
	}
	?>
	<!-- Affichage des réponses -->
	 <?php
    $count_Max = $_Forum_->compteReponse($id);
    $count_nbrOfPages = ceil($count_Max / 20);

    if(isset($_GET['page_post']))
    {
        $page = $_GET['page_post'];
    } else {
        $page = 1;
    }

    $count_FirstDisplay = ($page - 1) * 20;
	$answerd = $_Forum_->affichageReponse($id, $count_FirstDisplay);
    for($i = 0; $i < count($answerd); $i++)
	{ ?>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<div id="<?php echo $answerd[$i]['id']; ?>"> <!-- div de droite avec les infos joueurs -->
					<center><?php
					$Img = new ImgProfil($answerd[$i]['pseudo'], 'pseudo');
					?>
					<img src="<?=$Img->getImgToSize(128, $width, $height);?>" style="width: <?=$width;?>px; height: <?=$height;?>px;" alt="avatar de l'auteur" title="<?php echo $answerd[$i]['pseudo']; ?>" /></center>
					<p class="username text-center"><?php echo $answerd[$i]['pseudo']; ?><br/>
						<?php echo $_Forum_->gradeJoueur($answerd[$i]['pseudo']); ?>
					</p>
				</div>
			</div>
			<div class="col-md-10"> <!-- contenue de la réponse -->
				<div style="text-overflow: clip; word-wrap: break-word;"><?php $answere = $answerd[$i]['contenue'];
				$answere = espacement($answere);
				$answere = BBCode($answere, $bddConnection);
				echo $answere;
				?></div>
				<hr/>
				<?php
				$signature = $_Forum_->getSignature($answerd[$i]['pseudo']);
				$signature = espacement($signature);
				$signature = BBCode($signature, $bddConnection);
				echo $signature;
				?>
				<p class="text-right text-muted"><?php echo $answerd[$i]['day']; ?> <?php $answerd[$i]['mois'] = switch_date($answerd[$i]['mois']); echo $answerd[$i]['mois']; ?> <?php echo $answerd[$i]['annee']; ?> <?php if($answerd[$i]['d_edition'] != NULL){ echo 'édité le '; $d_edition = explode('-', $answerd[$i]['d_edition']); echo '' .$d_edition[2]. '/' .$d_edition[1]. '/' .$d_edition[0]. ''; } ?> </p>
			</div>
		</div>

		<?php if(isset($_Joueur_)){ ?>
		<div class="row">
		<div class="col-md-2">
			<form action="?&action=signalement" method="post">
				<input type="hidden" name="id_answer" value='<?php echo $answerd[$i]['id']; ?>' />
				<button type="submit" class="btn btn-primary">Signaler !</button>
			</form></div>
			<?php
			$countlike = $_Forum_->compteLike($answerd[$i]['id'], $count, 2);
			if($count > 0)
			{
				if($count >= 3)
				{
					echo '<div class="col-md-2">';
					for($z = 0; $z < count($countlike); $z++)
					{
						echo ' ';
						echo $countlike[$z]['pseudo'];
						echo ',';
					}
					echo ' aiment ça ';
					?><a href="?&page=list_like&id_answer=<?php echo $answerd[$i]['id']; ?>" title="liste des j'aimes">Liste</a></div><?php
				}
				if($count > 1 && $count < 3)
				{
					echo '<div class="col-md-2">';
					for($z = 0; $z < count($countlike); $z++)
					{
						echo ' ';
						echo $countlike[$z]['pseudo'];
						echo ',';
					}
					echo ' aiment ça </div>';
				}
				elseif($count == 1)
				{
					echo '<div class="col-md-2">';
					echo ' ';
					echo $likedata[0]['pseudo'];
					echo ' aime ça </div>';
				}
			}
			$countdislike = $_Forum_->compteDisLike($answerd[$i]['id'], $count, 2);
			if($count > 0)
			{
				if($count > 3)
				{
					echo '<div class="col-md-2">';
					for($z = 0; $z < count($countdislike); $z++)
					{
						echo ' ';
						echo $countdislike[$z]['pseudo'];
						echo ',';
					}
					echo ' n\'aiment ça';
					?><a href="?&page=list_unlike&id_answer=<?php echo $answerd[$i]['id']; ?>" title="liste des Je n'aime pas">Liste</a></div><?php
				}
				if($count > 1 AND $count < 3)
				{
					echo '<div class="col-md-2">';
					for($z = 0; $z < count($countdislike); $z++)
					{
						echo ' ';
						echo $countdislike[$z]['pseudo'];
						echo ',';
					}
					echo ' n\'aiment ça </div>';
				}
				elseif($count == 1)
				{
					echo '<div class="col-md-2"> ';
					echo $countdislike[0]['pseudo'];
					echo ' n\'aime pas ça</div>';
				}
			}
			$test_votedata = $_Forum_->testVote($answerd[$i]['id'], htmlspecialchars($_Joueur_['pseudo']));
			if(empty($test_votedata['count']) && $_Joueur_['pseudo'] != $answerd[$i]['pseudo'])
			{
				?><div class="col-md-1">
				<form class="form-inline" action="?&action=like" method="post">
					<input type="hidden" name="choix" value="1" />
					<input type="hidden" name="id_answer" value="<?php echo $answerd[$i]['id']; ?>" />
					<button type="submit" class="btn btn-primary" title="J'aime" ><i class="far fa-thumbs-up"></i></button>
				</form></div><div class="col-md-1">
				<form class="form-inline" action="?&action=like" method="post">
					<input type="hidden" name="choix" value="2" />
					<input type="hidden" name="id_answer" value="<?php echo $answerd[$i]['id']; ?>" />
					<button type="submit" class="btn btn-primary" title="Je n'aime pas"><i class="far fa-thumbs-down"></i></button>
				</form></div>
				<?php
			}
			elseif($_Joueur_['pseudo'] != $answerd[$i]['pseudo'] AND $test_votedata['count'] > 0)
			{
				?><div class="col-md-1">
				<form class='form-inline' action="?&action=unlike" method="post">
					<input type="hidden" name="id_answer" value="<?php echo $answerd[$i]['id']; ?>" />
					<button type="submit" class="btn btn-primary" title="Ne plus aimer">Retirer</button>
				</form></div>
				<?php
			}
			if($_Joueur_['pseudo'] === $answerd[$i]['pseudo'] OR ($_PGrades_['PermsForum']['moderation']['editMessage'] == true OR $_Joueur_['rang'] == 1) AND !$_SESSION['mode'])
			{
				?><div class="col-md-2"><form action="?action=editForum" method="post">
					<input type="hidden" name="objet" value="answer" />
					<input type="hidden" name="id" value="<?php echo $answerd[$i]['id']; ?>" />
					<button type="submit" class="btn btn-default">Editer ce message</button>
				</form></div>
				<?php
			}
			if($_Joueur_['pseudo'] === $answerd[$i]['pseudo'] OR ($_PGrades_['PermsForum']['moderation']['deleteMessage'] == true OR $_Joueur_['rang'] == 1) AND !$_SESSION['mode'])
			{
				?>
			<div class="col-md-2">
				<form action="?action=remove_answer" method="post">
					<input type="hidden" name="id_answer" value="<?php echo $answerd[$i]['id']; ?>" />
					<input type="hidden" name="page" value="<?php if(isset($_GET['page_post'])) { echo $_GET['page_post']; } else { echo '1'; }?>" />
					<a role="button" class="btn btn-primary" data-toggle="collapse" href="#answer_<?php echo $answerd[$i]['id']; ?>" aria-expanded="false" aria-controls="collapseExample">
						Supprimer ce message ? </a>
						<div class="collapse" id="answer_<?php echo $answerd[$i]['id']; ?>">
							<div class="well">
								<button type="submit" class="btn btn-round btn-warning">Confirmer </button>
							</div>
						</div>
				</form></div><?php
			}
			?>
		<?php }
		?>
		</div><?php
	}

	?><br/>
	<nav aria-label="Page Navigation Post">
		<ul class="pagination justify-content-center"><?php
			for($i = 1; $i <= $count_nbrOfPages; $i++)
			{
                ?><li class="page-item"><a href="?&page=post&id=<?php echo $id; ?>&page_post=<?php echo $i; ?>"><?php echo $i;
                ?></a></li><?php
			} ?>
        </ul>
	</nav>
	 <br/><?php

	 if($topicd['etat'] == 1 AND (($_Joueur_['rang'] != 1 OR $_PGrades_['PermsForum']['general']['seeForumHide'] != true) AND $_SESSION['mode']))
	 {
		 ?><div class="alert alert-info" role="alert">Le topic est fermé ! Aucune réponse n'est possible ! </div><?php
	 }
	 elseif(isset($_Joueur_) && ($topicd['etat'] == 0 OR (($_Joueur_['rang'] == 1 OR $_PGrades_['PermsForum']['general']['seeForumHide'] == true) AND !$_SESSION['mode'])))
	 {
		$data = $_Forum_->isLock($topicd['id_categorie']);
		if($data['close'] == 0 OR ($_Joueur_['rang'] == 1 OR $_PGrades_['PermsForum']['general']['seeForumHide'] == true) AND !$_SESSION['mode'])
		{
		 ?><hr/><div class="separator" style="border-top: 1px solid black;"></div>
	<form action="?&action=post_answer" method="post">
		<p>
		<input type='hidden' name="id_topic" value="<?php echo $id; ?>"/>
		<div class="form-group row">
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
					<a class="btn btn-secondary" href="javascript:ajout_text_complement('contenue', 'Ecrivez ici l\'adresse de votre image', 'https://craftmywebsite.fr/forum/img/site_logo.png', 'img', 'Entrez ici le titre de votre image (laisser vide si vous ne voulez pas compléter', 'Titre')" style="text-decoration: none" title="image"><i class="fas fa-image"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text_complement('contenue', 'Ecrivez ici votre texte en couleur', 'Ce texte sera coloré', 'color', 'Entrer le nom de la couleur en anglais ou en hexaécimal avec le  # : http://www.code-couleur.com/', 'red ou #40A497')" style="text-decoration: none" title="couleur"><i class="fas fa-font"></i></a>
					<a class="btn btn-secondary" href="javascript:ajout_text_complement('contenue', 'Ecrivez ici votre message caché', 'contenue du spoiler', 'spoiler', 'Entrer le titre du message caché (si la case est vide le titre sera \'Spoiler\'', 'Spoiler')" style="text-decoration: none" title="spoiler"><i class="fas fa-flag"></i></a>
					<div class="dropdown" style="display: inline">
						<a href="#" class="btn btn-secondary dropdown-toggle" role="button" id="font" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						 Taille du texte
						</a>
						<div class="dropdown-menu" aria-labelledby="font">
							<a class="dropdown-item" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en taille 2', 'ce texte sera en taille 2', 'font=2')"><span style="font-size: 2em;">2</span></a>
							<a class="dropdown-item" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en taille 5', 'ce texte sera en taille 5', 'font=5')"><span style="font-size: 5em;">5</span></a>
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
									echo '<a class="dropdown-item" style="display: inline; padding: 0; white-space: normal;" href="javascript:insertAtCaret(\'contenue\',\' '.$smileys['symbole'][$i].' \')"><img src="'.$smileys['image'][$i].'" alt="'.$smileys['symbole'][$i].'" title="'.$smileys['symbole'][$i].'" /></a>';
								}
							?>
						</div>
					</div>
					<button type="button" onclick="copierText()" class="btn btn-secondary" title="Cliquer pour copier votre post"><i style="text-decoration:none;" class="fas fa-copy"></i></button>
					<button type="button" onclick="cutText()" class="btn btn-secondary" title="Cliquer pour couper votre post"><i style="text-decoration:none;" class="fas fa-cut"></i></button>
					<a class="btn btn-secondary" href="#" data-toggle="modal" data-target="#formlg"><i style="text-decoration:none;" class="fas fa-expand"></i></a>
				</div>
				<textarea class="form-control" name="contenue" id="contenue" maxlength="10000" rows="20" oninput="previewTopic(this);" required></textarea>
			<div class="col-md-12">
				<center><label class="form-control-label">Prévisualisation</label></center>
				<p style="height: auto; width: auto; background-color: white;" id="previewTopic"></p>
			</div>
				<button type="submit" class="btn btn-primary">Poster votre réponse</button>
		</div>
		</div>
		</p>
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
				<form action="?&action=post_answer" method="post">
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
								<a href="#" class="btn btn-secondary dropdown-toggle" role="button" id="font" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Taille du texte
								</a>
								<div class="dropdown-menu" aria-labelledby="font">
									<a class="dropdown-item" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en taille 2', 'ce texte sera en taille 2', 'font=2')"><span style="font-size: 2em;">2</span></a>
									<a class="dropdown-item" href="javascript:ajout_text('contenue', 'Ecrivez ici ce que vous voulez mettre en taille 5', 'ce texte sera en taille 5', 'font=5')"><span style="font-size: 5em;">5</span></a>
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
							<br/>
							<hr>
							<p style="height: auto; width: auto; background-color: white;" id="previewTopic"></p>
							</div>
						</div>
					</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" data-dismiss="modal">Répondre</button>
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
	 }
	 ?>
	 	</div>
</section>
<?php
	}
	else
	{
		header('Location: index.php');
	}
}
else
	header('Location: ?page=erreur&erreur=17');//fatale
?>
