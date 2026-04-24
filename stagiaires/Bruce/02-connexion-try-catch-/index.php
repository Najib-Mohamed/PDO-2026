<?php

require_once "config-dev.php";

try {
$db = new PDO(
        dsn: DB_connect_type ,
    username: DB_connect_username ,  
    password: DB_connect_password  ,
);
} catch (PDOException $e) {
 echo "code erreur : " . $e->getCode() ;
 echo "<br>message d'erreur : " . $e->getMessage() ;
}