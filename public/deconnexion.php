<?php

session_start();

//Supprimer dans la session les informations liées à la connexion de l'utilisateur => la clé 'uitlisateur' dans $_SESSION

unset($_SESSION['utilisateur']);

//$_SESSION = [];
// session_destroy(); //supprimer le fichier de la session sur le serveur
//Supprimer le cookie de session sur le navigateur

//Rediriger vers index.php
header("Location: index.php");
exit;


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>