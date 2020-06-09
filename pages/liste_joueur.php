<?php
session_start();
/*if (!isset($_SESSION['user'])) {
	header('location:../index.php');
}
$bd=file_get_contents("../asset/json/base.json");
$contenu=json_decode($bd,true);

// Obtient une liste de colonnes
foreach ($contenu as $key => $row) {
    $score[$key]  = $row['score'];
}

// Tri les données par score décroissant, 
// Ajoute $contenu en tant que premier paramètre, pour trier par la clé commune
array_multisort($score, SORT_DESC,$contenu);
*/
?>
<?php
include_once "../connexion/connection_base.php";
$sql = "SELECT id, nom, prenom, score
FROM joueur p JOIN question C2 on p.IdQ = C2.Id";
$rs = $db->query($sql);
#$res = $rs->fetchAll(PDO::FETCH_OBJ);
$res=1;
?>
<?php include('comm.php') ?>
<style type="text/css">
	.Lj{
		background: linear-gradient( white, rgb(81,191,208));
	}
	.BLj{
		background-color:green;
	}
	.m2Lj{
				width: 20%;
				height: 43px;
				float: right;
				background-image: url('../asset/img/Icones/ic-liste-active.png');
				background-repeat: no-repeat;
				margin-top: 10px;
			}
</style>
		<div id="form2">		
	<div class="question">
  <form method="post">
  <table class="table" border="1">
    <tr class="thead">
        <th>NOM</th>
        <th>PRENOM</th>
        <th>SCORE</th>
        <th>ACTIONS</th>
	</tr>
    <?php foreach ($res as $re):?>
        <tr>
            <td><?= $re->nom ?></td>
            <td><?= $re->prenom ?></td>
            <td><?= $re->score ?></td>
            <td>
                <a href="">Modifier</a>
                <a href="">Supprimer </a>
            </td>
		</tr>
            <?php endforeach; ?>
	           </table>		
	            <?php
					//Recuperation des joueur dans un tableau new
					$new=array();
					for ($i=0; $i < count($contenu) ; $i++) { 
						if ($contenu[$i]['role']=="joueur") {
							array_push($new, $contenu[$i]);
						}
					}
					if (isset($_POST['suivant'] ) && $_SESSION['fin']<count($new)) {
						$debut=$_SESSION['fin'];
						$fin=$_SESSION['fin']+13;
					}elseif (isset($_POST['precedent']) && $_SESSION['fin']>13) {
						$debut=$_SESSION['fin']-26;
						$fin=$_SESSION['fin']-13;
					}else{
						$debut=0;
						$fin=13;
					}
					
					$_SESSION['fin']=$fin;
						?>	
					</table>
				</div>
				<?php
				if (isset($_POST['suivant']) OR $_SESSION['fin']>=25) {
					echo "<button  name='precedent'> Precedent</button> ";
				}
				?>
				<?php
				if ($_SESSION['fin']< count($new)) {
					echo "<button class='bttn' name='suivant' style='float:right'> suivant</button> ";
				}
				
				?>
				</form>
			</div>
		</div>
	</div>
	
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</script>
</html>