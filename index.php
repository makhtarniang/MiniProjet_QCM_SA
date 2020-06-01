<?php

session_start();

require 'lib/password.php';

/**
 * Inclure MySQL connection.
 */
require 'connection_base.php';

if(isset($_POST['login'])){

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
                header('location:src/interface_admin.php');
                exit;
            }
            else{
                header('location:src/interface_user.php');
                exit;
            }
        } else{
            header('location:index.php');
        }
    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> page de connexion </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="contener">
    <div class="haut">
        <img class="img1" src="img/logo-QuizzSA.png">
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
                <label for="username"><input type="text" name="username" placeholder="Login" id="username" value="<?php !empty($username) ? $username : '' ?>"></label>
                <img class="icone1" src="img/ic-login.png" alt="">
                <label for="password"><input type="password" name="password" placeholder="mot de passe" id="password"></label>
                <img class="icone2" src="img/ic-password.png" alt="">
                <button type="submit" name="login" style="width: 6vw;position: relative;"> Connexion</button>
                <h6 class="inscrire"><a href="register.php"> S'inscrire pour jouer? </a></h6>
                <h6 class="inscrire"><a href="src/recup_mdp.php"> Mot de passe oublier? </a></h6>
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
</div>
</body>
</html>
