<?php

    class Autoloader{

        // Enregistre notre autoloader
        static function register() {
            spl_autoload_register(array(__CLASS__, 'autoload'));
        }

        // Classe à charger 
        static function autoload($class) {
            //echo 'PHP/controleur/' . $class . '.php';
            if (file_exists('PHP/controleur/' . $class . '.php')) {
                //echo '<br>';
                require 'PHP/controleur/' . $class . '.php';
            }
            elseif (file_exists('PHP/modele/' . $class . '.php')) {
                require 'PHP/modele/' . $class . '.php';
            }
        }
    }
?>