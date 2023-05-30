<?php 
    session_start();
    ini_set('display_errors',1);
    
    if (isset($_POST['submit'])) {

        $login = $_POST['login'];
        $pass = $_POST['pass'];
        if(isset($login) && isset($pass) && !empty($login) && !empty($pass)){
        
            require("includes/db.php");
            $select_query = $db->prepare("SELECT * FROM `user` WHERE login =?");
            $select_query->execute([$login]);

            if($select_query->rowCount() > 0){
                $fetch = $select_query->fetch(PDO::FETCH_ASSOC);
                $pwd = password_verify($pass, $fetch['password']);
                if($pwd == 1){
                    $_SESSION['auth'] = true;
                    $_SESSION['login'] = $fetch['login'];
                    $_SESSION['email'] = $fetch['email'];
                    $_SESSION['name'] = $fetch['nom'];
                    header('Location:compte.php');       
                }
                else{
                    $error ="login ou mot de passe incorrect !";
                } 
            }
            else{
                $error ="Aucun compte trouvé !";
            }   
        }
        else{
            $error ="Veuillez remplir tous les champs";
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
    <main>
        <h1>Connexion</h1>
        <form action="" method="POST">
            <p class="erreur"><?php if(isset($error))echo $error;?> </p>
            <input type="text" name="login" placeholder="Username">
            <input type="password" name="pass" placeholder="Mot de passe">
            <input type="submit" value="Créer un compte" class="submit" name="submit">
            <p>Pas encore membre ? <a href="index.php">créer un compte !</a></p>
        </form>
    </main>
</body>
</html>
