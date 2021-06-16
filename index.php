<?php
require('theme/' . $_Serveur_['General']['theme'] . '/preload.php');
$configTheme = new Lire('theme/'.$_Serveur_['General']['theme'].'/config/config.yml');
$_Theme_ = $configTheme->GetTableau();

?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <base href="<?= urlRewrite::getSiteUrl() ?>" />

    <style>
        :root {
            --couleurmain: #<?=$_Theme_["couleur"];?>;
        }
        .bg-main {
            background-color: #<?=$_Theme_["couleur"];?>;
        }
        .btn-main {
            background-color: #<?=$_Theme_["couleur"];?>;
            color: #f4f4f4
        }
        .color-main{
            color: #<?=$_Theme_["couleur"];?> !important; 
        }
    </style>

    <title>
        <?= $_Serveur_['General']['name'] . " | " . (isset($_GET["page"]) ? ucfirst($_GET["page"]) : $_Serveur_['General']['description']) ?>
    </title>

    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="<?= $_Serveur_["color"]["theme"]["main"]; ?>">
    <meta name="msapplication-navbutton-color" content="<?= $_Serveur_["color"]["theme"]["main"]; ?>">
    <meta name="apple-mobile-web-app-statut-bar-style" content="<?= $_Serveur_["color"]["theme"]["main"]; ?>">
    <meta name="apple-mobile-web-app-capable" content="<?= $_Serveur_["color"]["theme"]["main"]; ?>">

    <!-- SEO -->
    <meta property="og:title" content="<?= $_Serveur_['General']['name'] ?>">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://<?= $_SERVER["SERVER_NAME"] ?>">
    <meta property="og:image" content="https://<?= $_SERVER["SERVER_NAME"] ?>/favicon.ico">
    <meta property="og:image:alt" content="<?= $_Serveur_['General']['description'] ?>">
    <meta property="og:description" content="<?= $_Serveur_['General']['description'] ?>">
    <meta property="og:site_name" content="<?= $_Serveur_['General']['name'] ?>" />

    <meta name="twitter:title" content="<?= $_Serveur_['General']['name'] ?>">
    <meta name="twitter:description" content="<?= $_Serveur_['General']['description'] ?>">
    <meta name="twitter:image" content="https://<?= $_SERVER["SERVER_NAME"] ?>/favicon.ico">

    <meta name="author" content="CraftMyWebsite, TheTueurCiTy, <?= $_Serveur_['General']['name']; ?>" />
    <meta name="publisher" content="<?= $_SERVER["SERVER_NAME"] ?>" />
    <meta name="description" content="<?= $_Serveur_['General']['description'] ?>">
    <meta name="copyright" content="CraftMyWebsite, <?= $_Serveur_['General']['name']; ?>" />

    <meta name="robots" content="follow, index">

    <!-- Google Service -->
    <?php 
	if(googleService::isAdsenseEnable($_Serveur_)) {
	    googleService::getAdsense()->writeHead();
	}
	if(googleService::isAnalyticsEnable($_Serveur_)) {
	    googleService::getAnalytics()->writeHead();
	}
	
	?>

    <!-- CSS links -->
    <link rel="stylesheet" type="text/css"
        href="theme/<?= $_Serveur_['General']['theme']; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="theme/<?= $_Serveur_['General']['theme']; ?>/assets/css/custom.css">
    <link rel="stylesheet" type="text/css"
        href="theme/<?= $_Serveur_['General']['theme']; ?>/assets/css/toastr.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="theme/<?=$_Serveur_['General']['theme']; ?>/assets/css/color/red.css">
    <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/creative-brands.css" rel="stylesheet" type="text/css">
    <script type="application/javascript" src="theme/<?= $_Serveur_['General']['theme']; ?>/assets/js/ckeditor.js">
    </script>
    <?php if(isset($_GET['page']) && $_GET['page'] == "voter") {
        echo '<script type="application/javascript" src="theme/'.$_Serveur_['General']['theme'].'/assets/js/voteControleur.js"></script>';
    } ?>

    <link rel="stylesheet" type="text/css"
        href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <script>
        window.addEventListener("load", function () {
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#<?php echo $_Theme_['cookies']['bg'];?>"
                    },
                    "button": {
                        "background": "#<?php echo $_Theme_['cookies']['bouton'];?>"
                    }
                },
                "position": "bottom",
                "content": {
                    "message": "<?php echo $_Theme_['cookies']['message'];?>",
                    "dismiss": "Ok",
                    "link": "En savoir plus"
                }
            })
        });
    </script>
</head>

<body>
    <script type="application/javascript">
        var _Jetons_ = "<?=$_Serveur_['General']['moneyName'];?>";
    </script>
    <?php
    if (Permission::getInstance()->verifPerm("connect")){
        setcookie('form-pseudo',htmlspecialchars($_Joueur_['pseudo']));
    }
    //Verif Version
    include("include/version.php");
    include("include/version_distant.php");
    ?>

    <?php
    include('theme/' . $_Serveur_['General']['theme'] . '/entete.php'); //Header included
    tempMess(); ?>

    <?php
    if (is_dir("installation")) {
        include('theme/' . $_Serveur_['General']['theme'] . '/pages/fichier_installation.php');
    } else {
        include('controleur/page.php'); //Page included
    }
    include('theme/' . $_Serveur_['General']['theme'] . '/pied.php');  //Footer included
    include('theme/' . $_Serveur_['General']['theme'] . '/formulaires.php'); //Forms included
    ?>


    

        <script src="https://code.jquery.com/jquery-latest.min.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/bootstrap.min.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/owl.carousel.min.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/isotope.pkgd.min.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/jqBootstrapValidation.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/waypoints.min.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/jquery.counterup.min.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/jquery.countdown.min.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/jquery.mb.YTPlayer.min.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/typed.min.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/creative-brands.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/morphext.min.js"></script>
        <script src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>
        <?php
        if(!isset($_Joueur_)){
            echo '
            <script src="theme/'. $_Serveur_['General']['theme'] .'/js/zxcvbn.js"></script>
            <script src="theme/'. $_Serveur_['General']['theme'] .'/js/securepass.js"></script>';
        } 
        ?>
        <script src="theme/<?=$_Serveur_['General']['theme'];?>/assets/js/custom.js"></script>

        <script>
        $("#js-rotating").Morphext({
            animation: "fadeIn",
            // An array of phrases to rotate are created based on this separator. Change it if you wish to separate the phrases differently (e.g. So Simple | Very Doge | Much Wow | Such Cool).
            separator: "|",
            // The delay between the changing of each phrase in milliseconds.
            speed: 2000,
            complete: function () {
            // Called after the entrance animation is executed.
            }
        });

        $(window).on('load',function(){
            $('#myModal').modal('show');
        });
        </script>

    <?php include "theme/" . $_Serveur_['General']['theme'] . "/assets/php/ckeditorManager.php"; ?>
    <?php include "theme/" . $_Serveur_['General']['theme'] . "/assets/php/custom.php"; ?>
    <?php if ($_Serveur_['Payement']['dedipass']) : //API DEDIPASS 
    ?>
    <script src="//api.dedipass.com/v1/pay.js"></script>
    <?php endif; ?>

</body>

</html>