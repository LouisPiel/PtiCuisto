<?php

    class Autoloader{

        // Enregistre notre autoloader
        static function register() {
            spl_autoload_register(array(__CLASS__, 'autoload'));
        }

        // Classe à charger 
        static function autoload($class) {
            if (file_exists('controleur/' . $class . '.php')) {
                require 'controleur/' . $class . '.php';
            }
            elseif (file_exists('modele/' . $class . '.php')) {
                require 'modele/' . $class . '.php';
            }
        }
    }
?>