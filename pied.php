<footer class="navbar">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <p>Tous droits réservés, site créé pour le serveur <?php echo $_Serveur_['General']['name']; ?> avec <a href="https://craftmywebsite.fr">CraftMyWebsite.fr</a> -
                    <span id="js-rotating">
                        Membres inscrits: <?php $req_nbrMembre2 = $bddConnection->query('SELECT * FROM cmw_users'); $Membretotal = $req_nbrMembre2->rowCount(); echo $Membretotal;?>|
                        Nombre de visites: <?php $req = $bddConnection->query('SELECT COUNT(id) AS visits FROM cmw_visits'); $fetch = $req->fetch(); echo $fetch['visits']; ?>|
                        Théme Supreme adapté par Amjido & PinglsDzn|
                        Version : <?php echo $versioncms; ?> | 2.3.4_fr
                    </span>
                </p>
            </div>
            <div class="col-sm-4">
                <ul class="brands brands-sm brands-circle brands-inline">
                <?php if(!empty($_Theme_['Pied']['facebook'])){ ?>
                    <li><a href="<?php echo $_Theme_['Pied']['facebook'] ?>" target="_blank"><i class="fab fa-twitch"></i></a></li>
                <?php }
                if (!empty($_Theme_['Pied']['youtube'])){?>
                    <li><a href="<?php echo $_Theme_['Pied']['twitter'] ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <?php }
                if (!empty($_Theme_['Pied']['youtube'])){ ?>
                    <li><a href="<?php echo $_Theme_['Pied']['youtube']  ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                <?php }
                if (!empty($_Theme_['Pied']['discord'])){ ?>
                    <li><a href="<?php echo $_Theme_['Pied']['discord']  ?>" target="_blank"><i class="fab fa-discord"></i></a></li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</footer>