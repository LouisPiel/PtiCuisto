<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/style.css" rel="stylesheet" type="text/css" />
    <title>Modifier la Recettes</title>
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
    $requete = $pdo->prepare("SELECT * FROM recette where rec_id=:id");
    $requete->execute(['id' => $id]);
    $data = $requete->fetchAll();
    foreach($data as $row){
        $titre = $row['Titre'];
        $image = $row['Image'];
        $resume = $row['Resume'];

        $selectIngredients = $pdo->prepare("SELECT Contenu from contenu where cont_id=:contid");
        $selectIngredients->execute(['contid' => $row['cont_id']]);
        $ing = $selectIngredients->fetch();
        foreach($ing as $row3){
            $contenu = $row3;
        }
    }

?>
<form action = "modifierRecette.php?id=<?php echo $id; ?>" method = "post" id="modifform">
    <div class="formulaireRecette">
        <p>Nom de la recette</p>
        <input type="text" name="titre" value="<?php echo $titre; ?>">
    </div>
    <div class="formulaireRecette">
        <p>Contenu</p>
        <textarea id ="contenu" rows="10" cols="40" name="contenu"><?php echo $contenu; ?></textarea>
    </div>
    <div class="formulaireRecette">
        <p>Résumé</p>
        <textarea id ="resume" rows="10" cols="40" name="resume"><?php echo $resume;?></textarea>
    </div>
    <div class="formulaireRecette">
        <p>Image</p>
        <input type="text" name="image" value="<?php echo $image; ?>">
    </div>
    <div class="formulaireRecette">
        <p>Catégorie</p>
        <select id="cat" name="categorie" size="3">
            <option value='0'>ENTREE</option>
            <option value='1'>PLAT</option>
            <option value='2'>DESSERT</option>
            <option value='4'>BOISSON</option>
        </select>
    </div>
    <input type="submit" name="modifier" value='Modifier la recette!'>
</form>
<?php
    if(/*!empty($_POST['categorie']) && !empty($_POST['auteur']) && !empty($_POST['resume']) && !empty($_POST['titre']) && !empty($_POST['image']) &&*/ isset($_POST['modifier'])){
        $titre = $_POST['titre'];
        $categorie = $_POST['categorie'];
        $resume = $_POST['resume'];
        $image = $_POST['image'];
        
        $requete = "UPDATE recette SET 
        Titre=:titre,
        Resume=:resume2,
        cat_id=:categorie,
        Image=:image2,
        DateModification=now(),
        statut='MODERATION'
        WHERE rec_id=:id";

        $stmt = $pdo->prepare($requete);
        $stmt->bindValue('titre', $titre);
        $stmt->bindValue('resume2', $resume);
        $stmt->bindValue('categorie', $categorie);
        $stmt->bindValue('image2', $image);
        $stmt->bindValue('id', $id);
        $stmt->execute();

        echo '<script type="text/javascript">
            var result = confirm("Etes vous sûr?");
            if(result == true){
                location.href = "PagesValidation/ValiderAjouterRecetteIngredient.php?p=rec_modif&id='.$id.'";
            }
            </script>';
  }
?>
</body>
</html>
