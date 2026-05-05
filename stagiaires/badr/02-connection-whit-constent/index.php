
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countries – PDO JSON</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Arial, sans-serif;
        }

        body {
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        thead {
                
            background: #2c3e50;
            color: white;
     
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
                    
        }
        th{
border-radius: 5px;
        }

        tbody tr:hover {
            background: #f1f1f1;
        }

        pre {
            background: #1e1e1e;
            color: #dcdcdc;
            padding: 20px;
            border-radius: 8px;
            overflow-x: auto;
            margin-top: 30px;
        }

        .debug {
            background: #fff3cd;
            border: 1px solid #ffeeba;
            color: #856404;
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            color: #666;
            font-size: 13px;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Les pays du monde</h1>

    <?php
    require_once "config.dev.php";

    try {
        $pdo = new PDO(
            DB_CONNECT_TYPE .
            ":host=" . DB_CONNECT_HOST .
            ";port=" . DB_CONNECT_PORT .
            ";dbname=" . DB_CONNECT_NAME .
            ";charset=" . DB_CONNECT_CHARSET,
            DB_CONNECT_USER,
            DB_CONNECT_PWD
        );
    } catch (PDOException $e) {
        echo "Number : " . $e->getCode();
        echo "<br>Message de l'erreur :" . $e->getMessage();
    }

    $sql = "SELECT * FROM `countries` ORDER BY `population` DESC";


$sql = "SELECT `nom`, `population`, `capitale`, `continent` FROM `countries` ORDER BY `population` DESC";


    $request = $pdo->query($sql);
    $resultats = $request->fetchAll(PDO::FETCH_ASSOC);
    $request->closeCursor();

    $json = json_encode($resultats, JSON_PRETTY_PRINT);
    ?>

    <!-- TABLE DES PAYS -->
    <table>
        <thead>
            <tr>
                <th>Pays</th>
                <th>Population</th>
                <th>Capitale</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultats as $badr): ?>
                <tr>
                    <td>
                        <span title="<?= $badr['continent'] ?>">
                            <?= $badr['nom'] ?>
                        </span>
                    </td>
                    <td><?= number_format($badr['population'], 0, ',', ' ') ?></td>
                    <td><?= $badr['capitale'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- JSON -->
    <h2>Résultat JSON</h2>
    <pre><?= $json ?></pre>

    <?php
    $file = fopen("allContries.json", "w");
    fputs($file, $json);
    fclose($file);
    ?>

    <!-- DEBUG -->
    <div class="debug">
        <?php var_dump($pdo, $resultats); ?>
    </div>

    <?php $pdo = null; ?>

    <footer>
        © 2026 – Badr Dakir · PDO · MariaDB
    </footer>
</div>

</body>
</html>
