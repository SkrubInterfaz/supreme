<?php
include('controleur/maintenance.php');
require('theme/'. $_Serveur_['General']['theme'] . '/config/configTheme.php');
if($maintenance[$i]['maintenanceEtat'] == 0){
setTempMess("<script> $( document ).ready(function() { Snarl.addNotification({ title: '', text: 'La maintenance n\'est pas activée !', icon: '<span class=\'glyphicon glyphicon-cog\'></span>'});});</script>");
header('Location: index.php');
} ?>
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta name="author" content="CraftMyWebsite , TheTueurCiTy, Amjido, PinglsDzn ,<?php echo $_Serveur_['General']['name']; ?>" />
        <title>
        <?php echo $_Serveur_['General']['name']; ?> - Maintenance
        </title>
        <script type="text/javascript">
			(function titleScroller(text) {
				document.title = text;
				console.log(text);
				setTimeout(function () {
					titleScroller(text.substr(1) + text.substr(0, 1));
				}, 500);
			}("<?php echo $_Serveur_['General']['name']; ?> - <?php echo $_Serveur_['General']['description']; ?> | Maintenance"));
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
        <link rel="shortcut icon" type="image/x-icon" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/img/icons/favicon.ico" />
        <link rel="icon" type="image/x-icon" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/img/icons/favicon.ico" />
        <meta name="theme-color" content="<?=$configFile["color"]["theme"]["main"]?>">
        <meta name="msapplication-navbutton-color" content="<?=$configFile["color"]["theme"]["main"]?>">
        <meta name="apple-mobile-web-app-statut-bar-style" content="<?=$configFile["color"]["theme"]["main"]?>">
        <meta name="apple-mobile-web-app-capable" content="<?=$configFile["color"]["theme"]["main"]?>">
        <meta property="og:title" content="<?=$_Serveur_['General']['name']?> - Maintenance ">
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://<?=$_SERVER["SERVER_NAME"]?>">
        <meta property="og:image" content="https://<?=$_SERVER["SERVER_NAME"]?>/theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/img/icons/favicon.ico">
        <meta property="og:image:alt" content="<?=$_Serveur_['General']['description']?>">
        <meta property="og:description" content="<?=$_Serveur_['General']['description']?> (Site web en maintenance)">
        <meta property="og:site_name" content="<?=$_Serveur_['General']['name']?> - Maintenance" />
        <link href="https://fonts.googleapis.com/css?family=Lato|Poppins" rel="stylesheet">
        <!-- <link href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet"> -->
		<link rel="stylesheet" type="text/css" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/css/util.css">
		<link rel="stylesheet" type="text/css" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/css/main.css">
		<link rel="stylesheet" type="text/css" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/vendor/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/vendor/bootstrap/css/bootstrap.min.css">

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php include("theme/".$_Serveur_['General']['theme']."/alert.php") ;?>
    </head>

