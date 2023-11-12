<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande en cours</title>
</head>
<body>
    <h1> Votre demande à bien été prise en compte! </h1>
    <h3>L'équipe de modération va etudier votre recette et vous renverra une notification si la recette est approuvé ou désaprouvé.</h3>
    <button onclick="location.href='../acceuil.php';"> Retour à l'acceuil</button>

    <?php
        $id = $_GET['id'];
        $p = $_GET['p'];
        
        if($p == 'rec'){
            echo "<button onclick=\"location.href='../ajouterRecette.php';\"> Retour à l'ajout d'une recette </button>";
        }

        if($p == 'rec_modif'){
            echo "<button onclick=\"location.href='../modifierRecette.php?id=".$id."';\"> Retour aux Modification </button>";
        }

        if($p == 'ing'){
            //echo "<button onclick=\"location.href='../ajouterRecette.php';\"> Retour à l'ajout d'une recette </button>";
        }
    ?>
</body>
</html>