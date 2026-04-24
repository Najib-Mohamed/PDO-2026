<?php
# Connexion à la base MariaDB
# 'listepays' sur 3307
# mysql: -> on se connecte à MySQL ou MariaDB
# host=localhost -> ip ou url du serveur
# dbname=listepays; -> nom de la base de donnée
# port=3307; -> port (ici vers MariaDB)
# charset=utf8mb4; -> encodage de la connexion
$connectionDB = new PDO("mysql:host=localhost;dbname=listepays;port=3307;charset=utf8mb4;",
"root",
""
);

# On va récupérer tout les pays de 
# la table countries
$request = $connectionDB->query(
    "SELECT * FROM countries;"
);

var_dump ($connectionDB,$request);

// Mauvaise pratique recommandée par toutes les IA
// (ingérable en OO), mais vide la mémoire donc
// plus rapide, affiche les résultats lignes par ligne
while($item = $request->fetch(PDO::FETCH_ASSOC)){
    // Affichage de tout les pays
    echo $item['nom']." | ";
};

// bonne pratique (mais tard si on utilise
// l'affichage avant la déconnexion)
// Inutile pour MariaDB et MySQL, utile pour d'autres
// systèmes SQL
$request->closeCursor();

// Fermeture de la connexion
// pour les bases de données 
// Inutile pour MariaDB et MySQL, utile pour d'autres
// systèmes SQL

$connectionDB = null;