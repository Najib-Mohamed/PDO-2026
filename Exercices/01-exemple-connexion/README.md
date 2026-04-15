# 01-exemple-connexion

## Installation de la DB

Ouvrez `PHPMyAdmin`, choisissez `MariaDB` avec `root` comme login et pas de mot de passe.

Chargez le fichier `Data/liste_de_pays.sql` en cliquant sur `importer`.

Vous devriez avoir une base nommée `listepays` avec une table `countries`.

### Notre première connexion

Créez un fichier nommé `index.php` dans votre dossier.

Création de la connexion :

```php
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

```