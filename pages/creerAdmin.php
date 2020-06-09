<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('location:../index.php');
}
$bd=file_get_contents("../asset/json/base.json");
$contenu=json_decode($bd,true);
?>
<?php include('fonction.php') ?>
<?php include('comm.php') ?>
<style type="text/css">
	.Ca{
		background: linear-gradient( white, rgb(81,191,208));
	}
	.BCa{
				background-color: green;
	}
	.m2Ca{
				width: 20%;
				height: 43px;
				float: right;
				background-image: url('../asset/img/Icones/ic-ajout-active.png');
				background-repeat: no-repeat;
				margin-top: 10px;
			}
</style>
			<div class="form2">
				<strong style="margin-left: 2vw"> S'INSCRIRE</strong><br>
				<h5 style="margin-left: 2vw;margin-top: 0vw;opacity: 0.5">pour proposer des quizz</h5>
				<div class="insc_admin">
				<div class="inscrire">
				<form method="post" enctype="multipart/form-data" id="Myform">
					<strong><span id="error" style="font-size: 13px"></span><br></strong>
					<label class="label" for="prenom">Prenom</label>
					<p><input type="text" name="prenom" id="prenom"></p><br>
					<label class="label" for="nom">Nom</label>
					<p><input type="text" name="nom" id="nom"></p><br>
					<label class="label" for="login">Login</label>
					<p><input type="text" name="login" id="login"></p><br>
					<label class="label" for="password">Password</label>
					<p><input class="pass" type="password" name="password" id="password"></p><br>
					<label class="label" for="conf">Confirmer Password</label>
					<p><input class="pass" type="password" name="Confirmer" id="conf"></p><br>
					<label class="label">Avatar</label>
					<input style="width: 10vw;" type="file" name="image" id="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"/>
					<input type="hidden" name="role" value="admin">
					<input type="hidden" name="score" value=0>
					<button type="submit" name="valid">Cr&eacute;er compte</button>
				</form>
				</div>
				<div class="tofadmin">
					<div class="image_admin">
						<img id="blah"  width="120" height="120" style="border-radius:50%" />
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	include('scripte!.php');
if (isset($_POST['valid'])) {
	$n=strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
	for ($i=0; $i <count($contenu) ; $i++) { 
		if ($_POST['login']==$contenu[$i]['login']) {
			?>
			<center><h2>Ce login existe !</h2></center>
			<?php
			exit;
		}
	}
	if ($n=="jpg" || $n=="png"|| $n=="jpeg") {
		inscription();
	}else{
		?>
			<center><h2>extension non valide !</h2></center>
		<?php
	}
	
}
?>
</body>
</html>
