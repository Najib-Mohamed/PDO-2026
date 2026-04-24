<?php

//Connection à la bdd "listepays"sur 3307
// mysql: -> on se connect à MySQL ou MariaDB
// host=localhost -> ip ou url du serveur 
// DBame=listepays; -> nom de la bdd 
// port=3307; ->  port (ici vers MariaDB)
// charset=utf8mb4; encodage de la connexion 

$connexionDB = new PDO(
    "mysql:host=localhost;
    dbname=listepays;
    port=3307;
    charset=utf8mb4",
    "root",
    "");

// On va recupérer tous les pays de la tables countries 
$request = $connexionDB->query(
    "SELECT * FROM countries;"
);

var_dump($connexionDB, $request);

// Mauvaise pratique recommandé par toutes les IA
// (ingérable en OO), mais vide la mémoire (donc plus rapide)
// affiche les résultats ligne par ligne 
while($item = $request->fetch(PDO::FETCH_ASSOC)){
    // afficher tous les pays 
    echo $item['nom']." | ";
}

// Bonne pratique (mais tard si on utilise l'affichage avant la déconnexion)
$request->closeCursor(); 

//fermeture de la connexion 
// inutile pour MariaDB et MySQL, utile pour d'autres système SQL 
$connexionDB = null; 
