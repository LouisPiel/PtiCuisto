<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/style.css" rel="stylesheet" type="text/css" />
    <title>Nos Recettes</title>
</head>
<body>

<?php
    $id = $_GET['id'];
?>

<form action = "supprimerRecette.php?id=<?php echo $id; ?>" method = "post">
    <div class="supprimerRecette">
        <h1>Supprimer la recette?</h1>
    </div>
    <input type="submit" name="supprimer" value='Supprimer Recette' onclick="suppressionFunct()">
</form>
<?php
$env = parse_ini_file("../.env");

try{
    $pdo = new PDO("mysql:host=".$env['DATABASE_HOST'].";dbname=".$env['DATABASE_NAME'].";charset=utf8",$env['DATABASE_USER'] ,$env['DATABASE_PASSWORD']);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
    $check = false;
    if(isset($_POST['supprimer'])){
        echo '<script type="text/javascript">
                var check = "nok";
                window.result = confirm("Etes vous sûr?");
                if(result == true){
                    console.log("test");
                    check = "ok";
                }
            </script>';
            $requete = "DELETE FROM recette where rec_id=:idRecette";
            $stmt = $pdo->prepare($requete);
            $stmt->bindValue('idRecette', $id);
            $stmt->execute();
    }

    echo '<script type="text/javascript">
            if(window.result == true){
                location.href = "PagesValidation/ValidationSuppression.php?p=rec_modif";
            }
        </script>';
?>

</body>
</html>
