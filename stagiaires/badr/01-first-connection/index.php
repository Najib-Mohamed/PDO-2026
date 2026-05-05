<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>Badr Dakir</h1>
   <style>
    *{
        background-color: beige;
        margin: 20px;
        text-align: justify;
    }
    h1{
        text-align:center;
    }
   </style>
</body>
</html>
<?php
# Conexion a la base MariaDB
# LISTEPAYS SUR 3307
#

$connectionDB = new PDO("mysql:host=localhost;dbname=listepays;port=3307;charset=utf8mb4",
"root",
""
);

$request = $connectionDB->query("SELECT * FROM `countries`;");

var_dump($connectionDB,$request);


while($badr = $request->fetch(PDO::FETCH_ASSOC)){
    echo $badr['nom']." | ";
}
$request->closeCursor();

$connectionDB = null;