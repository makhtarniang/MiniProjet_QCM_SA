<?php
//echo"magui si bir";
session_start();

//require 'lib/password.php';

/**
 * Inclure MySQL connection.
 */
include('connexion/connection_base.php');

if(isset($_POST['username'])){

    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $sql = "SELECT id, login, password, role FROM users WHERE login = :username";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user === false){
        header('location:index.php');
    } else{
        $validPassword = password_verify($passwordAttempt, $user['password']);
        if($validPassword){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = time();
            if ($user['role'] == 'admin'){
               header('location:pages/creer_quest.php');
             #  echo 'admin';
               exit;
            }
            else{
               # echo 'joueur';
             header('location:pages/question.php');
               // exit;
            }
        } else{
            echo"mot de passe incorecte";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> page de connexion </title>
    <link rel="stylesheet" type="text/css" href="asset/css/style.css">
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
<div class="contener">
    <div class="haut">
        <img class="img1" src="asset/img/Images/logo-QuizzSA.png">
        <div>
            <h2 class="text1" style="text-align: center"> page de connexion</h2>
        </div>
    </div>
    <?php if (isset($vide)) {
        ?>
        <P>Tous les champs sont obligatoires!</p>

        <?php
    }
    ?>

    <div class="form">
        <div class="login_form">
            <h4 class="log_form"> Login</h4>
        </div>
        <div>
            <form method="post" enctype="multipart/form-data" id="Myform">
                <label for="username"><input type="text" name="username" placeholder="Login" id="username" value="makhou"<?php !empty($username) ? $username : '' ?>"></label>
                <img class="icone1" src="asset/img/Icones/ic-login.png" alt="">
                <label for="password"><input type="password" name="password" class="password" placeholder="mot de passe" id="password" value="mot de p"></label>
                <img class="icone2" src="asset/img/Icones/ic-password.png" alt="">
                <button type="submit" name="login" id="connexion" style="width: 6vw;position: relative;"> Connexion</button>
                <h6 class="inscrire"><a href="pages/creer_user.php"> S'inscrire pour jouer? </a></h6>
                <h6 class="inscrire"><a href="pages/recup_mdp.php"> Mot de passe oublier? </a></h6>
            </form>

        </div>
    </div>
    <div class="error">
        <?php if(isset($_POST['login']) && (empty($_POST['username']) || empty($_POST['password']))) {
            ?>
            <P>Login ou mot de passe incorrecte!</p>
            <?php
        } ?>
    </div>
    <strong><span id="error" style="font-size: 13px"></span><br></strong>

    <script src="pages/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>

$(document).ready(function()
{
    $("#connexion").click(function(e)
    {
        e.preventDefault();

       var username= $('#username').val();
        var password= $('.password').val();
        $.ajax({
       url : 'controller/indexContoller.php',
       type : 'POST',
       dataType :'text',
       data: {username:username,password:password},
       success: function(data){
          console.log(data);
          if(data == 'admin'){
              window.location.href('pages/creer_user.php')
          }





        
         
       },

       error : function(resultat, statut, erreur){
         
       },

    });
    });

});
</script>
</body>
</html>
