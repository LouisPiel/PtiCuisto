<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recette en question</title>
</head>
<body>
<?php include ('header.php'); ?> 
<?php
    $env = parse_ini_file("../.env");
    try{
        $pdo = new PDO("mysql:host=".$env['DATABASE_HOST'].";dbname=".$env['DATABASE_NAME'].";charset=utf8",$env['DATABASE_USER'] ,$env['DATABASE_PASSWORD']);
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    $id = $_GET['id'];
    $auteur = 'auteur';
    $categorie = 'PLAT';

    $requete= $pdo->prepare("SELECT Pseudo FROM utilisateur where user_id in (select aut_id from recette where rec_id=:id)");
    $requete->execute(['id' => $id]);
    $data = $requete->fetchAll();
    foreach($data as $row){
        $auteur = $row['Pseudo'];
    }

    $requete= $pdo->prepare("SELECT Intitule FROM categorie where cat_id in (select cat_id from recette where rec_id=:id)");
    $requete->execute(['id' => $id]);
    $data = $requete->fetchAll();
    foreach($data as $row){
        $categorie = $row['Intitule'];
    }

    $requete = $pdo->prepare("SELECT * FROM recette where rec_id=:id");
    $requete->execute(['id' => $id]);
    $recette = $requete->fetchAll();
    foreach($recette as $row){
        echo '<img src="'.$row['Image'].'" alt="Recette" width="300">';
        echo '<h3> Nom de la recette: </h3>'.$row['Titre'].'</p>';
        echo '<h3> Categorie: </h3> <p>'.$categorie.'</p>';
        echo '<h3> Description: </h3> <p>'.$row['Resume'].'</p>';
        //echo '<p> Ingredient: '.$row['image'].'</p>';
        echo '<h3> Auteur: </h3> <a href="profile.php?id='.$row['aut_id'].'">'.$auteur.'</a>';
        echo '<h3> Date de Creation: </h3> <p>'.$row['DateCreation'].'</p>';
        echo '<h3> Date de Modification: </h3> <p>'.$row['DateModification'].'</p>';

        echo '<a href="modifierRecette.php?id='.$row['rec_id'].'"> Modifier </a> <a href="supprimerRecette.php?id='.$row['rec_id'].'"> Supprimer </a>';
    } 
?>
<?php include ('footer.php'); ?>
</body>
</html>
