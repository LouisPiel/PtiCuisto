<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Nos Recettes</title>
</head>
<body>
<?php include ('header.php'); ?> 
    <h2>Filtrer</h2>
        <form action = "<?php print $_SERVER['PHP_SELF'];?>" method = "post">
    <p> Filter (caractère) <p>
        <input type="text" name="caractere">
    <p> Categorie <p>
        <select id="cat" name="categorie" size="3">
                <option value='ENTREE'>Entrée</option>
                <option value='PLAT'>Plat</option>
                <option value='DESSERT'>Dessert</option>
        </select>
    <p> Ingrédient <p>
        <input type="text" name="ingredient">
    <input type=submit name="filtre" value="Filtrer">
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

        $valider = false;

        if(isset($_POST['filtre']) && (!empty($_POST['caractere']) || !empty($_POST['categorie']) || !empty($_POST['ingredient']))){

            $caractere = $_POST['caractere'];
            $ingredient = $_POST['ingredient'];

            if(!empty($_POST['categorie'])){
                switch($_POST['categorie']){
                    case 'ENTREE': $num_categorie = 0; break;
                    case 'PLAT': $num_categorie = 1; break;
                    case 'DESSERT': $num_categorie = 2; break; 
                    default: $num_categorie = 3; break;
                }
            }
          
            if(empty($_POST['caractere'])){
                $caractere = null;
            }

            if(empty($_POST['categorie'])){
                $num_categorie = null;
            }

            if(empty($_POST['ingredient'])){
                $ingredient = null;
            }
            
            $requete = $pdo->prepare("SELECT * FROM recette where cat_id = :catid or Titre like :filtre and statut='APROUVE'");
            if(empty($caractere)){
                $requete->bindValue('filtre', $caractere);
            }else{
                $requete->bindValue('filtre', "%$caractere%");
            }
            $requete->bindValue('catid', $num_categorie);
            $requete->execute();
            $data = $requete->fetchAll();
            $categorie = 'PLAT';
            echo "<div id ='listeRecette'>";
                echo '<table>';
                    echo '<tr>';
                        echo '<th> Titre de la recette </th>';
                        //echo '<th> Titre de la recette </th>';
                        echo '<th> Ingrédients </th>';
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

                        $ingredient = $pdo->prepare('SELECT contenu from contenu where cont_id=:contid');
                        $ingredient->bindValue('contid', $row['cont_id']);
                        $ingredient->execute();
                        $ingData = $requete->fetchAll();
                        foreach($ingData as $row){
                            $contenu = $row['Contenu'];
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
            
        }else{

            $data = $pdo->query("SELECT * FROM recette where statut='APROUVE'")->fetchAll();
            $categorie = 'PLAT';
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
        $valider=true;
        }
    ?>
    <?php include ('footer.php'); ?>
</body>
</html>

