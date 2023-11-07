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
            <option value='entree'>Entrée</option>
            <option value='plat'>Plats</option>
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
    $pdo = new PDO("mysql:host=localhost;dbname=ptitcuisto;charset=utf8",'biscuit' ,'carbonara');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['categorie']) && isset($_POST['auteur'])){

    $categorie = $_POST['categorie'];

    echo 'value: '.$categorie;

    $sth = $pdo->query('SELECT * FROM recette');

    $rows = $sth->fetchAll();

    $titre = 'plat2';
    $resume= 'resume';
    $auteur=15;

    $data = [
        'Titre' => $titre,
        'Resume' => $resume,
        'aut_id' => $auteur,
    ];

    $requete =
    "Insert Into recette (
        Titre, 
        cont_id, 
        Resume, 
        cat_id, 
        Image, 
        DateCreation, 
        DateModification, 
        aut_id) 
        VALUES 
        (:Titre,
        53,
        :Resume,
        (Select cat_id from categorie where Intitule='".$categorie."'),
        'image',
        now(),
        now(),
        (Select user_id from categorie where Pseudo='".$categorie."'))";

    //$requete = "insert into recette (Titre) values ('baguette')";

    $stmt = $pdo->prepare($requete);
    $stmt->execute($data);
}
?>
</body>
</html>