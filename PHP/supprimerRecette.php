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
    <div class="supprimerRecette">
        <p>Identifiant</p>
        <input type="text" name="idRecette">
    </div>
    <input type="submit" name="inserer" value='Supprimer Recette' onclick="suppressionFunct()">
</form>
<?php

$db_host = 'localhost';
$db_name = 'PtitCuisto';
$db_username = 'biscuit';
$db_port = '80';
$db_password = 'carbonara';

try{
    //$mysqlConnection = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.';charset=utf8', $db_username, $db_password);
    $pdo = new PDO("mysql:host=mysql.info.unicaen.fr:3306;dbname=sefriou221_3;charset=utf8",'sefriou221' ,'chei4pi0Eevoopho');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

    if(isset($_POST['idRecette']) && isset($_POST['inserer'])){

        $idRecette = $_POST['idRecette'];

        $requete = "DELETE FROM recette where rec_id=:idRecette";

        $stmt = $pdo->prepare($requete);
        $stmt->bindValue(':idRecette', $idRecette);
        $stmt->execute();
    }
?>
<script type="text/JavaScript">
    function suppressionFunct(){
        confirm("Etes-vous sûr ?");
    }
</script>

</body>
</html>