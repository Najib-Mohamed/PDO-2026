<?php
$connectionDB = new PDO(
    "mysql:host=localhost;dbname=listepays;port=3307;charset=utf8mb4;",
    "root",
    ""
    );


$request = $connectionDB->query(
    "SELECT * FROM `countries`;"
);
  
var_dump($connectionDB,$request);
while($item = $request->fetch(PDO::FETCH_ASSOC)){
//affichage de tous les pays    
echo $item['nom']." *_* ";

}
$request->closeCursor();
$connectionDB=null;