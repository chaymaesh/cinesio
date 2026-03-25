<?php

require_once __DIR__ ."/../config/database.php";


function getConnexion() : PDO {
    
try {
    $dsn = "pgsql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=". DB_NAME ;
    $connexion= new PDO($dsn, DB_USER,DB_PASSEWORD);
    return $connexion;
} catch (PDOException $erreur) { 
    //Afficher un msg d'erreur 
    echo "Erreur : " .$erreur->getMessage();
    exit;
    }

}

