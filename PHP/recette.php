<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recette en question</title>
</head>
<body>
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
        echo '<p> Nom de la recette: '.$row['Titre'].'</p>';
        echo '<img src="'.$row['Image'].'" alt="Recette" width="300">';
        echo '<p> Categorie: '.$categorie.'</p>';
        echo '<p> Description: '.$row['Resume'].'</p>';
        //echo '<p> Ingredient: '.$row['image'].'</p>';
        echo '<p> Auteur: '.$auteur.'</p>';
        echo '<p> Date de Creation: '.$row['DateCreation'].'</p>';
        echo '<p> Date de Modification: '.$row['DateModification'].'</p>';
    } 
?>   
</body>
</html>