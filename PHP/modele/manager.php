<?php
    
    class Manager
    {
        function connexionBDD()
        {
            //Récupération des infos de connexion dans fichier .env         
            $db_host= $env['DATABASE_HOST'];
            $db_name= $env['DATABASE_NAME'];
            $db_username= $env['DATABASE_USER'];
            $db_password= $env['DATABASE_PASSWORD'];

            try{    //Connexion à la BDD
                $pdo = new PDO("mysql:host=".$env['DATABASE_HOST'].";dbname=".$env['DATABASE_NAME'].";charset=utf8",$env['DATABASE_USER'] ,$env['DATABASE_PASSWORD']);
            }
            catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }
            return $pdo;

            /* //Requête pour "nos recettes"
            $sql = $mysqlConnection->query('SELECT rec_id FROM recette');   //Récupération des recettes et affichage dans tableau
            echo "<table>
            <thead><tr><th colspan=\"2\">Recettes</th></tr></thead><tbody><tr>";
            foreach ($sql as $row) {
                echo "<td>$row[0] $row[1] $row[2]</td>";
            }
                echo "</tr></tbody></table>";
*/
        }
    }
?>