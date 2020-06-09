<section class="content-item">
    <div class="container">
        <div class="content-headline">
            <h2>Boutique</h2>
            <h3>Bienvenue sur la boutique du serveur.</h3>
        </div>
        <div class="well">
            <h3><i class="fa fa-info-circle"></i> Comment ça marche ?</h3>
            <p>
                La boutique permet d'acheter du contenu In-Game depuis le site grâce à de l'argent réel, cela sert à payer l'hébergement du serveur. La monnaie virtuelle utilisée sur la boutique est le "Jeton", vous pouvez obtenir des <?=$_Theme_['All']['Tokens']['nom'];?> en échange de dons <a href="?&page=token">sur cette page</a>
            </p>
            <hr>
            <h3><i class="<?=$_Theme_['All']['Tokens']['icon'];?>"></i> <?=$_Theme_['All']['Tokens']['nom'];?></h3>

            <?php if(isset($_Joueur_['pseudo'])){ ?>
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fas fa-gem"></i> Votre nombre de <?=$_Theme_['All']['Tokens']['nom'];?></div>
                        <div class="panel-body">
                            <p>
                                <?php echo $_Joueur_['pseudo']; ?>, vous avez actuellement :
                            </p>
                            <div style="text-align:center;">
                                <h2>
                                    <?php if(isset($_Joueur_['tokens'])) echo $_Joueur_['tokens']; ?><br><small><i class="<?=$_Theme_['All']['Tokens']['icon'];?>"></i></small></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                if($_Theme_['All']['Boutique']['panier'] == "true"){?>
                <div class="col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-shopping-cart"></i> Votre panier</div>
                        <div class="panel-body">
                        <style>
                        table
                        {
                            border-collapse: collapse;
                        }
                        td
                        {
                            border: 1px solid black;
                        }
                        </style>
                        <table class="table">
                        <tr>
                            <th>Nom de l'article</th>
                            <th>Prix</th>
                        </tr>
                        <?php
                        $nbArticles = $_Panier_->compterArticle();
                        $precedent = 0;
                        if($nbArticles == 0 )
                            echo '<tr><td colspan="6"><center>Votre panier est vide :\'( </center></td></tr>';
                        else
                        {
                            for($i = 0; $i < $nbArticles; $i++)
                            {
                                ?>
                                <tr>
                                    <td><?php $_Panier_->infosArticle(htmlspecialchars($_SESSION['panier']['id'][$i]), $nom, $infos); echo $nom; ?></td>
                                    <td class="w-25 text-center"><?php echo htmlspecialchars($_SESSION['panier']['prix'][$i]); ?> <i class="<?=$_Theme_['All']['Tokens']['icon'];?>"></i></td>
                                </tr>
                            <?php
                            }
                            } ?>
                        </table>
                        </div>
                        <div class="panel-footer">
                            <a href="?&page=panier" class="btn btn-block btn-danger btn-lg">Voir votre panier (<?php echo $_Panier_->compterArticle().($_Panier_->compterArticle()>1 ? ' articles' : ' article') ?>)</a>
                        </div>
                    </div>
                </div>
                <?php
                }
                if($_Theme_['All']['Boutique']['historique'] == "true"){
                ?>
                <div class="<?php if($_Theme_['All']['Boutique']['panier'] != "true"){echo'col-sm-6 col-xs-12';}else{echo'col-sm-12';}?>">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-history"></i> Histoirique de vos achats</div>
                        <div class="panel-body">
                            <style>
                            table
                            {
                                border-collapse: collapse;
                            }
                            td
                            {
                                border: 1px solid black;
                            }
                            </style>
                            <table class="table">
                                <tr>
                                    <th>Nom de l'article</th>
                                    <th>Date de l'achat</th>
                                    <th>Prix</th>
                                </tr>
                                <?php
                                $historiqueReq = $bddConnection->prepare('SELECT cmw_boutique_stats.id AS id, cmw_boutique_stats.prix AS prixTotal, cmw_boutique_offres.prix AS prix, cmw_boutique_offres.nom AS titre, cmw_boutique_stats.date_achat AS date_achat FROM cmw_boutique_stats INNER JOIN cmw_boutique_offres ON offre_id = cmw_boutique_offres.id WHERE pseudo = :pseudo ORDER BY date_achat DESC LIMIT 0, 20');
                                $historiqueReq->execute(array(
                                    'pseudo' => $_Joueur_['pseudo'],
                                ));
                                $boutiqueListeData = $historiqueReq->fetchAll(PDO::FETCH_ASSOC);
                                if(!$boutiqueListeData)
                                {
                                    echo '<tr><td colspan="6"><center>Vous n\'avez aucun historique d\'achat</center></td></tr>';
                                }
                                else
                                    {
    
                                        foreach($boutiqueListeData as $donnees)
                                        {
                                        ?>
                                            <tr>
                                                <td class="w-60"><?=$donnees['titre'];?></td>
                                                <td class="w-25"><?=date('d-m-Y', strtotime($donnees['date_achat']));?></td>
                                                <td class="w-15"><?=$donnees['prixTotal'];?></td>
                                            </tr>
                                        <?php
                                        }
                                    }
                                    ?>
                            </table>
                        </div>
                    </div>
                </div>
                <?php 
                }
                    }else{ ?>
                    <section class="content-item grey" id="error">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
                                    <div class="error-box">
                                        <h2><i class="fa fa-exclamation-circle"></i> Non connecté</h2>
                                        <p>Veuillez vous <a href="#" data-toggle="modal" data-target="#ConnectionSlide">connecter</a> afin d'accéder à cette page</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- -->
<section class="content-item">
    <div class="container">
        <h3>
            <center>Choisissez votre catégorie :</center>
        </h3>
        <?php for($j = 0; $j < count($categories); $j++){
            $categories[$j]['titre'] = str_replace(' ', '_', $categories[$j]['titre']); ?>
            <a class="btn btn-lg btn-normal btn-block" data-toggle="collapse" href="#shop-<?php echo $categories[$j]['titre']; ?>" role="button" aria-expanded="false" aria-controls="shop-<?php echo $categories[$j]['titre']; ?>">
                <?php echo $categories[$j]['titre']; ?>
            </a>
            <div class="collapse grey <?php //if($categories[$j]['id'] = 1){ echo 'show';}?>" id="shop-<?php echo $categories[$j]['titre']; ?>">
                <div class="panel panel-body grey" style="background-color: #F4F4F4;border-bottom-radius: 15px;">
                <?php if(!empty($categories[$j]['message'])){ ?>
						<div class="alert alert-dismissable alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<center><?php echo espacement($categories[$j]['message']); ?></center>
						</div>
				<?php } ?>
                		<div class="row grey">
								<?php
									foreach($categories as $key => $value)
									{
										$categories[$key]['offres'] == 0;
									}
									for($i = 1; $i <= count($offresTableau); $i++)
									{
										if($offresTableau[$i]['categorie'] == $categories[$j]['id'])
										{
											echo '
											<div class="col-md-4 panel md-4">
												<div class="panel-body">
													<h3 class="panel-title"><center>'. (($offresTableau[$i]['nbre_vente'] == 0) ? "<s>".$offresTableau[$i]['nom']."</s>" : $offresTableau[$i]['nom']);
													echo'</center></h3>
														<center><div class="offre-description">' .espacement($offresTableau[$i]['description']). '</div></center>
													</div>
													';
														if(isset($_Joueur_)) {
                                                            echo '<a href="?page=boutique&offre=' .$offresTableau[$i]['id']. '" class="btn btn-primary btn-block" title="Voir la fiche produit"><i class="fa fa-eye"></i></a>';
?>

  <?php                                                          if($offresTableau[$i]['nbre_vente'] == 0){
                                                                echo '';
                                                                //<a href="#" class="btn btn-info btn-block btn-lg">En rupture de stock</a>
															} else {
																echo '<a href="?action=addOffrePanier&offre='. $offresTableau[$i]['id']. '&quantite=1" class="btn btn-info btn-block" title="Ajouter directement au panier une unité"><i class="fa fa-cart-arrow-down"></i></a>';
															}
														} else {
															echo'<a data-toggle="modal" data-target="#ConnectionSlide" class="btn btn-warning btn-block" ><span class="fas fa-user"></span> Se connecter</a>';
														}
														echo '<button class="btn btn-success btn-block">Prix : ' . ($offresTableau[$i]['prix'] == '0' ? 'gratuit' : $offresTableau[$i]['prix'].'<i class="'. $_Theme_['All']['Tokens']['icon'] .'">') . ' </i></button>';
                                            if($offresTableau[$i]['nbre_vente'] > -1) {
                                                echo "<span style='font-size: 9pt;'>";
                                                if($offresTableau[$i]['nbre_vente'] == 0) {
                                                    echo "<button class='btn btn-danger btn-block' style='margin-top: 5px;'>Non disponible</button>";
                                                } else {
                                                    echo '<button class="btn btn-info btn-block" style="margin-top: 5px;">Stock: '. $offresTableau[$i]['nbre_vente'];
                                                }
                                                echo "</span>";
                                            }
                                            echo'</div>';
											$categories[$j]['offres']++;
										}
									}
								?>
                        <?php if($categories[$j]['offres'] == 0) {?>
						<div class="alert alert-dismissible alert-danger">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<center><strong>Oh zut !</strong> <?=$categories[$j]['titre']?> est encore vide, ré-essayez plus tard !.</center>
						</div>
					<?php }?>
						</div>
                </div>
            </div>
            <br/><br/>
        <?php } ?>
    </div>
</section>
<?php
	if(isset($_GET['offre']))
	{
	?>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Article: <?php echo $infosOffre['offre']['nom']; ?></h4>
		  </div>
		  <div class="modal-body">
					<br />
					Vous obtiendrez ce grade sur <?php echo $infosCategories['serveur']; ?>.<br />
					<?php
					$enLigne = false;
					if($infosCategories['serveurId'] == -2 OR $infosCategories['serveurId'] == -1)
						for($i = 0; $i < count($lecture['Json']); $i++)
						{
							if($enligne[$i])
							{
								echo 'Vous êtes connecté sur le serveur:<br /> "'. $lecture['Json'][$i]['nom'] .'"';
								$enLigne = true;
							}
							
						}
					else
						if($enligne[$infosCategories['serveurId']])
						{
							echo 'Vous êtes connecté sur le serveur:<br /> "'. $lecture['Json'][$infosCategories['serveurId']]['nom'] .'"';
							$enLigne = true;
						}
						
					if(!$enLigne AND $infosCategories['connection'])
						echo 'Vous n\'êtes pas connecté sur le serveur !';
					?>
					<br />
					<br />
					Cette offre contiens: <br />
					<blockquote>
					<?php
					if(isset($infosOffre['offre']['description']))
						echo espacement($infosOffre['offre']['description']);
					else
						echo 'Cette offre est un don sans contrepartie...';
					?>
					</blockquote>
		  </div>
		  <div class="modal-footer">
          <?php if(isset($_Joueur_['pseudo'])){ ?>
			<?php 	if((($enLigne AND $infosCategories['connection']) OR !$infosCategories['connection']) AND $infosOffre['offre']['nbre_vente'] > 0)  { ?>
							<form action="index.php" method="GET" class="form-inline">
								<input type="hidden" name="action" value="addOffrePanier"/>
								<input type="hidden" name="offre" value="<?php echo $_GET['offre']; ?>"/>
								<label for="quantite" class="form-control mb-1 mr-sm-1">Quantité: </label>
								<input type="number" class="form-control mb-1 mr-sm-1" id="quantite" name="quantite" min="0" value="1" />
								<button type="submit" class="btn btn-success mb-2">Ajouter au panier</button>
							</form><?php }
							elseif($infosOffre['offre']['nbre_vente'] == 0)
								echo '<div class="row" style="width: 100%;"><div class="col-md-12" style="text-align: center;"><a class="btn btn-info" href="#">Rupture de stock !</a></div></div>';
							 else{ ?>
							Connectez vous sur le serveur voulu... <?php } 
					?>
            <?php } ?>
		  </div><button type="button" class="btn btn-danger btn-block w-100" data-dismiss="modal">Annuler</button>
		</div>
	  </div>
	</div>
	<?php

	$modal = true;
	$idModal = 'myModal';

	}
	?>
