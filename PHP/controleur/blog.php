<?php

class Blog 
{
    // Méthode pour afficher les recettes
    public function listeRecettes()
    {
        $recetteManager = new recetteManager(); 
        $recettes = $recetteManager->getRecettes(); 

        require('./nosRecettes.php');
    }

    
    // Méthode pour afficher une recette
    public function recette()
    {
        $recetteManager = new recetteManager(); 

        $recette = $recetteManager->getRecette($_GET['id']);
        
        if(!$recette) { // Sécurité si le chapitre n'existe pas redirection vers la page d'accueil
            header('Location: index.php?action=listeRecettes');
        }

        require('vue/recette.php');
    }
}
?>