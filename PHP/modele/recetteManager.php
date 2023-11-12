<?php
    require_once("PHP/modele/Manager.php");

    class RecetteManager extends Manager
    {
        // Requête pour afficher les recettes
        public function getRecettes()
        {            
            //Récupération des recettes
            $db = $this->connexionBDD();
            $req = $db->query('SELECT rec_id, titre, resume, image, datecreation, datemodification FROM recette');   
            /*echo "<table>
                    <thead>
                        <tr>
                            <th colspan=\"2\">Recettes</th>
                        </tr>
                    </thead>
                    <tbody>";
            foreach ($sql as $row) {
                //var_dump($row);
                echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td>$row[5]</td>
                    </tr>";
            }
                echo "</tbody>
                </table>";*/

            return $req;
        }

        // Requête pour afficher l'accueil
        public function accueil($recetteId)
        {
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT rec_id, Titre, Resume 
            FROM recette
            ORDER BY rec_id DESC
            LIMIT 4');
            $req->execute(array($recetteId));
            $recette = $req->fetch();

            return $recette;
        }

        // Requête pour afficher une recette
        public function getRecette($recetteId)
        {
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT *
            FROM recette
            WHERE rec_id = ?');
            $req->execute(array($recetteId));
            $recette = $req->fetch();

            return $recette;
        }

        // Requête pour ajouter une recette
        public function ajouterRecette($id, $titre, $resume)
        {
            $db = $this->dbConnect();
            $rec_id;

            //Récupérer l'id le plus grand pour incrémenter celui de la nouvelle recette
            $req_rec_id = $db->prepare('select max(rec_id) from recette');
            $req_rec_id->execute();   
            $r = $req_rec_id->setFetchMode(PDO::FETCH_ASSOC);  
            $result = $req_rec_id->fetchAll();
            foreach ($result as $row)
            {
                $rec_id = $row[0];
            }

            $posts = $db->prepare('INSERT INTO recette(rec_id, titre, aut_id, resume, date_creation)
            VALUES(?, ?, ?, NOW())');
            $posts->execute(array($rec_id ,$titre, $id, $resume));
        
            return $db->lastInsertId();
        }

        // Requête pour modifier une recette
        public function modifierRecette($id, $titre, $resume)
        {
            $db = $this->dbConnect();
            $posts = $db->prepare('UPDATE recette SET title = ?, resume= ? WHERE id = ?');
            $posts->execute(array($titre, $resume, $id));
        }

        // Requête pour supprimer une recette
        public function supprimerRecette($id)
        {
            $db = $this->dbConnect();
            $req = $db->prepare('DELETE FROM recette WHERE id = ?');
            $deletedLines = $req->execute(array($id));

            return $deletedLines;
        }

    }
?>