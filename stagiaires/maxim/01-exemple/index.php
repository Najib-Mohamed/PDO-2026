<?php

// Notre première connexion via PDO

$connexionPDO = new PDO(
    "mysql:host=localhost;dbname=listepays;port=3307;charset=utf8mb4",
    "root",
    ""
);



$request = $connexionPDO->query("
    SELECT * FROM countries;
");
var_dump($connexionPDO,$request);


while($item = $request->fetch(PDO::FETCH_ASSOC)){
    echo $item['nom']." | ";
}