<?php

// controleur frontal
// on charge les dependance 
// on prend celui de développement

require_once 'config.dev.php';


// on essaie de se connecter à la base de données
try {
    $db = new PDO(
        dsn:DB_CONNECT_TYPE.":host=",
        username:DB_CONNECT_HOST,
        password:DB_CONNECT_PWD,

    );
} 
// en cas d'erreur on 
// on instencie une exception de type PDOException
// une variable $e de type PDOException est créée et contient les informations de l'erreur
catch (PDOException $e) {
    //afficher le code erreur 
    echo "Code d'erreur : ".$e->getCode() . "<br>";
    // afficher le message d'erreur
    echo "Message d'erreur : ".$e->getMessage() . "<br>";
}