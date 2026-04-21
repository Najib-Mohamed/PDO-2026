<?php
# Contrôleur Frontal | Front Controller

# On charge les dépendances, on va prendre celui
# de développement (qui va sur github car local)
require_once 'config-dev.php';

// on essaye de se connecter
try{
    $db = new PDO(
        DB_CONNECT_TYPE.":host=",
        DB_CONNECT_USER."e",
        DB_CONNECT_PWD,
    );


// si on a une erreur
// on instancie automatiquement
// $e avec PDOException 
// $e = new PDOException()    
}catch(PDOException $e){
    // on affiche le code erreur
    echo "Code Erreur : ".$e->getCode();
    // on affiche le message
    echo "<br>Message d'Erreur : ".$e->getMessage();

}