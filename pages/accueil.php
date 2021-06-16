<section class="jumbotron jumbotron-carousel jumbotron-video" style="margin-top:-20px;">
    <div class="player"
        data-property="{videoURL:'<?php echo $_Theme_['All']['YT'] ?>',containment:'body',autoPlay:true, mute:true, startAt:0, opacity:1}">
        En attente de la plateforme vidéo</div>
    <div class="jumbotron-mask"></div>
    <div class="jumbotron-body">
        
    <div class="container">
            <h2><?php echo $_Serveur_['General']['name'] ?></h2>
            <h3><?php echo $_Serveur_['General']['description'] ?></h3>
			<input type="text" value="<?php echo $_Serveur_['General']['ipTexte']; ?>" id="myInput" style="opacity: 0">
		  	<?php if($_Serveur_['General']['statut'] == 0)
                { ?>
				<center><button onclick="myFunction()" class="btn btn-normal btn-primary btn-ip"><?php echo $_Serveur_['General']['ipTexte']; ?></button>
				<?php
				}
                elseif($_Serveur_['General']['statut'] == 1)
                { ?>
				<center><button onclick="myFunction()" class="btn btn-normal btn-success btn-ip"><?php echo $_Serveur_['General']['ipTexte']; ?></button>
					  <br/>
                    <strong class='text-success'>(En Ligne : <?php echo $playeronline ?> / <?php echo $maxPlayers ?> )</strong>
				<?php
				}
                else{ ?>
				<center><button onclick="myFunction()" onmouseover="mypreFunction()" class="btn btn-normal btn-danger btn-ip"><?php echo $_Serveur_['General']['ipTexte']; ?></button>
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
            <h2>Pourquoi nous ?</h2>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <?php echo $_Theme_['All']['1']['icone']; ?>
                <h4><?php echo $_Theme_['All']['1']['titre']; ?></h4>
                <p><?php echo $_Theme_['All']['1']['texte']; ?></p>
            </div>
            <div class="col-sm-4">
                <?php echo $_Theme_['All']['2']['icone']; ?>
                <h4><?php echo $_Theme_['All']['2']['titre']; ?></h4>
                <p><?php echo $_Theme_['All']['2']['texte']; ?></p>
            </div>
            <div class="col-sm-4">
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
                <div class="col-md-6">
                    <img src="<?php echo $_Theme_['img']['banner'];?>" class="img-responsive" alt=""
                        style="height:300px;">

                </div>
                <div class="col-md-6">
                    <h3>Nos avantages</h3>
                    <ul class="list-unstyled">
                        <?php for($i = 1; $i < count($_Theme_['Infos']) + 1; $i++)
					{ ?>
                        <li>
                            <?php echo $_Theme_['Infos'][$i]['message']; ?></li>
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
                    <p><span><?php $req_nbrMembre2 = $bddConnection->query('SELECT * FROM cmw_users'); $Membretotal = $req_nbrMembre2->rowCount(); echo $Membretotal;?></span>
                    </p>
                    <h4>Membres inscrit</h4>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="counter-item">
                    <i class="fas fa-pencil-alt"></i>
                    <p><span>850</span></p>
                    <h4>Lignes de code</h4>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="counter-item">
                    <i class="fa fa-trophy"></i>
                    <p><span>4</span></p>
                    <h4>Années d'expérience</h4>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="counter-item">
                    <i class="fa fa-coffee"></i>
                    <p><span>5</span></p>
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
                if (isset($news) && count($news) > 0) :
                    for ($i = 0; $i < 10; $i++) :
                        if ($i < count($news)) :
                            $getCountCommentaires = $accueilNews->countCommentaires($news[$i]['id']);
                            $countCommentaires = $getCountCommentaires->rowCount();

                            $getcountLikesPlayers = $accueilNews->countLikesPlayers($news[$i]['id']);
                            $countLikesPlayers = $getcountLikesPlayers->rowCount();
                            $namesOfPlayers = $getcountLikesPlayers->fetchAll(PDO::FETCH_ASSOC);

                            $getNewsCommentaires = $accueilNews->newsCommentaires($news[$i]['id']);
                ?>

                            <article class="col-md-12 col-lg-12 col-sm-12 news-content">
                                <div class="panel panel-default" style="border-radius:0px;margin-left: 5px;margin-right: 5px;">

                                <div class="panel-heading"><?php echo $news[$i]['titre']; ?>
                                    <a class="tooltips2 pull-right" href="index.php?&page=profil&profil=<?php echo $news[$i]['auteur']; ?>"><span> <?php echo $news[$i]['auteur']; ?></span></a>
                                </div> <!-- Heading -->

                                <div class="panel-body"><?php echo $news[$i]['message']; ?>
                                </div> <!-- Body -->

                                <div class="panel-footer"><?php echo 'Posté le '.date('d/m/Y', $news[$i]['date']).' &agrave; '.date('H:i', $news[$i]['date']); ?> 
                                |

                                <?php
                                            if (Permission::getInstance()->verifPerm("connect")) :
                                                $reqCheckLike = $accueilNews->checkLike($_Joueur_['pseudo'], $news[$i]['id']);
                                                $getCheckLike = $reqCheckLike->fetch(PDO::FETCH_ASSOC);
                                                $checkLike = $getCheckLike['pseudo'];
                                                if ($_Joueur_['pseudo'] == $checkLike) : ?>
                                                    <a href="#" class="h5 mr-3" data-toggle="modal" data-target="#news<?= $news[$i]['id'] ?>">Commenter (<?= $countCommentaires ?>)</a> <i class="fa fa-thumbs-up"></i> <?= $countLikesPlayers ?>
                                                <?php else : ?>
                                                    <a href="#" class="h5 mr-3" data-toggle="modal" data-target="#news<?= $news[$i]['id'] ?>">Commenter (<?= $countCommentaires ?>)</a>
                                                    <a href="index.php?action=likeNews&id_news=<?= $news[$i]['id'] ?>" class="h5 mx-3">J'aime</a>
                                                    <i class="fa fa-thumbs-up"></i> <?= $countLikesPlayers ?>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <a href="#" class="h5 mr-3" data-toggle="modal" data-target="#news<?= $news[$i]['id'] ?>">Commenter (<?= $countCommentaires ?>)</a> <i class="fa fa-thumbs-up"></i> <?= $countLikesPlayers ?>
                                            <?php endif; ?>
                                </strong>

                             
                                </div>

                            </article>
                        <?php endif; ?>
                    <?php endfor; ?>
                <?php else : ?>
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="alert alert-warning">
                            <p class="text-center">Aucune news n'a été créée à ce jour...</p>
                        </div>
                    </div>
                <?php endif; ?>
        </div>
    </div>
</section>