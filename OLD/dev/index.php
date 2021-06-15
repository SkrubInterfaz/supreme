<?php
require('theme/'. $_Serveur_['General']['theme'] . '/preload.php');
require('include/version.php');
require('theme/'. $_Serveur_['General']['theme'] . '/config/configTheme.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <style>
        :root {
            --couleurmain: #<?=$_Theme_["couleur"];?>; 
        }
        </style>
        <meta name="author" content="CraftMyWebsite , TheTueurCiTy, Amjido, PinglsDzn ,<?php echo $_Serveur_['General']['name']; ?>" />
        <meta name="keywords" content="<?=$_Serveur_['General']['name'];?>">
        <meta name="description" content="<?=$_Serveur_['General']['description']?>">
        <meta name="robots" content="follow, index">

        <?php if(isset($_GET['page'])){$nompage = ucfirst($_GET["page"]);}else{$nompage = "Accueil";}?>
        <title><?=$_Serveur_['General']['name'] ." | ". $nompage?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

        <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/forum.css" rel="stylesheet" type="text/css">
        <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/animate.css" rel="stylesheet" type="text/css">
        <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/magnific-popup.css" rel="stylesheet" type="text/css">
        <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/owl.carousel.css" rel="stylesheet" type="text/css">
        <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/creative-brands.css" rel="stylesheet" type="text/css">
        <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/custom.css" rel="stylesheet" type="text/css">
        <link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/color/red.css"  rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/morphext.css">
        <link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/snarl.min.css">
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/modernizr.min.js"></script>
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/snarl.min.js"></script>

        <meta name="theme-color" content="#<?=$_Theme_["All"]["Seo"]["color"];?>">
        <meta name="msapplication-navbutton-color" content="#<?=$_Theme_["All"]["Seo"]["color"];?>">
        <meta name="apple-mobile-web-app-statut-bar-style" content="#<?=$_Theme_["All"]["Seo"]["color"];?>">
        <meta name="apple-mobile-web-app-capable" content="#<?=$_Theme_["All"]["Seo"]["color"];?>">
        <meta property="og:title" content="<?=$_Theme_["All"]["Seo"]["name"];?>">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?=$_Theme_["All"]["Seo"]["description"];?>">
        <meta property="og:image" content="<?=$_Theme_["All"]["Seo"]["image"];?>">
        <meta property="og:url" content="<?=$_Serveur_['General']['url'];?>">

        <?php 
        if(!empty($_Theme_['All']['Seo']['google'])){
            echo '<meta name="google-site-verification" content="'.$_Theme_["All"]['Seo']['google'].'" />';
        }
        if(!empty($_Theme_['All']['Seo']['bing'])){
            echo '<meta name="msvalidate.01" content="'.$_Theme_["All"]['Seo']['bing'].'" />';
        }
        ?>


        <?php
        if(file_exists('favicon.ico')){
            echo '<link rel="icon" type="image/x-icon" href="favicon.ico">';
        }elseif(file_exists('fav.ico')){
            echo '<link rel="icon" type="image/x-icon" href="fav.ico">';
        }elseif(file_exists('favicon.png')){
            echo '<link rel="icon" type="image/png" href="favicon.png">';
        }else{
            echo '<link rel="icon" type="image/png" href="'. $_Theme_['All']['Seo']['image'].'">';
        }
        ?>

        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="<?=$_Serveur_['General']['url'];?>">
        <meta name="twitter:title" content="<?=$_Theme_["All"]["Seo"]["name"];?>">
        <meta name="twitter:description" content="<?=$_Theme_["All"]["Seo"]["description"];?>">
        <meta name="twitter:image" content="<?=$_Theme_["All"]["Seo"]["image"];?>">


        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
        <script>
        window.addEventListener("load", function(){
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
        })});
        </script>

    </head>
    <body id="do-nicescroll">
        <div id="scrolltop" class="hidden-xs"><i class="fa fa-chevron-up"></i></div>
        <?php if(isset($_Joueur_)) { ?>
        <?php setcookie('pseudo', $_Joueur_['pseudo'], time() + 86400, null, null, false, true); ?>
        <?php } else { ?>
        <?php } ?>
        <?php
        tempMess();
        include('theme/' .$_Serveur_['General']['theme']. '/entete.php');
        include('theme/' .$_Serveur_['General']['theme']. '/plugins/forumadmin.php');        
        ?>
        <br/>
        <?php include('controleur/page.php'); ?>
        <?php include('theme/' .$_Serveur_['General']['theme']. '/pied.php'); ?>
        <?php include('theme/' .$_Serveur_['General']['theme']. '/formulaires.php'); ?>
        <script src="https://code.jquery.com/jquery-latest.min.js"></script>
        <script src="https://mynameismatthieu.com/WOW/dist/wow.min.js"></script>
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
        <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/jquery.nicescroll.min.js"></script>
        <?php include('theme/'.$_Serveur_['General']['theme'].'/js/forum.php'); ?>
        <script src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>
        <?php if($_Serveur_['Payement']['dedipass'] == true) { ?>
            <script src="//api.dedipass.com/v1/pay.js"></script>
        <?php } ?>
        <?php
        if(!isset($_Joueur_)){
            echo '
            <script src="theme/'. $_Serveur_['General']['theme'] .'/js/zxcvbn.js"></script>
            <script src="theme/'. $_Serveur_['General']['theme'] .'/js/securepass.js"></script>';
        } 
        ?>
        <script src="theme/<?=$_Serveur_['General']['theme'];?>/assets/js/custom.js"></script>
        <script src="theme/<?=$_Serveur_['General']['theme'];?>/js/editor.js"></script>
        <?php include('theme/'. $_Serveur_['General']['theme'] .'/js/notif.php'); ?>
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
        $("#do-nicescroll").niceScroll({
            cursorcolor:"rgb(203, 32, 39)",
            cursorwidth:"5px",
            background:"#333",
            cursorborder:"1px solid rgb(203, 32, 39)",
            cursorborderradius:0,
            scrollspeed: 40,
            autohidemode:false,
        });

        $(window).on('load',function(){
            $('#myModal').modal('show');
        });
        <?php
        if(isset($modal))
        {
        echo "$('#myModal').modal('toggle');";
        }
        ?>
        </script>
    </body>
</html>
<!-- 
    -- Supreme 2.4 adaptation par: PinglsDzn#1702 --
    >>> https://craftmywebsite.fr/forum/index.php?resources/supreme-b%C3%AAta.124/ <<<
    CraftMyWebsite.fr#1.7.3
-->