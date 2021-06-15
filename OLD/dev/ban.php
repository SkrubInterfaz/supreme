<?php
$req = $bddConnection->query('SELECT * FROM cmw_ban_config');
$data = $req->fetch(PDO::FETCH_ASSOC);
require('include/version.php');
?>
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta name="author" content="CraftMyWebsite , TheTueurCiTy, Amjido, PinglsDzn ,<?php echo $_Serveur_['General']['name']; ?>" />
        <title>
        <?php echo $_Serveur_['General']['name']; ?> - Erreur: Vous êtes banni(e)
        </title>
        <script type="text/javascript">
			(function titleScroller(text) {
				document.title = text;
				console.log(text);
				setTimeout(function () {
					titleScroller(text.substr(1) + text.substr(0, 1));
				}, 500);
			}("<?php echo $_Serveur_['General']['name']; ?> - <?php echo $_Serveur_['General']['description']; ?> | Vous êtes banni(e) "));
		</script>
        <?php $configFile = new Lire('modele/config/config.yml');
        $configFile = $configFile->GetTableau();
        echo "<style>
        :root {
            --color-main: ". $configFile["color"]['theme']["main"] ."; 
            --color-hover: ". $configFile["color"]['theme']["hover"] ."; 
            --color-focus: ". $configFile["color"]['theme']["focus"] ."; 
        }
        </style>";?>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="<?=$configFile["color"]["theme"]["main"]?>">
        <meta name="msapplication-navbutton-color" content="<?=$configFile["color"]["theme"]["main"]?>">
        <meta name="apple-mobile-web-app-statut-bar-style" content="<?=$configFile["color"]["theme"]["main"]?>">
        <meta name="apple-mobile-web-app-capable" content="<?=$configFile["color"]["theme"]["main"]?>">
        <link href="https://fonts.googleapis.com/css?family=Lato|Poppins" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/css/util.css">
		<link rel="stylesheet" type="text/css" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/css/main.css">
		<link rel="stylesheet" type="text/css" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/vendor/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/vendor/bootstrap/css/bootstrap.min.css">
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
<style>
body {
    display: flex;
    align-items: center;
    justify-content: center;
}

.wsize2{
	display: inline-block;
	margin-bottom: 25px;
}
</style>
    </head>
<body>
        <div class="w-100 h-100" style="background-image: url('/theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/img/bg01.jpg');background-size: cover;">
        <center>
            <div class="wsize2 flex-w flex-c-m cd100 js-tilt" style="padding-top:150px !important;">
				<h3 class="text-white text-center"><?=$data['titre'];?></h3><br/>
                <p class="text-white text-center"><?=$data['texte'];?></p>
			</div>
		</center>
    </div>
	<script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/vendor/bootstrap/js/popper.js"></script>
	<script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/vendor/select2/select2.min.js"></script>
	<script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/js/main.js"></script>
</body>
</html>