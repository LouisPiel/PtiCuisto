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
try{
    $pdo = new PDO("mysql:host=".$_ENV['DATABASE_HOST'].";dbname=".$_ENV['DATABASE_NAME'].";charset=utf8",$_ENV['DATABASE_NAME'] ,$_ENV['DATABASE_PASSWORD']);
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
