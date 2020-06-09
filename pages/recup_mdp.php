<?php
require '../lib/password.php';
/**
 * Inclure le fichier de connection MYSQL.
 */
require '../connexion/connection_base.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> liste questions </title>
	<link rel="stylesheet" type="text/css" href="../asset/css/style1.css">
</head>
<body>
	<div class="contener">
		<div class="haut">
			<div> <img class="img1" src="../asset/img/Images/logo-QuizzSA.png"></div>
			<div> <center><h2 class="text1"> Le plaisir de jouer</h2> </center></div>
		</div>
		<div class="form_joueur">
			<div class="form_joueur1">
				<strong style="margin-left: 2vw"> RECUPERATION MOT DE PASSE</strong><br>
				<h5 style="margin-left: 2vw;margin-top: 0vw;opacity: 0.5;font-size: 10px" >Pour tester votre niveau de culture générale</h5>
				<div class="inscrire1">
				<form method="post" enctype="multipart/form-data" id="Myform">
					<strong><span id="error" style="font-size: 13px"></span><br></strong>
					<label class="label" for="prenom">Prenom</label>
					<p><input type="text" name="prenom" id="prenom"></p><br>
					<label class="label" for="nom">Nom</label>
					<p><input type="text" name="nom" id="nom"></p><br>
					<label class="label" for="login">Login</label>
					<p><input type="text" name="login" id="login"></p><br>
					<button type="submit" name="valid">Valider</button>
				</form>
			</div>
		</div>
		<?php
	include('scripte!.php');
	$contenu=1;
if (isset($_POST['valid'])) {
	if(!empty($_POST['password']) && !empty($_POST['nom']) && !empty($_POST['prenom'])){
 		for ($i=0; $i < count($contenu) ; $i++) { 
 			if (isset($contenu[$i])) {
 				if ($_POST['login'] == $contenu[$i]['login'] && $_POST['nom']==$contenu[$i]['nom'] && $_POST['prenom']==$contenu[$i]['prenom'] ){
 					$prenom=$contenu[$i]['prenom'];
 					$nom=$contenu[$i]['nom'];
 					$trouve=$contenu[$i]['password'];
 					echo "Bonjour Mr ".$prenom." ".$nom."<br>";
					echo "Votre password est:[".$trouve."]<br>";
					echo "BONNE CHANCE !";
 				}else{
 					if ($i+1==count($contenu)) {
 						echo"Merci sur la recuperation de votre mot de passe";
 					}
 				}
 				
 			}
 		}
	}
	
}
?>
		</div>
		</div>
	</div>
</body>
</html>