<?php
# Connexion à la base MariaDb
# 'listepays" sur 3307
# mysql : -> on se connecte à MySQL ou MariaDb
# host = localhost -> ip ou url ou serveur
# dbname=listepays; -> nom de la base de donnée
# port=3307; -> port (ici vers MariaDB)
# charset=utfmb4; -> encodage de la connexion

    

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

while($item= $request->fetch(PDO::FETCH_ASSOC)){
    echo $item['nom']." | ";
    }