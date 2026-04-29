<?php 

// Chargement de nos constantes de connexion
require_once 'config-dev.php';


// Tentative de connexion
try{

    $connectDB = new PDO(DB_DSN, DB_CONNECT_USER, DB_CONNECT_PWD,);

}catch(Exception $e){
    // arrêt et affichage de l'erreur 
    die("Numéro d'erreur {$e->getCode()} <br> Message d'erreur {$e->getMessage()}");
}


// On récupére les messages
$request = $connectDB->query("SELECT * FROM `message`");


// On compte le nombre de message(s) affecté(s) ici récupéré(s)
$nbMessage = $request->rowCount();

// Si pas de message
if($nbMessage === 0){
    $message = "Pas encore de message";

// On à au moins un message    
}else{
    // On va récupérer les résultats dans un format gérable par PHP
    $results = $request->fetchAll(PDO::FETCH_ASSOC);
}

$request->closeCursor();

$connectDB = null;

// var_dump($connectDB,$request,$nbMessage,$message);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or | Événement ABC</title>
</head>
<body>
    <h1>Livre D'or</h1>
    <p>Merci de me laisser un message sur l'événement ABC</p>
    <form action="" method="POST" name="Message">
        <label for="email">Email :</label>
        <input type="text" name="email_message" placeholder="Votre mail" required />
        <br>
        <label for="text">Message</label>
    <textarea id="text" name="texte_message" placeholder="Votre message"></textarea>
    <input type="submit" value="Envoyer">
    </form>
<div>
<?php 
    if(isset($message)):
?>
<h3><?=  $message ?></h3>
<?php 
    endif;
?>
</div>
</body>
</html>

