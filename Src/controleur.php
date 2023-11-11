<?php

    require_once("Modeles/utilisateur.php");

    enum TypeUtilisateur
    {
        case UTILISATEUR;
        case EDITEUR;
        case ADMINISTRATEUR;
    }

    class Controller {
        protected function render($view, $data = []) {
            extract($data);

            include "Views/$view.php";
        }
        public function index() {
            $users = [
                //$pseudo, $email, $prenom, $nom, $type
                new Utilisateur('user1', 'gars.lambda@exemple.com', 'Gars', 'Lambda', TypeUtilisateur::UTILISATEUR),
                new Utilisateur('ed', 'editeur@exemple.com', 'Eddie', 'Teur', TypeUtilisateur::EDITEUR),
                new Utilisateur('admin', 'modo.discord@exemple.com', 'Modo', 'Discord', TypeUtilisateur::ADMINISTRATEUR),
            ];
    
            $this->render('user/index', ['users' => $users]);
        }
    }

?>