<body>
	
	<div class="size1 bg0 where1-parent">
    <div class="flex-c-m bg-img1 size2 where1 overlay1 where2 respon2" style="background-image: url('/theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/img/bg01.jpg');">
			<?php if(!empty($donnees['dateFin'])){
				if($donnees['dateFin'] != 0 && $donnees['dateFin'] <= time()){
					$req = $bddConnection->prepare('UPDATE cmw_maintenance SET maintenanceEtat = :maintenanceEtat WHERE maintenanceId = :maintenanceId');
					$req->execute(array('maintenanceEtat' => 0, 'maintenanceId' => $donnees['maintenanceId']));
					header("Location: /");
				}?>
		<div id="clockdiv">
			<div class="wsize2 flex-w flex-c-m cd100 js-tilt">
				<div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
					<span class="l2-txt1 p-b-9 days"></span>
					<span class="s2-txt4">Jour(s)</span>
				</div>

				<div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
					<span class="l2-txt1 p-b-9 hours"></span>
					<span class="s2-txt4">Heure(s)</span>
				</div>

				<div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
					<span class="l2-txt1 p-b-9 minutes"></span>
					<span class="s2-txt4">Minute(s)</span>
				</div>

				<div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
					<span class="l2-txt1 p-b-9 seconds"></span>
					<span class="s2-txt4">Segondes</span>
				</div>
			</div>
		</div>
			<?php }?>
		</div>

		<!-- Form -->
		<div class="size3 flex-col-sb flex-w p-l-75 p-r-75 p-t-45 p-b-45 respon1">
			<div class="wrap-pic1">
				<img src="theme/<?php echo $_Serveur_['General']['theme']; ?>/maintenance/img/icons/logo.png" alt="<?=$_SERVER["SERVER_NAME"]?>.png">
			</div>

			<div class="p-t-50 p-b-60">
				<p class="m1-txt1 p-b-36">
				<?php echo $_Serveur_['General']['name']; ?> reviens très bientôt !<br/>
				 <span class="m1-txt2"> <?php echo $donnees['maintenanceMsg']; ?></span>
				 <small class="text-muted"><?php echo $donnees['maintenanceMsgAdmin']; ?></small>
				</p>
				<?php if(!isset($_Joueur_['rang'], $_PGrades_) && $_Joueur_['rang'] != 1 AND !$_PGrades_['PermsPanel']['access'])
                    { ?>
					<form method="post" action="?action=connection">
                    <div class="card card-body text-white bg-dark mb-3" style="border:0px;padding:15px;background:#333;border-top:4px solid #CB2027;">
                        <div class="col-auto">
                        	<h4><?php echo $donnees['maintenanceMsgAdmin']; ?></h4>
                            <div class="form-group">
                                <label class="control-label">Votre pseudo</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon" style="border:0px;"><i class="fa fa-user"></i></div>
                                        <input type="text" class="form-control" name="pseudo" id="PSEUDO" placeholder="Ex: CraftMyWebsite" style="border:0px;">
                                    </div>
                                </div>
                                <label class="control-label">Votre mot de passe</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon" style="border:0px;"><i class="fa fa-lock"></i></div>
                                        <input type="password" name="mdp" class="form-control" id="MDP" placeholder="Mot de passe" style="border:0px;">
                                    </div>
                                </div>
                                <div class="form-group">
                                	<button class="btn btn-lg btn-primary btn-block" type="submit"> Connexion administrateur</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
				<?php 
                 }
                 else
                 {
					header("Location: index.php");
                 }
                 ?>


				<p class="s2-txt3 p-t-18">
					&copy; 2017-<?php echo date('Y');?> <?php echo $_Serveur_['General']['name']?> , avec <a href="https://craftmywebsite.fr/" target="_blank">CraftMyWebsite</a> et le thème <a href="https://craftmywebsite.fr/forum/index.php?resources/supreme-b%C3%AAta.124/" target="_blank">Supreme</a>
				</p>
			</div>

			<div class="flex-w">
				<a href="<?php echo $_Theme_['Pied']['facebook']; ?>" class="flex-c-m size5 bg3 how1 trans-04 m-r-5" target="_blank">
					<i class="fab fa-facebook"></i>
				</a>

				<a href="<?php echo $_Theme_['Pied']['twitter']; ?>" class="flex-c-m size5 bg4 how1 trans-04 m-r-5" target="_blank">
					<i class="fab fa-twitter"></i>
				</a>

				<a href="<?php echo $_Theme_['Pied']['youtube']; ?>" class="flex-c-m size5 bg5 how1 trans-04 m-r-5" target="_blank">
					<i class="fab fa-youtube-square"></i>
				</a>
				
				<a href="<?php echo $_Theme_['Pied']['discord']; ?>" class="flex-c-m size5 bg6 how1 trans-04 m-r-5" target="_blank">
					<i class="fab fa-discord"></i>
				</a>
			</div>
		</div>
	</div>
	<script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" crossorigin="anonymous"></script>
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
	<script type="text/javascript">
		function getTimeRemaining(endtime) {
		  var t = Date.parse(endtime) - Date.parse(new Date());
		  var seconds = Math.floor((t / 1000) % 60);
		  var minutes = Math.floor((t / 1000 / 60) % 60);
		  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
		  var days = Math.floor(t / (1000 * 60 * 60 * 24));
		  if(days == 0 && hours == 0 && minutes == 0 && seconds == 0)
			  window.location.replace("/");
		  return {
			'total': t,
			'days': days,
			'hours': hours,
			'minutes': minutes,
			'seconds': seconds
		  };
		}

		function initializeClock(id, endtime) {
		  var clock = document.getElementById(id);
		  var daysSpan = clock.querySelector('.days');
		  var hoursSpan = clock.querySelector('.hours');
		  var minutesSpan = clock.querySelector('.minutes');
		  var secondsSpan = clock.querySelector('.seconds');

		  function updateClock() {
			var t = getTimeRemaining(endtime);

			daysSpan.innerHTML = t.days;
			hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
			minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
			secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

			if (t.total <= 0) {
			  clearInterval(timeinterval);
			}
		  }

		  updateClock();
		  var timeinterval = setInterval(updateClock, 1000);
		}

		var deadline = new Date(Date.parse(new Date()) + <?=($donnees["dateFin"] - time())?> * 1000);
		initializeClock('clockdiv', deadline);
	</script>

</html>