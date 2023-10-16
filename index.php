<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PtiCuisto</title>
</head>
<body>
    <?php
        $servername = getenv("servername");
        $username = getenv("username");
        $password = getenv("password");
        $dbname = getenv("dbname");
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM Recette";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. "<br>";
        }
        } else {
        echo "Aucun résultat";
        }
        $conn->close();
    ?>
</body>
</html>