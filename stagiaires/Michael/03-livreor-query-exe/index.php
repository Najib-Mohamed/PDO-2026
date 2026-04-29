<?php

// chargement de nos constantes de connexion
require_once 'config-dev.php';

// tentative de connexion
try{
    $connectDB = new PDO(DB_DSN, DB_CONNECT_USER, DB_CONNECT_PWD);
}catch(Exception $e){
    // arrêt et affichage de l'erreur (en dev)
    die($e->getMessage());
}

// on récupère les messages
$request = $connectDB->query("SELECT * FROM `message`");

// on compte le nombre de message(s) affecté(s) ici récupéré(s)
$nbMessage = $request->rowCount();

// si pas de message
if($nbMessage===0){
    $message ="Pas encore de message";

// on a au moins 1 message, mais probablement plus    
}else{
    // on va récupérer les résultats dans un format gérable par PHP
    $results = $request->fetchAll(PDO::FETCH_ASSOC);
}

$request->closeCursor();

$connectDB = null;

// var_dump($connectDB,$request,$nbMessage,$message,$results);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or | Evénement ABC</title>
</head>
<body>
    <h1>Livre d'or</h1>
    <p>Merci de me laisser un message sur l'événement ABC</p>
    <form action="" method="POST" name="Message">
        <input type="text" name="email_message" placeholder="Votre mail" /><br>
        <textarea name="texte_message" placeholder="Votre message"></textarea><br>
        <input type="submit" value="Envoyer"/>
        <?php
        var_dump($_POST);
        ?>
    </form>
    <div>
    <?php
    if(isset($message)):
    ?>
    <h3><?= $message ?></h3>
    <?php
    endif;
    ?>
    </div>
</body>
</html>
