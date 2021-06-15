<?php
if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsPanel']['theme']['actions']['editTheme'] == true)
{
	//----------------------------------------------------------------------//
	$ecritureTheme['Pied']['facebook'] = htmlspecialchars($_POST['facebook']);
	$ecritureTheme['Pied']['twitter'] = htmlspecialchars($_POST['twitter']);
	$ecritureTheme['Pied']['youtube'] = htmlspecialchars($_POST['youtube']);
	$ecritureTheme['Pied']['discord'] = htmlspecialchars($_POST['discord']);
  	$ecritureTheme['All']['1']['titre'] = htmlspecialchars($_POST['titre1']);
	$ecritureTheme['All']['2']['titre'] = htmlspecialchars($_POST['titre2']);
  	$ecritureTheme['All']['3']['titre'] = htmlspecialchars($_POST['titre3']);
  	$ecritureTheme['All']['1']['texte'] = htmlspecialchars($_POST['texte1']);
	$ecritureTheme['All']['2']['texte'] = htmlspecialchars($_POST['texte2']);
	$ecritureTheme['All']['3']['texte'] = htmlspecialchars($_POST['texte3']);
	$ecritureTheme['All']['Seo']['color'] = htmlspecialchars($_POST['color']);
	$ecritureTheme['All']['Seo']['name'] = htmlspecialchars($_POST['name']);
	$ecritureTheme['All']['Seo']['description'] = htmlspecialchars($_POST['description']);
	$ecritureTheme['All']['Seo']['image'] = htmlspecialchars($_POST['image']);
	$ecritureTheme['All']['Seo']['google'] = htmlspecialchars($_POST['google']);
	$ecritureTheme['All']['Seo']['bing'] = htmlspecialchars($_POST['bing']);
	//----------------------------------------------------------------------//
	$ecritureTheme['All']['1']['icone'] = $_POST['icone1'];
	$ecritureTheme['All']['2']['icone'] = $_POST['icone2'];
	$ecritureTheme['All']['3']['icone'] = $_POST['icone3'];
	//----------------------------------------------------------------------//
	$ecritureTheme['Infos']['1']['message'] = $_POST['imsg1'];
	$ecritureTheme['Infos']['2']['message'] = $_POST['imsg2'];
	$ecritureTheme['Infos']['3']['message'] = $_POST['imsg3'];
	$ecritureTheme['Infos']['4']['message'] = $_POST['imsg4'];
	$ecritureTheme['Infos']['5']['message'] = $_POST['imsg5'];
	//----------------------------------------------------------------------//
	$ecritureTheme['cookies']['bg'] = htmlspecialchars($_POST['bgcookies']);
	$ecritureTheme['cookies']['bouton'] = htmlspecialchars($_POST['boutoncookies']);
	$ecritureTheme['cookies']['message'] = htmlspecialchars($_POST['messagecookies']);
	//----------------------------------------------------------------------//
	$ecritureTheme['All']['forum']['discord']['etat'] = $_POST['discordetat'];
	$ecritureTheme['All']['forum']['discord']['id'] = $_POST['discordid'];
	$ecritureTheme['All']['forum']['twitter']['etat'] = $_POST['twitteretat'];
	$ecritureTheme['All']['forum']['twitter']['id'] = $_POST['twitterid'];
	//----------------------------------------------------------------------//
	$ecritureTheme['All']['Tokens']['nom'] = $_POST['nomtoken'];
	$ecritureTheme['All']['Tokens']['icon'] = $_POST['icontoken'];
	//----------------------------------------------------------------------//
	$ecritureTheme['couleur'] = $_POST['couleurtheme'];
	//----------------------------------------------------------------------//
	$ecritureTheme['All']['Boutique']['historique'] = $_POST['historique'];
	$ecritureTheme['All']['Boutique']['panier'] = $_POST['panier'];
	//----------------------------------------------------------------------//
	$ecritureTheme['img']['banner'] = htmlspecialchars($_POST['bannerimg']);
	$ecritureTheme['All']['YT'] = htmlspecialchars($_POST['youtube']);
	$ecriture = new Ecrire('theme/'.$_Serveur_['General']['theme'].'/config/config.yml', $ecritureTheme);
}
?>
