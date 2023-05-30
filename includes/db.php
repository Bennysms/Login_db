<?php
$host = "localhost";
$dbname = "compte";
$username ="root";
$pawd ="root";
$dsn = "mysql:dbname=".$dbname.";host=".$host;


try {
    $db = new PDO($dsn,$username,$pawd);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Erreur".$e->getMessage());
}