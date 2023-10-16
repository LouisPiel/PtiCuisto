<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PtiCuisto</title>
</head>
<body>
    <?php
    //Récupération des valeurs d'environnement
        $servername = getenv("servername");
        $username = getenv("username");
        $password = getenv("password");
        $dbname = getenv("dbname");
        
        // Créer une  connexion
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Vérifier la connexion
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        //Récupérer toute les recettes
        $sql = "SELECT * FROM Recette";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div><h4>". $row["Titre"]."</h4><br><p class=\"resume\">".$row["Résumé"].
            "</p><br><p class=\"contenu\">".$row["Contenu"]."</p><br><p class=\"id categorie\">"
            .$row["id"]." ".$row["Categorie"]."</p></div>";
        }
        } else {
            echo "Aucun résultat";
        }

        //Récupérer les recettes selon filtre
        $filtreNom = $_POST["selectFiltreNom"];
        $filtreNom = $_POST["selectFiltreCategorie"];
        $filtreNom = $_POST["selectFiltreIngredient"];
        $filtreNom = $_POST["selectFiltreNom"];
        if ($filtreNom != NULL)
        {
            $sql = "SELECT * FROM Recette where Titre like \"%".$filtreNom."\"";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div><h4>". $row["Titre"]."</h4><br><p class=\"resume\">".$row["Résumé"].
                "</p><br><p class=\"contenu\">".$row["Contenu"]."</p><br><p class=\"categorie\">"
                .$row["Categorie"]."</p><br><p class=\"image\">".$row["Image"]."</p><br><p class=\"id auteur\">"
                .$row["Identifiant"]." ".$row["Auteur"]."</p>
                </div>";
            }
            } else {
                echo "Aucun résultat";
            }
        }


        $conn->close();
    ?>
</body>
</html>