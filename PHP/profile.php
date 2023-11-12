<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1> Profile </h1>
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
    $requete = $pdo->prepare("SELECT * FROM utilisateur where user_id=:id");
    $requete->execute(['id' => $id]);
    $recette = $requete->fetchAll();
    foreach($recette as $row){
        echo '<h3> Pseudo: </h3> <p>'.$row['Pseudo'].'</p>';
        echo '<h3> Nom: </h3> <p>'.$row['Nom'].'</p>';
        echo '<h3> Prénom: </h3> <p>'.$row['Prenom'].'</p>';
        echo '<h3> Pseudo: </h3> <p>'.$row['Pseudo'].'</p>';
        echo '<h3> Inscrit depuis: </h3> <p>'.$row['DateInscription'].'</p>';
        echo '<h3> Statut: </h3> <p>'.$row['Statut'].'</p>';
    }

    $data = $pdo->query("SELECT * FROM recette")->fetchAll();
    echo "<div class ='listeRecette'>";
        echo '<table>';
            echo '<tr>';
                echo '<th> Titre de la recette </th>';
                //echo '<th> Titre de la recette </th>';
                echo '<th> Description </th>';
                echo '<th> Categorie </th>';
                echo '<th> Image </th>';
                echo '<th> Date de création </th>';
                echo '<th> Date de Modification </th>';
            echo '</tr>';
            foreach($data as $row){
                switch($row['cat_id']){
                    case 0: $categorie = 'Entrée'; break;
                    case 1: $categorie = 'Plat'; break;
                    case 2: $categorie = 'Dessert'; break; 
                    default: $categorie = 'Boisson'; break;
                    }
                echo '<tr>';
                    echo '<td><a href="recette.php?id='.$row['rec_id'].'">'.$row['Titre'].'</a></td>';
                    //echo '<td>'.$row['cont_id'].'</td>';
                    echo '<td>'.$row['Resume'].'</td>';
                    echo '<td>'.$categorie.'</td>';
                    echo '<td><img src="'.$row['Image'].'" alt="Image recette" width="200";height="300"></td>';
                    echo '<td>'.$row['DateCreation'].'</td>';
                    echo '<td>'.$row['DateModification'].'</td>';
                echo '</tr>';
        }
        echo '<table>';
    echo '</div>';
    ?>
</body>
</html>