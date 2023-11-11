<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Recettes</title>
</head>
<body> 

<a href="recette.php?id=53"> link</a>
    <?php
    $env = parse_ini_file("../.env");

    try{
        $pdo = new PDO("mysql:host=".$env['DATABASE_HOST'].";dbname=".$env['DATABASE_NAME'].";charset=utf8",$env['DATABASE_USER'] ,$env['DATABASE_PASSWORD']);
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
        $data = $pdo->query("SELECT * FROM recette")->fetchAll();
        $categorie = 'Plat';

    echo "<div id ='listeRecette'>";
        echo '<table>';
            echo '<tr>';
                echo '<th> Titre de la recette </th>';
                //echo '<th> Titre de la recette </th>';
                echo '<th> Description </th>';
                echo '<th> Categorie </th>';
                echo '<th> Image </th>';
                echo '<th> Date de création </th>';
                echo '<th> Date de Modification </th>';
                echo '<th> Auteur </th>';
            echo '</tr>';
            foreach($data as $row){
                $selectAuteur = $pdo->prepare("SELECT Pseudo from utilisateur where user_id=:userid");
                $selectAuteur->execute(['userid' => $row['aut_id']]);
                $user = $selectAuteur->fetch();
                foreach($user as $row2){
                    $username = $row2;
                }
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
                    echo '<td>'.$username.'</td>';
                echo '</tr>';
        }
        echo '<table>';
    echo '</div>';
    ?>
</body>
</html>