<section class="content-item">
    <div class="container">
        <div class="content-headline">
            <h2>Banlist</h2>
            <h3>La liste des joueurs bannis.</h3>
        </div>
			<?php if(count($jsonCon) > 0) {
				require('modele/app/chat.class.php');
				$Chat = new Chat($jsonCon);?>
				<ul class="nav nav-tabs" style="margin-bottom:1vh;">
				<?php for($i = 0; $i < count($jsonCon); $i++) {?>
					<li class="nav-item">
						<a href="#serv_<?= $i ?>" data-toggle="tab" class="nav-link <?php if($i == 0) echo 'active'; ?>"><?php echo $lecture['Json'][$i]['nom']; ?></a>
					</li>
				<?php }?>
				</ul>

				<div class="tab-content">
					<?php for($i=0; $i < count($jsonCon); $i++) {
	?>
					<div id="serv_<?=$i?>" class="tab-pane fade <?php if($i==0) echo 'in active show'; ?>" aria-expanded="false">
						<table class="table table-bordered">
							<tr>
								<th>Pseudo</th>
								<th>Date</th>
								<th>Par</th>
								<th>Durée</th>
								<th>Raison</th>
							</tr>
							<?php
							foreach($banlist[$i] as $element) {?>
							<tr>
								<td title="<?= $element->uuid?>"><?= $element->name?></td>
								<td><?= $element->created ?></td>
								<td><?= $Chat->formattage($element->source); ?></td>
								<td><?= $element->expires ?></td>
								<td><?= $element->reason ?></td>
							</tr>
							<?php }?>
						</table>
					</div>
					<?php }?>
				</div>
			<?php }else{
				echo 'Veulliez relier votre serveur via jsonapi / rcon sur <a href="admin.php" target="_blank">le panel</a> d\'administration';
				} ?>
		</div>
    </div>
</section>
