
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> liste questions </title>
	<link rel="stylesheet" type="text/css" href="../asset/css/style1.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/styleImg.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!---------  library for icon     -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</head>
<body>
<?php
#session_start();
require '../lib/password.php';
/**
 * Inclure MySQL connection.
 */
require '../connexion/connection_base.php';
?>
	<div class="contener">
		<div class="haut">
			<div> <img class="img1" src="../asset/img/Images/logo-QuizzSA.png"></div>
			<div> <center><h2 class="text1">  CREER ET PARAMERTER VOS QUIZZ</h2> </center></div>
		</div>
		<div class="band">
			<div>
			<label class="text11">Lister Question</label>
			<label class="text11">Creer Admin</label>
			<label class="text11">Listre jouers</label>
			 </div>
			<div class="logout"><button><a href="logout.php" onclick="return(confirm('voulez vous deconnecter?'));"> Deconnexion</a></button></div>
		</div>
		<div class="formm">
			<div class="form">
				<div class="profil">
					<div class="roundeImage">
						<img style=" width: 90px;height: 90px;border-radius: 50%; " src="../asset/img/lds.JPEG<?php echo $_SESSION['user']['image'] ?>">
						
					</div>
					<div style="margin-left: 50%;color: white;font-size: 20px">
					<br>
					<div><?php# echo $_SESSION['user']['prenom'] ?></div>
					<div style="margin-left: 2vw"><?php #echo $_SESSION['user']['nom'] ?></div>
					</div>
				</div>
			<!--	<div class=menu>
					<div class="barre BLq"></div>
					<div class="menu1 Lq">
						<div class="m1"> <p><strong><a href="liste_quest.php">Liste Questions</a></p></strong></div>
						<div class="m2Lq"></div>
					</div>
					<div class="barre BCa"></div>
					<div class="menu1 Ca">
						<div class="m1"> <p><strong><a href="creerAdmin.php">Creer Admin</a></p></strong></div>
						<div class="m2Ca"></div>
					</div>
					<div class="barre BLj"></div>
					<div class="menu1 Lj" >
						<div class="m1"> <p><strong><a href="liste_joueur.php">Liste joueurs</a></p></strong></div>
						<div class="m2Lj"></div>
					</div>
					<div class="barre BCq"></div>
					<div class="menu1 Cq">
						<div class="m1"> <p><strong><a href="creer_quest.php">Creer Questions</a></p></strong></div>
						<div class="m2Cq"></div>
					</div>
					
				</div>
			</div>-->
			
</body>
</html>