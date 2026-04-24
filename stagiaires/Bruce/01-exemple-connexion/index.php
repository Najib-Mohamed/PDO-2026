<?php 

#premiere connexion via PDO

$connexionPDO = new PDO(
    dsn: "mysql:host=localhost;dbname=listepays;port=3307;charset=utf8mb4",
    username: "root",  
    password: "" ,
);
$request = $connexionPDO->query("SELECT * FROM countries LIMIT 10");
var_dump($connexionPDO,$request);

while ($item = $request->fetch(PDO::FETCH_ASSOC)) {
    echo $item['nom']. " | " ;
}

$request->closeCursor(); #ferme la connexion à la BDD
