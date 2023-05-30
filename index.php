<?php
session_start();
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $pass = password_hash($_POST['pwd'],PASSWORD_DEFAULT);
    if(isset($nom) && isset($email) && isset($login) && isset($pass) && !empty($nom) && !empty($email) && !empty($login) && !empty($pass)){
    require("includes/db.php");
    

    $select_query = $db->prepare("SELECT * FROM `user` WHERE login = ?");
        $select_query->execute([$login]);
        $fetch = $select_query->fetch(PDO::FETCH_ASSOC);

        if($fetch['login'] == $login){

            $error ="Login déjà pris, veuillez changer";
        }
        else{
            $insert_query = $db->prepare("INSERT INTO user(nom, email, login, password) VALUES(?, ?, ?, ?)");
            $insert_query->execute([$nom,$email,$login,$pass]);
            $success = "Compte crée avec success";
            $_SESSION['auth'] = false;
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
    <title>Inscription</title>
</head>
<body>
    <main>
        <h1>S'enregistrer</h1>
        <form action="" method="POST">
            <p class="<?php echo (isset($error)) ? 'erreur' : 'success' ;?>">
                <?php if(isset($error)){echo $error;}
                elseif(isset($success)){echo $success;}?>
            </p>
            <input type="text" name="nom" placeholder="Nom complet">
            <input type="email" name="email" placeholder="Adresse email">
            <input type="text" name="login" placeholder="Username">
            <input type="password" name="pwd" placeholder="Mot de passe">
            <input type="submit" value="Créer un compte" class="submit" name="submit">
            <p>Déjà membre ? <a href="login.php">connectez-vous !</a></p>
        </form>
    </main>
</body>
</html>