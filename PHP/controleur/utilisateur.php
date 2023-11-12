<?php


    class Utilisateur{
        
        enum TypeUtilisateur
        {
            case UTILISATEUR;
            case EDITEUR;
            case ADMINISTRATEUR;
        }
        //public static $idcount = 0;  TO DO : Trouver comment incr l'id
        public $id;
        public $pseudo;
        public $email;
        public $prenom;
        public $nom;
        public $dateInscription;
        public $status; //utilisateur, editeur,  admin
        public $type;   //actif ou suspendu

        public function __construct($pseudo, $email, $prenom, $nom, TypeUtilisateur $type) {
            //$this->id = $;
            $this->email = $email;
            $this->pseudo = $pseudo;
            $this->prenom = $prenom;
            $this->nom = $nom;
            $this->type = $type;
            $this->dateInscription = date("Y/m/d");
        }

        public function connexion()
        {
            
        }
    }
?>