<?php if($pages['titre'] == "" && $pageContenu[$j][0] == ""){ ?>
<style>
    .content-headline{
        display:none;
    }
</style>
<section class="content-item grey" id="error">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
                <div class="error-box">
                    <h2><i class="fa fa-exclamation-circle"></i> Page non trouvée (404)</h2>
                    <p>La page demandée n'existe pas . <br>Retournez à <a href="index.php">l'accueil</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } else { ?>
<?php } ?>
<section class="content-item grey">
<div class="container">
    <div class="content-headline">
        <h2><?php echo $pages['titre']; ?></h2>
        <?php for($j = 0; $j < count($pages['tableauPages']); $j++) { ?>
        <h3><?php echo $pageContenu[$j][0]; ?></h3>
    </div>
    <?php echo $pageContenu[$j][1]; ?>		
    <?php } ?>
</div>
</section>