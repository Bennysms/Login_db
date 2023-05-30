<?php
$host = "localhost";
$dbname = "id20689102_compte";
$username ="id20689102_benny";
$pawd ="Bennysimisi2023@";
$dsn = "mysql:dbname=".$dbname.";host=".$host;


try {
    $db = new PDO($dsn,$username,$pawd);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Erreur".$e->getMessage());
}