<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/style.css" rel="stylesheet" type="text/css" />
    <title>Ajouter une Recettes</title>

    <script type="text/javascript">
        function valider(){
            console.log("ca marche");
            location.href = "PageValidation/ValiderAjouterRecetteIngredient.php?p=rec&id";
        }
    </script>
</head>
<body>
    <form action = "<?php print $_SERVER['PHP_SELF'];?>" method = "post">
        <div class="formulaireRecette">
            <p>Nom de la recette</p>
            <input type="text" name="titre">
        </div>
        <div class="formulaireRecette">
            <p>Contenu</p>
            <textarea id ="contenu" rows="10" cols="40" name="contenu">Détail de la recette avec ingrédients</textarea>
        </div>
        <div class="formulaireRecette">
            <p>Résumé</p>
            <textarea id ="resume" rows="10" cols="40" name="resume">Votre résumé ici</textarea>
        </div>
        <div class="formulaireRecette">
            <p>Image</p>
            <input type="text" name="image">
        </div>
        <div class="formulaireRecette">
            <p>Catégorie</p>
            <select id="cat" name="categorie" size="3">
                <option value='ENTREE'>ENTREE</option>
                <option value='PLAT'>PLAT</option>
                <option value='DESSERT'>DESSERT</option>
                <option value='BOISSON'>BOISSON</option>
            </select>
        </div>
        <div class="formulaireRecette">
            <p>Auteur</p>
            <input type="text" name="auteur">
        </div>
        <input type="submit" name="inserer" value='Ajouter la recette!'>
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

            if(!empty($_POST['categorie']) && !empty($_POST['auteur']) && !empty($_POST['resume']) && !empty($_POST['titre']) && !empty($_POST['image']) && isset($_POST['inserer'])){
                $titre = $_POST['titre'];
                $categorie = $_POST['categorie'];
                $resume = $_POST['resume'];
                $image = $_POST['image'];
                $auteur = $_POST['auteur'];

                $requete = "INSERT INTO recette (Titre, cont_id, Resume, cat_id, Image, DateCreation, DateModification, aut_id, statut) VALUES (
                :titre,
                53,
                :resume,
                (Select cat_id from categorie where Intitule=:categorie),
                :image,
                now(),
                now(),
                (Select user_id from utilisateur where Pseudo=:auteur),
                'MODERATION'
                )";

                $stmt = $pdo->prepare($requete);
                $stmt->bindValue(':titre', $titre);
                $stmt->bindValue(':categorie', $categorie);
                $stmt->bindValue(':resume', $resume);
                $stmt->bindValue(':image', $image);
                $stmt->bindValue(':auteur', $auteur);
                $stmt->execute();

                echo '<script type="text/javascript">valider();</script>';
            }
        ?>
</body>
</html>
