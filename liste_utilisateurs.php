<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2> utilisateurs </h2>
<?php

include 'menu.php';

//définition des variables de connexion
$dbhost = "localhost";
$dbname = "gestionparc";
$dbuser = "root";
$dbpwd = "";
$dbport = 3306;

//connexion à la base de données
$bdd = new PDO("mysql:host=$dbhost;port=$dbport;dbname=$dbname","$dbuser",$dbpwd);
var_dump($bdd);

//requête à exécuter
$sql = "SELECT * FROM utilisateur";

//exécution de la requête (appel de la méthode query sur l'objet BDD)
$stmt = $bdd->query($sql);

//liste des utilisateurs
$liste_utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

//affichage des résultats
foreach ($liste_utilisateurs as $utilisateur) {
?>
    <a href="utilisateur.php?id=<?= $utilisateur["id_utlisateur"] ?>">
        <?= $utilisateur["prenom_utilisateur"]." ".$utilisateur["nom_utilisateur"] ?>
    </a>
    <br>
<?php
}

//vidage mémoire
$bdd = Null;

?>
    
</body>
</html>