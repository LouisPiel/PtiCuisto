<?php

    session_start();

    require('PHP/controleur/Autoloader.php');
    Autoloader::register();

    try {
        if (isset($_GET['action'])) {
            
            if ($_GET['action'] == 'listeRecettes') {
                $blog = new Blog();
                $blog->listeRecettes();
            }
            
            elseif ($_GET['action'] == 'recette') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $blog = new Blog();
                    $blog->recette();
                }
                else {
                    throw new Exception ('Aucun identifiant de billet envoyé');
                }
            }
    
            // Administrateur
            elseif ($_GET['action'] == 'listeRecettesAdmin') {
                $admin = new Admin();
                $admin->listeRecettesAdmin();
            }
    
            if ($_GET['action'] == 'viewAjouterRecette') {
                $admin = new Admin();
                $admin->viewAjouterRecette();
            }
            
            elseif ($_GET['action'] == 'addRecette') {
                if (!empty($_SESSION['id']) && !empty($_POST['title']) && !empty($_POST['content'])) {
                    $admin = new Admin();
                    $admin->addRecette($_SESSION['id'], $_POST['title'], $_POST['content']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
    
            elseif ($_GET['action'] == 'viewEditRecette') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $admin = new Admin();
                    $admin->viewEditRecette();
                }
                else {
                    throw new Exception ('Aucun identifiant de billet envoyé');
                }
            }
    
            elseif ($_GET['action'] == 'modifierRecette') {
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    $admin = new Admin();
                    $admin->modifierRecette($_GET['id'], $_POST['title'], $_POST['content']);
                }
                else {
                    throw new Exeption('Tous les champs ne sont pas remplis !');
                }
            }
    
            elseif ($_GET['action'] == 'supprimerRecette') {
                $admin = new Admin();
                $admin->supprimerRecette($_GET['id']);
            }
    
            // Utilisateurs
            if ($_GET['action'] == 'connexion') {
                $utilisateur = new Utilisateur();
                $utilisateur->connexion();
            }
    
            elseif ($_GET['action']== 'connexionUser') {
                if (isset($_POST['pseudo']) && isset($_POST['pass'])) {
                    $utilisateur = new Utilisateur();
                    $utilisateur->connexionUser($_POST['pseudo'], $_POST['pass']);
                    
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
    
            if ($_GET['action'] == 'registration') {
                $utilisateur = new Utilisateur();
                $utilisateur->registration();
            }
    
            elseif ($_GET['action'] == 'saveUser') {
                if (isset($_POST['pseudo']) && isset($_POST['pass']) && isset($_POST['email'])) {
                    $utilisateur = new Utilisateur();
                    $utilisateur->saveUser($_POST['pseudo'], $_POST['pass'], $_POST['email']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
    
            elseif ($_GET['action'] == 'deconnexion') {
                $utilisateur = new Utilisateur();
                $utilisateur->deconnexion();
            }
            
        }
        else {
            $blog = new Blog();
            $blog->listeRecettes();   
        }
    }
    catch(Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
?>
<!--<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg ">
            <a class="navbar-brand" href="#"> 
                <img src="image-logo/Logo.png" height="80em" class="d-inline-block align-top" alt="" />
            </a>
            <div class="collapse navbar-collapse d-flex justify-content-end topnav" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="PHP/acceuil.php" class="nav-link">Accueil</a></li>
                    <li class="nav-item"><a href="PHP/nosRecettes.php" class="nav-link">Nos recettes</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filtres
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Catégories</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Titre</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Ingrédients</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="PHP/connexion.php" class="nav-link">Connexion</a></li>
                </ul>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <span class="fa-solid fa-bars fa-2xl" id="boutton"></span>
                </a>
            </div>                
        </nav>

        <div id="foot">
            <a href="https://facebook.com"><span class="fa-brands fa-square-facebook fa-2xl icon-foot" style="color: #004080;" ></span></a>
            <a href="https://x.com"><span class="fa-brands fa-square-x-twitter fa-2xl icon-foot"></span></a>
            <a href="https://linkedin.com"><span class="fa-brands fa-linkedin fa-2xl icon-foot" style="color: #008080;"></span></a>
      </div>'

      <div id="foot">
            <a href="https://facebook.com"><span class="fa-brands fa-square-facebook fa-2xl icon-foot" style="color: #004080;" ></span></a>
            <a href="https://x.com"><span class="fa-brands fa-square-x-twitter fa-2xl icon-foot"></span></a>
            <a href="https://linkedin.com"><span class="fa-brands fa-linkedin fa-2xl icon-foot" style="color: #008080;"></span></a>
      </div>'
    </body>
</html>
       -->