<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "<?php print $_SERVER['PHP_SELF'];?>" method = "post">

    <input type="text" name="auteur">

    <select id="cat" name="categorie" size="3">
            <option value='ENTREE'>Entrée</option>
            <option value='PLAT'>Plats</option>
            <option value='dessert'>Dessert</option>
    </select>

    <input type="submit" value="inserer">
    </form>

<?php



$db_host = 'localhost';
$db_name = 'PtitCuisto';
$db_username = 'biscuit';
$db_port = '80';
$db_password = 'carbonara';

try{
    //$mysqlConnection = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.';charset=utf8', $db_username, $db_password);
    $pdo = new PDO("mysql:host=mysql.info.unicaen.fr:3306;dbname=sefriou221_3;charset=utf8",'sefriou221' ,'chei4pi0Eevoopho');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['categorie']) && isset($_POST['auteur'])){

    echo 'tes la?';

    /*
    $titre = $_POST['titre'];
    $categorie = $_POST['categorie'];
    $resume = $_POST['resume'];
    $image = $_POST['image'];
    $auteur = $_POST['auteur'];
    */

    $titre = "Pizza";
    $categorie = 'PLAT';
    $resume = 'Resumé';
    $image = 'image';
    $auteur = 'CHOCOVORE';

    $sth = $pdo->query('SELECT * FROM recette');

    $rows = $sth->fetchAll();


    

    $requete = "INSERT INTO recette (Titre, cont_id, Resume, cat_id, Image, DateCreation, DateModification, aut_id) VALUES (
    :titre,
    53,
    'resume',
    (Select cat_id from categorie where Intitule=:categorie),
    'Image',
    now(),
    now(),
    (Select user_id from utilisateur where Pseudo=:auteur)
    )";

    //$requete = "insert into test values (:Titre)";

    $stmt = $pdo->prepare($requete);
    $stmt->bindValue(':titre', $titre);
    $stmt->bindValue(':categorie', $categorie);
    //$stmt->bindValue(':resume', $resume);
    //$stmt->bindValue(':image', $image);
    $stmt->bindValue(':auteur', $auteur);
    $stmt->execute();
}
?>
</body>
</html>