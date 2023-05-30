<?php
session_start();
if($_SESSION['auth'] == false){
    header('Location:login.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bienvenue</title>
    <style>
        p{
            text-align:center;
        }
    </style>
</head>
<body>
    <main>
        <img class="avatar" src="user.PNG">
        <p class="name">Bienvenu dans votre compte, <?=$_SESSION['name'];?></p>
        <p class="username">@<?=$_SESSION['login'];?></p>
        <p class="email"><?=$_SESSION['email'];?></p>
        <a href="logout.php" class="logout">Déconnexion</a>
    </main>
</body>
</html>