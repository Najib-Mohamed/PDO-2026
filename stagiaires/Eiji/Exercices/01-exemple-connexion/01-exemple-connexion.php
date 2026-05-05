<?php


# Notre première connexion via PDO

$connexionPDO = new PDO(
    # dsn (Data Source Name) → paramètres de 
    # connexion à la DB listepays sur le port 3307
    # de notre host localhost en charset utf8mb4
    "mysql:host=localhost;dbname=listepays;port=3307;charset=utf8mb4;",
    # username -> Votre login
    "root",
    # password -> Votre mot de passe
    "",
);



// on crée la requête qu'on va effectuer sur notre connexion, elle sera de type PDOStatement
$request = $connexionPDO->query("
    SELECT * FROM countries;
");

// affichage de notre instance (notre object)
// de type PDO, puis PDOStatement
var_dump($connexionPDO,$request);

// On va utiliser un while pour parcourir
// chaque élément du tableau et transformer
// chaque résultat en tableau associatif
while($item = $request->fetch(PDO::FETCH_ASSOC)){
    // Affichage de la clef venant de la table
    // ici 'nom'
    echo $item['nom']." | ";
}

// bonne pratique, fermeture de la requête
// utile pour relancer cette requête
// dans certains languages SQL MS-SQL
$request->closeCursor();

// bonne pratique (pour connexion non permanente),
// fermer la connexion
// sql (inutile pour MySQL et MariaDB
// qui le font en fin de page)
$connexionPDO = null;
