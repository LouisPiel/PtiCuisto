<?php 
    //exemple plus parlant : https://github.com/gwen-kaser/Projet-4-PHP-MVC

    /*
    Index = routeur : appelle les contrôleurs en fonction de l'URL de la page)
    Contrôleur : appelle les modèles et les affiche grâce aux vues
    Vue : Page d'affichage (vraies pages)
    Modèle : ensemble des requêtes pour faire fonctionner un truc, traite et récupère les informations de la BDD
    */

    try {
        //Tous les cas de figure d'actions
        if (isset($_GET['action'])) {
        
            if ($_GET['action'] == 'listPosts') {
                $blog = new Blog();
                $blog->listPosts();
            }
            
            elseif ($_GET['action'] == 'post') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $blog = new Blog();
                    $blog->post();
                }
                else {
                    throw new Exception ('Aucun identifiant de billet envoyé');
                }
            }
        }
    }
    catch(Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
    }

    require('templates/nos_recettes.php');
?>