<a href="liste_utilisateurs.php">Retour à la liste des utilisateurs</a>

<?php

    $dbhost = "localhost";
    $dbname = "gestionparc";
    $dbuser = "root";
    $dbpwd = "";
    $dbport = 3306;
    
    //connexion à la base de données
    $pdo = new PDO("mysql:host=$dbhost;port=$dbport;dbname=$dbname","$dbuser",$dbpwd);

    //requête à exécuter
    $sql = "SELECT * FROM utilisateur where id_utlisateur=?";

    //exécution de la requête
    $stmt = $pdo->prepare($sql); //preparation de la requête
    $stmt->execute([$_GET['id']]); //exécution de la requête

    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($utilisateur);

    ?>

    <h2><?= $utilisateur["prenom_utilisateur"]." ".$utilisateur["nom_utilisateur"] ?>