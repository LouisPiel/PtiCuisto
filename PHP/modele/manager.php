<?php
    
    class Manager
    {
        function connexionBDD()
        {
            //Récupération des infos de connexion dans fichier .env
            $db_host= getenv('host');
            $db_port= getenv('port');
            $db_name= getenv('dbname');
            $db_username= getenv('username');
            $db_password= getenv('password');

            try{    //Connexion à la BDD
                //$mysqlConnection = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.';charset=utf8', $db_username, $db_password);

                $mysqlConnection = new PDO("mysql:host=$db_host:$db_port;dbname=$db_name;charset=utf8",$db_username ,$db_password );
            }
            catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }

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