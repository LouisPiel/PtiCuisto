<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Document</title>
</head>
<body>
    <!-- header -->
    <?php include ('header.php'); ?> 

    <main>
        <img src="../image-logo/image-acceuil.png" id="image-acceuil" title="image libre de droit"/>
        <div id="container">
            <div id="derniereRecettes">
                <h1>LES DERNIÈRES RECETTES</h1>
                <?php
                    $env = parse_ini_file("../.env");

                    try{
                        $pdo = new PDO("mysql:host=".$env['DATABASE_HOST'].";dbname=".$env['DATABASE_NAME'].";charset=utf8",$env['DATABASE_USER'] ,$env['DATABASE_PASSWORD']);
                    }
                    catch (Exception $e)
                    {
                        die('Erreur : ' . $e->getMessage());
                    }

                    $data = $pdo->query("SELECT * FROM recette where statut='APROUVE' order by DateCreation desc")->fetchAll();
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
                                }
                                echo '<table>';
                            echo '</div>';
                ?>
            </div>

            <div id="edito">
                <img src="../image-logo/Pticuisto.png" id="image-edito" title="image réaliser à l'aide d'une IA"/>
                <h2>Edito</h2>

                <p id="texte-edito">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ut luctus felis. Nullam sit amet arcu porta elit fermentum consectetur eget id libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac aliquet tortor. Donec ex diam, ullamcorper et ante ut, euismod vulputate odio. Curabitur luctus tellus velit, et efficitur metus tempor in. Mauris ac enim sollicitudin, varius leo sit amet, mollis lacus. 
                </p>
            </div>
        </div>
        <hr/>
    </main>
    <!-- footer -->
    <?php include ('footer.php'); ?> 
</body>
</html>