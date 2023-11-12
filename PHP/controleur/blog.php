<?php

class Blog 
{
    // Méthode pour afficher les recettes
    public function listeRecettes()
    {
        $recetteManager = new recetteManager(); 
        $posts = $recetteManager->getRecettes();
        require('./PHP/vue/nosRecettes.php');
    }

    
    // Méthode pour afficher une recette
    public function accueil()
    {
        $recetteManager = new recetteManager(); 
        echo 'accueil';

        $posts = $recetteManager->accueil();
        require('./PHP/vue/accueil.php');
    }

    
    // Méthode pour afficher une recette
    public function recette()
    {
        $recetteManager = new recetteManager(); 

        $posts = $recetteManager->getRecette($_GET['id']);
        
        if(!$posts) { // Sécurité si le chapitre n'existe pas redirection vers la liste de recettes
            header('Location: index.php?action=listeRecettes');
        }

        require('./PHP/vue/recette.php');
    }

     // Méthode / accès page ajout commentaire
     public function vueAjouterRecette()
     {
         if(!isset($_SESSION['id'])) { // Sécurité si ce n'est pas un membre redirection vers la page de connexion
             header('Location: index.php?action=connexion');
             die();
         }
             require('./PHP/vue/ajouterRecette.php');
     }
 
     // Méthode pour ajouter un commentaire
     public function ajouterRecette($recetteId, $userId, $recette)
     {
         if(!isset($_SESSION['id'])) { // Sécurité si ce n'est pas un membre redirection vers la page de connexion
             header('Location: index.php?action=connexion');
             die();
         }
             $recetteManager = new RecetteManager();
 
             $affectedLines = $recetteManager->ajouterRecette($recetteId, $userId, $recette);
 
         if($affectedLines === false) {
             throw new Exception('Impossible d\'ajouter le commentaire !');
         }
         else {
             header('Location: index.php?action=post&id=' . $recetteId);
         }
     }
 
     // Méthode pour récupérer le commentaire à modifier
     public function vueModifierRecette()
     {
         if(!isset($_SESSION['id'])) { // Sécurité si ce n'est pas un membre redirection vers la page de connexion
             header('Location: index.php?action=connexion');
             die();
         }
         
         if (isset($_SESSION['id'])) { // Vérification si l'utilisateur est connecté
             $recetteManager = new RecetteManager();
             $recette = $recetteManager->getRecette($_GET['id']); 
             
             if (($_SESSION['id']) == ($recette['aut_id']) || $_SESSION['admin'] == true) { // Sécurité bouton modifié uniquement visible par l'administrateur et le membre qui à posté le commentaire
                 require('./PHP/vue/modifierRecette.php');
             }
         }
     }
 
     // Méthode pour modifier un commentaire 
     public function modifierRecette($id, $recette)
     {
         if(!isset($_SESSION['id'])) { // Sécurité si ce n'est pas un membre redirection vers la page de connexion
             header('Location: index.php?action=connexion');
             die();
         }
 
         if (isset($_SESSION['id'])) { // Vérification si l'utilisateur est connecté
             $recetteManager = new RecetteManager();
             $oldRecette = $recetteManager->getRecette($id); 
             
             if(!$oldRecette) { // Sécurité si le commentaire n'existe pas ou que le membre n'est pas l'auteur redirection vers la page d'accueil
                 header('Location: index.php?action=listeRecettes');
             }
             
             if (($_SESSION['id']) == ($oldRecette['user_id']) || $_SESSION['admin'] == true) { // Sécurité bouton modifié uniquement visible par l'administrateur et le membre qui à posté le commentaire 
                 $newRecette = $recetteManager->updateRecette($id, $resume);
                         
                 if ($newRecette == false) {
                     throw new Exception('Impossible de modifier le commentaire !');
                 }
                 else {
                     echo 'recette :' . $_POST['resume'];
                     header('Location: index.php?action=recette&id=' . $_GET['rec_id']);
                 }
             }
         }
     }
 
     // Méthode pour supprimer un commentaire
     public function supprimerRecette($id)
     {
         if(!isset($_SESSION['id'])) { // Sécurité si ce n'est pas un membre redirection vers la page de connexion
             header('Location: index.php?action=connexion');
             die();
         }
         
         if (isset($_SESSION['id'])) { // Vérification si l'utilisateur est connecté
             $recetteManager = new RecetteManager();
             $oldRecette = $recetteManager->getRecette($id); 
             
             if (($_SESSION['id']) == ($oldRecette['aut_id']) || $_SESSION['admin'] == true) { // Sécurité bouton supprimé uniquement visible par l'administrateur et le membre qui à posté le commentaire
                 $supprimer = $recetteManager->deleteRecette($id);
         
                 if (isset($_SESSION['admin']) && $_SESSION['admin'] == false) { // Redirection page chapitre si ce n'est pas l'administrateur qui supprime le commentaire
                     header('Location: index.php?action=recette&id=' . $_GET['rec_id']);
                 }
             }
         }
     }
}
?>