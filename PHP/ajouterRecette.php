<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/style.css" rel="stylesheet" type="text/css" />
    <title>Nos Recettes</title>
</head>
<body>

<form action = "<?php print $_SERVER['PHP_SELF'];?>" method = "post">
    <div class="formulaireRecette">
        <p>Nom de la recette</p>
        <input type="text" name="titre">
    </div>
    <div class="formulaireRecette">
        <p>Contenu</p>
        <textarea id ="contenu" rows="10" cols="40" name="contenu">Détail de la recette avec ingrédients</textarea>
    </div>
    <div class="formulaireRecette">
        <p>Résumé</p>
        <textarea id ="resume" rows="10" cols="40" name="resume">Votre résumé ici</textarea>
    </div>
    <div class="formulaireRecette">
        <p>Image</p>
        <input type="text" name="image">
    </div>
    <div class="formulaireRecette">
        <p>Catégorie</p>
        <select id="cat" name="categorie" size="3">
            <option>Entrée</option>
            <option>Plats</option>
            <option>Dessert</option>
        </select>
    </div>
<button type="button">Ajouter la recette!</button>
</form>

<?php

$db_host = 'mysql.info.unicaen.fr';
$db_name = 'sefriou221_bd';
$db_username = 'sefriou221';
$db_port = '3306';
$db_password = 'chei4pi0Eevoopho';

try{
    //$mysqlConnection = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.';charset=utf8', $db_username, $db_password);
    $mysqlConnection = new PDO("mysql:host=$db_host:$db_port;dbname=$db_name;charset=utf8",$db_username ,$db_password );
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$sql = 'SELECT rec_id FROM recette';
foreach ($conn->query($sql) as $row) {
    print $row['rec_id'] . "\t";
}
?>
</body>
</html>