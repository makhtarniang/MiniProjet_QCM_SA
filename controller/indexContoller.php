<?php
//echo"magui si bir";
session_start();

//require 'lib/password.php';

/**
 * Inclure MySQL connection.
 */
include('../connexion/connection_base.php');

if(isset($_POST['username'])){

    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $sql = "SELECT id, login, password, role FROM users WHERE login = :username";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user === false){
        header('location:../index.php');
    } else{
        $validPassword = password_verify($passwordAttempt, $user['password']);
        if($validPassword){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = time();
            if ($user['role'] == 'admin'){
               header('location:../pages/creer_quest.php');
               echo 'admin';
               exit;
            }
            else{
                echo 'joueur';
               // header('location:pages/question.php');
               // exit;
            }
        } else{
            echo"mot de passe incorecte";
        }
    }
}
?>