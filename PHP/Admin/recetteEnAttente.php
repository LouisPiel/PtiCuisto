<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $env = parse_ini_file("../../.env");

        try{
            $pdo = new PDO("mysql:host=".$env['DATABASE_HOST'].";dbname=".$env['DATABASE_NAME'].";charset=utf8",$env['DATABASE_USER'] ,$env['DATABASE_PASSWORD']);
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        $check = 'yo';
        $data = $pdo->query("SELECT * FROM recette where statut='MODERATION'")->fetchAll();
        $categorie = 'PLAT';
        $rec_id = '';
        $contenu = '?';
        echo "<div id ='listeRecette'>";
            echo '<table>';
                echo '<tr>';
                    echo '<th> Titre de la recette </th>';
                    //echo '<th> Titre de la recette </th>';
                    echo '<th> Ingrédients </th>';
                    echo '<th> Résumé </th>';
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
                    $selectIngredients = $pdo->prepare("SELECT Contenu from contenu where cont_id=:contid");
                    $selectIngredients->execute(['contid' => $row['cont_id']]);
                    $ing = $selectIngredients->fetch();
                    foreach($ing as $row3){
                        $contenu = $row3;
                    }
                    echo '<tr>';
                        echo '<td><a href="recette.php?id='.$row['rec_id'].'">'.$row['Titre'].'</a></td>';
                        echo '<td>'.$contenu.'</td>';
                        echo '<td>'.$row['Resume'].'</td>';
                        echo '<td>'.$categorie.'</td>';
                        echo '<td><img src="'.$row['Image'].'" alt="Image recette" width="200";height="300"></td>';
                        echo '<td>'.$row['DateCreation'].'</td>';
                        echo '<td>'.$row['DateModification'].'</td>';
                        echo '<td>'.$username.'</td>';
                    echo '<form action ="recetteEnAttente.php" method = "post">';
                        echo '<td><input type="submit" name="approuver" value="Valider"><td>';
                        echo '<td><input type="submit" name="rejeter" value="Rejeter"><td>';
                    echo '</form>';
                    echo '</tr>';
                    $id = $row['rec_id'];
            }
            if(isset($_POST['approuver'])){
                $requete = "UPDATE recette SET statut='APROUVE' WHERE rec_id =:id";
                $data = $pdo->prepare($requete);
                $data->bindValue('id', $id);
                $data->execute();
                echo '<script> location.href="recetteEnAttente.php"; </script>';
            }

            if(isset($_POST['rejeter'])){
                $requete = "UPDATE recette SET statut='REJETE' WHERE rec_id =:id";
                $data = $pdo->prepare($requete);
                $data->bindValue('id', $id);
                $data->execute();
                echo '<script> location.href="recetteEnAttente.php"; </script>';
            }
            echo '<table>';
        echo '</div>';
    ?>
    <a href="../nosRecettes.php"> Recettes Validés</a>
</body>
</html>