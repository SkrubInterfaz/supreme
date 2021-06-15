<section class="jumbotron jumbotron-carousel jumbotron-video" style="margin-top:-20px;">
    <div class="player" data-property="{videoURL:'<?php echo $_Theme_['All']['YT'] ?>',containment:'body',autoPlay:true, mute:true, startAt:0, opacity:1}">En attente de la plateforme vidéo</div>
    <div class="jumbotron-mask"></div>
    <div class="jumbotron-body">
        <div class="container">
            <h2 class="hvr-pulse wow bounceIn" data-wow-delay="1s" ata-wow-duration="1s"><?php echo $_Serveur_['General']['name'] ?></h2>
            <h3 class="hvr-pulse wow bounceIn" data-wow-delay="1s" ata-wow-duration="1s"><?php echo $_Serveur_['General']['description'] ?></h3>
			<input type="text" value="<?php echo $_Serveur_['General']['ipTexte']; ?>" id="myInput" style="opacity: 0">
		  	<?php if($_Serveur_['General']['statut'] == 0)
                { ?>
				<center><button onclick="myFunction()" class="btn btn-normal btn-primary btn-ip hvr-pulse wow bounceIn" data-wow-delay="1s" data-wow-duration="1s"><?php echo $_Serveur_['General']['ipTexte']; ?></button>
				<?php
				}
                elseif($_Serveur_['General']['statut'] == 1)
                { ?>
				<center><button onclick="myFunction()" class="btn btn-normal btn-success btn-ip hvr-pulse wow bounceIn" data-wow-delay="1s" ata-wow-duration="1s"><?php echo $_Serveur_['General']['ipTexte']; ?></button>
					  <br/>
                    <strong class='text-success'>(En Ligne : <?php echo $playeronline ?> / <?php echo $maxPlayers ?> )</strong>
				<?php
				}
                else{ ?>
				<center><button onclick="myFunction()" onmouseover="mypreFunction()" class="btn btn-normal btn-danger btn-ip hvr-pulse wow bounceIn" data-wow-delay="1s" ata-wow-duration="1s"><?php echo $_Serveur_['General']['ipTexte']; ?></button>
			<?php } ?>
			<script>
            function myFunction() {
              var copyText = document.getElementById("myInput");
              copyText.select();
			  document.execCommand("copy");
			  toastr["success"]("Vous avez copier l'adresse IP du serveur !", "Succés");
			  toastr.options = {
				"closeButton": true,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-bottom-left",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "1000",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
				}
            }
			<?php if($_Serveur_['General']['statut'] == 0)
            { ?>// Offline
			function mypreFunction() {

			toastr["error"]("[Infos] Serveur hors ligne");
			toastr.options = {
				"closeButton": true,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-bottom-center",
				"preventDuplicates": true,
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
			<?php
				}
                elseif($_Serveur_['General']['statut'] == 1)
                { ?>//Online
			function mypreFunction() {

			toastr["success"]("[Infos] Serveur en ligne (Cliquer pour copier l'ip)");
			toastr.options = {
				"closeButton": true,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-bottom-center",
				"preventDuplicates": true,
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
			<?php
				}
                else{ ?>//Service outrage
			function mypreFunction() {

			toastr["warning"]("[Infos] Serveur en maintenance");
			toastr.options = {
				"closeButton": true,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-bottom-center",
				"preventDuplicates": true,
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
			<?php } ?>
    </script>
        </div>
    </div>
</section>
<section class="content-item grey" id="services">
    <div class="container">
        <div class="content-headline">
            <h2 class="wow fadeInDown" wow-data-delay="0.5">Pourquoi nous ?</h2>
        </div>
        <div class="row">
            <div class="col-sm-4 wow fadeInDown" wow-data-delay="0.6">
			<?php echo $_Theme_['All']['1']['icone']; ?>
                <h4><?php echo $_Theme_['All']['1']['titre']; ?></h4>
                <p><?php echo $_Theme_['All']['1']['texte']; ?></p>
            </div>
            <div class="col-sm-4 wow fadeInDown" wow-data-delay="0.7">
			<?php echo $_Theme_['All']['2']['icone']; ?>
				<h4><?php echo $_Theme_['All']['2']['titre']; ?></h4>
                <p><?php echo $_Theme_['All']['2']['texte']; ?></p>
            </div>
            <div class="col-sm-4 wow fadeInDown" wow-data-delay="0.8">
            <?php echo $_Theme_['All']['3']['icone']; ?>
				<h4><?php echo $_Theme_['All']['3']['titre']; ?></h4>
                <p><?php echo $_Theme_['All']['3']['texte']; ?></p>
            </div>
        </div>
    </div>
</section>
<section class="content-item" id="about-project">
    <div class="container">
        <div class="project-feature">
            <div class="row">
                <div class="col-md-6 hidden-sm wow pulse">
                    <img src="<?php echo $_Theme_['img']['banner'];?>" class="img-responsive" alt="" style="height:300px;">
                </div>
                <div class="col-md-6">
                    <h3>Nos avantages</h3>
                    <ul class="list-unstyled">
					<?php for($i = 1; $i < count($_Theme_['Infos']) + 1; $i++)
					{ ?>
						<li class="wow bounce" wow-data-delay="<?php echo $i ?>s"><?php echo $_Theme_['Infos'][$i]['message']; ?></li>
					<?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content-item wow bounceInLeft" id="statistics">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-3">
                <div class="counter-item">
                    <i class="fa fa-user"></i>
                    <p><span class="counter"><?php $req_nbrMembre2 = $bddConnection->query('SELECT * FROM cmw_users'); $Membretotal = $req_nbrMembre2->rowCount(); echo $Membretotal;?></span></p>
                    <h4>Membres inscrit</h4>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="counter-item">
                    <i class="fa fa-pencil"></i>
                    <p><span class="counter">850</span></p>
                    <h4>Lignes de code</h4>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="counter-item">
                    <i class="fa fa-trophy"></i>
                    <p><span class="counter">4</span></p>
                    <h4>Années d'expérience</h4>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="counter-item">
                    <i class="fa fa-coffee"></i>
                    <p><span class="counter">5</span></p>
                    <h4>Tasse de café</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content-item grey wow bounceInLeft">
    <div class="container">
        <div class="content-headline">
            <h2>News</h2>
            <h3>Suivez nos informations</h3>
        </div>
        <div class="row">
				<?php
				$i = 0;
				if(isset($news))
					while($i < count($news))
					{

						$getCountCommentaires = $accueilNews->countCommentaires($news[$i]['id']);
						$countCommentaires = $getCountCommentaires->rowCount();

						$getcountLikesPlayers = $accueilNews->countLikesPlayers($news[$i]['id']);
						$countLikesPlayers = $getcountLikesPlayers->rowCount();
						$namesOfPlayers = $getcountLikesPlayers->fetchAll();

						$getNewsCommentaires = $accueilNews->newsCommentaires($news[$i]['id']);
						?>

						<div class="panel panel-default" style="border-radius:0px;margin-left: 5px;margin-right: 5px;">

							<div class="panel-heading"><?php echo $news[$i]['titre']; ?>
							<?php
							unset($Img);
							$Img = new ImgProfil($news[$i]['auteur'], 'pseudo');
							?>
								<a class="tooltips2 pull-right" href="index.php?&page=profil&profil=<?php echo $news[$i]['auteur']; ?>"><img src="<?=$Img->getImgToSize(24, $width, $height);?>" style="width: <?=$width;?>px; height: <?=$height;?>px;border-radius: 15%" alt="<?php echo $news[$i]['auteur']; ?>.png"/><span> <?php echo $news[$i]['auteur']; ?></span></a>
							</div> <!-- Heading -->

							<div class="panel-body"><?php echo $news[$i]['message']; ?>
							</div> <!-- Body -->

							<div class="panel-footer"><?php echo 'Posté le '.date('d/m/Y', $news[$i]['date']).' &agrave; '.date('H:i:s', $news[$i]['date']); ?> par <strong><a href="index.php?&page=profil&profil=<?php echo $news[$i]['auteur']; ?>"><?php echo $news[$i]['auteur']; ?></a></strong>

								<?php
								if(isset($_Joueur_)) {
									$reqCheckLike = $accueilNews->checkLike($_Joueur_['pseudo'], $news[$i]['id']);
									$getCheckLike = $reqCheckLike->fetch();
									$checkLike = $getCheckLike['pseudo'];
									if($_Joueur_['pseudo'] == $checkLike) {
										echo '<div style="float: right;">
										<a href="#" data-toggle="modal" data-target="#news'.$news[$i]['id'].'"><i class="glyphicon glyphicon-comment" aria-hidden="true"></i> '.$countCommentaires.' Commentaires</a></div>';
									} else {
										echo '<div style="float: right;">
										<a href="?&action=likeNews&id_news='.$news[$i]['id'].'"><i class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></i> J\'aime !</a> | <a href="#" data-toggle="modal" data-target="#news'.$news[$i]['id'].'"><i class="glyphicon glyphicon-comment" aria-hidden="true"></i> '.$countCommentaires.' Commentaires</a></div>';
									}
								} else {
									echo '<div style="float: right;">
									<a href="#" data-toggle="modal" data-target="#news'.$news[$i]['id'].'"><i class="glyphicon glyphicon-comment" aria-hidden="true"></i> '.$countCommentaires.' Commentaires</a></div>';
								}

								if($countLikesPlayers != 0) {
									echo '&nbsp;|&nbsp;<a href="#" class="tooltips2 pull-right"><i class="glyphicon glyphicon-thumbs-up"></i> '.$countLikesPlayers;
									//foreach ($namesOfPlayers as $likesPlayers) {
									//	echo $likesPlayers['pseudo'];
									//}
									echo '</span></a></div>';
								}
								?>

							</div> <!-- Footer -->
						</div> <!-- Primary -->

						<div class="modal fade" id="<?php echo "news".$news[$i]['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-support">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<center><h4 class="modal-title" id="myModalLabel"><B><?php echo $news[$i]['titre']; ?></B></h4></center>
									</div> <!-- Modal-Header -->
									<div class="modal-body">
									</br>
									<center><h3 class="ticket-commentaire-titre"><B><?php echo $countCommentaires." Commentaires"; ?></B></h3></center>

									<?php
									while($newsComments = $getNewsCommentaires->fetch()) {
										if(isset($_Joueur_)) {

											$getCheckReport = $accueilNews->checkReport($_Joueur_['pseudo'], $newsComments['pseudo'], $news[$i]['id'], $newsComments['id']);
											$checkReport = $getCheckReport->rowCount();

											$getCountReportsVictimes = $accueilNews->countReportsVictimes($newsComments['pseudo'], $news[$i]['id'], $newsComments['id']);
											$countReportsVictimes = $getCountReportsVictimes->rowCount();
										}
										?>

										<div class="panel panel-default">
											<div class="panel-body">
												<div class="ticket-commentaire">
													<div class="left-ticket-commentaire">
														<span class="img-ticket-commentaire">
															<img src="<?=$_Serveur_['General']['url'];?>/include/SkinApi/skin.php?p=<?=$newsComments['pseudo'];?>&type=head&size=24" alt="<?php echo $newsComments['pseudo']; ?>" />
														</span>
														<span class="desc-ticket-commentaire">
															<span class="ticket-commentaire-auteur"><?php echo '<B> - '.$newsComments['pseudo'].'</B>'; ?>
															</span>
															<span class="ticket-commentaire-date"><?php echo '<B>Le '.date('d/m', $newsComments['date_post']).' à '.date('H:i:s', $newsComments['date_post']).'</B>'; ?>
															</span>
															<?php if(isset($_Joueur_)) { ?>
																<span class="ticket-commentaire-action pull-right">
																	<span style="color: red;"><?php if($newsComments['nbrEdit'] != "0"){echo 'Nombre d\'édition: '.$newsComments['nbrEdit'].' | ';}if($countReportsVictimes != "0"){echo '<B>'.$countReportsVictimes.' Signalement</B> |';} ?></span>
																	<div class="dropdown">
																		<a type="button" class="btn btn-info collapsed" data-toggle="dropdown" style="font-size: 10px;">Action <b class="caret"></b></a>
																		<ul class="dropdown-menu">
																			<?php if($newsComments['pseudo'] == $_Joueur_['pseudo'] OR $_Joueur_['rang'] == 1) {
																				echo '<li><a href="#" data-toggle="modal" data-target="#news'.$news[$i]['id'].'-'.$newsComments['id'].'-edit">Editer</a></li>';
																				echo '<li><a href="?&action=delete_news_commentaire&id_comm='.$newsComments['id'].'&id_news='.$news[$i]['id'].'&auteur='.$newsComments['pseudo'].'">Supprimer</a></li>';
																			}
																			if($newsComments['pseudo'] != $_Joueur_['pseudo']) {
																				if($checkReport == "0") {
																					echo '<li><a href="?&action=report_news_commentaire&id_news='.$news[$i]['id'].'&id_comm='.$newsComments['id'].'&victime='.$newsComments['pseudo'].'">Signaler</a></li>';
																				} else {
																					echo '<li><a href="#">Déjà report</a></li>';
																				}
																			} ?>
																		</ul>
																	</div> <!-- dropdown -->
																</span>
																<?php } ?>
															</span>
														</div>
														<div class="right-ticket-commentaire">
															<?php echo $newsComments['commentaire']; ?>
														</div>
													</div> <!-- Ticket-Commentaire-->
												</div> <!-- Panel-Body -->
											</div> <!-- Panel Panel-Default -->
											<?php } ?>
										</div> <!-- Modal-Body -->
										<?php
										if(isset($_Joueur_)) { ?>
											<div class="modal-footer">
												<form action="?&action=post_news_commentaire&id_news=<?php echo $news[$i]['id']; ?>" method="post">
													<textarea name="commentaire" class="form-control" rows="3" style="resize: none;" maxlength="255" required></textarea>
													<center><h4><B>Minimum de 6 caractères<br>Maximum de 255 caractères</B></h4></center>
												</br>
												<center><div class="btn-container"><button type="submit" class="btn standard-btn">Commenter</button></div></center>
											</form>
										<!-- </div> -->
									</div> <!-- Modal-Footer -->
									<?php } else { ?>
										<div class="modal-footer">
											<center><div class="alert alert-danger">Veuillez-vous connecter pour mettre un commentaire.</div></center>
											<center><a data-toggle="modal" data-target="#ConnectionSlide" class="btn danger-btn">Connexion</a></center>
										</div> <!-- Modal-Footer -->
										<?php } ?>
									</div> <!-- Modal-Content -->
								</div> <!-- Modal-Dialog Modal-Support -->
							</div> <!-- Modal-Fade -->

							<?php if(isset($_Joueur_)) {
								$getNewsCommentaires = $accueilNews->newsCommentaires($news[$i]['id']);
								while($newsComments = $getNewsCommentaires->fetch()) {
									$reqEditCommentaire = $accueilNews->editCommentaire($newsComments['pseudo'], $news[$i]['id'], $newsComments['id']);
									$getEditCommentaire = $reqEditCommentaire->fetch();
									$editCommentaire = $getEditCommentaire['commentaire'];
									if($newsComments['pseudo'] == $_Joueur_['pseudo'] OR $_Joueur_['rang'] == 1) {  ?>
										<div class="modal fade" id="news<?php echo $news[$i]['id'].'-'.$newsComments['id'].'-edit'; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-support">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<center><h4 class="modal-title" id="myModalLabel">Edition du commentaire</h4></center>
													</div>
													<form action="?&action=edit_news_commentaire&id_news=<?php echo $news[$i]['id'].'&auteur='.$newsComments['pseudo'].'&id_comm='.$newsComments['id']; ?>" method="post">
														<div class="modal-body">
															<textarea name="edit_commentaire" class="form-control" rows="3" style="resize: none;" maxlength="255" required><?php echo $editCommentaire; ?></textarea>
														</div>
														<div class="modal-footer">
															<center><h4><B>Minimum de 6 caractères<br>Maximum de 255 caractères</B></h4></center></br>
															<center><div class="btn-container"><button type="submit" class="btn standard-btn">Valider la modification</button></div></center>
														</div>
													</form>
												</div><!-- /.modal-content -->
											</div><!-- /.modal-dialog -->
										</div><!-- /.modal -->
										<?php }
									}
								} ?>

								<?php $i++; 
								}
								else
									echo '<div class="alert alert-warning">Aucune news n\'a été créé à ce jour...</div>'; ?>
							</div>
    </div>
</section>
